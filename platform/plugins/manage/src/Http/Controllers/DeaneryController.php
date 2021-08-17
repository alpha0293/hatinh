<?php

namespace Botble\Manage\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Manage\Http\Requests\DeaneryRequest;
use Botble\Manage\Repositories\Interfaces\DeaneryInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Manage\Tables\DeaneryTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Manage\Forms\DeaneryForm;
use Botble\Base\Forms\FormBuilder;

class DeaneryController extends BaseController
{
    /**
     * @var DeaneryInterface
     */
    protected $deaneryRepository;

    /**
     * DeaneryController constructor.
     * @param DeaneryInterface $deaneryRepository
     */
    public function __construct(DeaneryInterface $deaneryRepository)
    {
        $this->deaneryRepository = $deaneryRepository;
    }

    /**
     * @param DeaneryTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(DeaneryTable $table)
    {
        page_title()->setTitle(trans('plugins/manage::deanery.name'));
       
        return $table->renderTable();
    }
     /**
     * @param DeaneryTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function indexmenu(DeaneryTable $table)
    {
        page_title()->setTitle(trans('plugins/blog::tags.menu'));

        return $dataTable->renderTable();
    }
    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/manage::deanery.create'));

        return $formBuilder->create(DeaneryForm::class)->renderForm();
    }

    /**
     * Create new item
     *
     * @param DeaneryRequest $request
     * @return BaseHttpResponse
     */
    public function store(DeaneryRequest $request, BaseHttpResponse $response)
    {
        $deanery = $this->deaneryRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(DEANERY_MODULE_SCREEN_NAME, $request, $deanery));

        return $response
            ->setPreviousUrl(route('deanery.index'))
            ->setNextUrl(route('deanery.edit', $deanery->id))
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
        $deanery = $this->deaneryRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $deanery));

        page_title()->setTitle(trans('plugins/manage::deanery.edit') . ' "' . $deanery->name . '"');

        return $formBuilder->create(DeaneryForm::class, ['model' => $deanery])->renderForm();
    }

    /**
     * @param $id
     * @param DeaneryRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, DeaneryRequest $request, BaseHttpResponse $response)
    {
        $deanery = $this->deaneryRepository->findOrFail($id);

        $deanery->fill($request->input());

        $this->deaneryRepository->createOrUpdate($deanery);

        event(new UpdatedContentEvent(DEANERY_MODULE_SCREEN_NAME, $request, $deanery));

        return $response
            ->setPreviousUrl(route('deanery.index'))
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
            $deanery = $this->deaneryRepository->findOrFail($id);

            $this->deaneryRepository->delete($deanery);

            event(new DeletedContentEvent(DEANERY_MODULE_SCREEN_NAME, $request, $deanery));

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
            $deanery = $this->deaneryRepository->findOrFail($id);
            $this->deaneryRepository->delete($deanery);
            event(new DeletedContentEvent(DEANERY_MODULE_SCREEN_NAME, $request, $deanery));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
