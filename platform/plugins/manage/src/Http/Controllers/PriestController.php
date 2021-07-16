<?php

namespace Botble\Manage\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Manage\Http\Requests\PriestRequest;
use Botble\Manage\Repositories\Interfaces\PriestInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Manage\Tables\PriestTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Manage\Forms\PriestForm;
use Botble\Base\Forms\FormBuilder;

class PriestController extends BaseController
{
    /**
     * @var PriestInterface
     */
    protected $priestRepository;

    /**
     * PriestController constructor.
     * @param PriestInterface $priestRepository
     */
    public function __construct(PriestInterface $priestRepository)
    {
        $this->priestRepository = $priestRepository;
    }

    /**
     * @param PriestTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(PriestTable $table)
    {
        page_title()->setTitle(trans('plugins/manage::priest.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/manage::priest.create'));

        return $formBuilder->create(PriestForm::class)->renderForm();
    }

    /**
     * Create new item
     *
     * @param PriestRequest $request
     * @return BaseHttpResponse
     */
    public function store(PriestRequest $request, BaseHttpResponse $response)
    {
        $priest = $this->priestRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(PRIEST_MODULE_SCREEN_NAME, $request, $priest));

        return $response
            ->setPreviousUrl(route('priest.index'))
            ->setNextUrl(route('priest.edit', $priest->id))
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
        $priest = $this->priestRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $priest));

        page_title()->setTitle(trans('plugins/manage::priest.edit') . ' "' . $priest->name . '"');

        return $formBuilder->create(PriestForm::class, ['model' => $priest])->renderForm();
    }

    /**
     * @param $id
     * @param PriestRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, PriestRequest $request, BaseHttpResponse $response)
    {
        $priest = $this->priestRepository->findOrFail($id);

        $priest->fill($request->input());

        $this->priestRepository->createOrUpdate($priest);

        event(new UpdatedContentEvent(PRIEST_MODULE_SCREEN_NAME, $request, $priest));

        return $response
            ->setPreviousUrl(route('priest.index'))
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
            $priest = $this->priestRepository->findOrFail($id);

            $this->priestRepository->delete($priest);

            event(new DeletedContentEvent(PRIEST_MODULE_SCREEN_NAME, $request, $priest));

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
            $priest = $this->priestRepository->findOrFail($id);
            $this->priestRepository->delete($priest);
            event(new DeletedContentEvent(PRIEST_MODULE_SCREEN_NAME, $request, $priest));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
