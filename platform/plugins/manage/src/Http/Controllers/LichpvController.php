<?php

namespace Botble\Manage\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Manage\Http\Requests\LichpvRequest;
use Botble\Manage\Repositories\Interfaces\LichpvInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Manage\Tables\LichpvTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Manage\Forms\LichpvForm;
use Botble\Base\Forms\FormBuilder;

class LichpvController extends BaseController
{
    /**
     * @var LichpvInterface
     */
    protected $lichpvRepository;

    /**
     * LichpvController constructor.
     * @param LichpvInterface $lichpvRepository
     */
    public function __construct(LichpvInterface $lichpvRepository)
    {
        $this->lichpvRepository = $lichpvRepository;
    }

    /**
     * @param LichpvTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(LichpvTable $table)
    {
        page_title()->setTitle(trans('plugins/manage::lichpv.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/manage::lichpv.create'));

        return $formBuilder->create(LichpvForm::class)->renderForm();
    }

    /**
     * Create new item
     *
     * @param LichpvRequest $request
     * @return BaseHttpResponse
     */
    public function store(LichpvRequest $request, BaseHttpResponse $response)
    {
        $lichpv = $this->lichpvRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(LICHPV_MODULE_SCREEN_NAME, $request, $lichpv));

        return $response
            ->setPreviousUrl(route('lichpv.index'))
            ->setNextUrl(route('lichpv.edit', $lichpv->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * Show edit form
     *
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $lichpv = $this->lichpvRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $lichpv));

        page_title()->setTitle(trans('plugins/manage::lichpv.edit') . ' "' . $lichpv->name . '"');

        return $formBuilder->create(LichpvForm::class, ['model' => $lichpv])->renderForm();
    }

    /**
     * @param $id
     * @param LichpvRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, LichpvRequest $request, BaseHttpResponse $response)
    {
        $lichpv = $this->lichpvRepository->findOrFail($id);

        $lichpv->fill($request->input());

        $this->lichpvRepository->createOrUpdate($lichpv);

        event(new UpdatedContentEvent(LICHPV_MODULE_SCREEN_NAME, $request, $lichpv));

        return $response
            ->setPreviousUrl(route('lichpv.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $lichpv = $this->lichpvRepository->findOrFail($id);

            $this->lichpvRepository->delete($lichpv);

            event(new DeletedContentEvent(LICHPV_MODULE_SCREEN_NAME, $request, $lichpv));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.cannot_delete'));
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $lichpv = $this->lichpvRepository->findOrFail($id);
            $this->lichpvRepository->delete($lichpv);
            event(new DeletedContentEvent(LICHPV_MODULE_SCREEN_NAME, $request, $lichpv));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
