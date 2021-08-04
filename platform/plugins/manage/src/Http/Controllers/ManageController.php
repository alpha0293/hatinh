<?php

namespace Botble\Manage\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Manage\Http\Requests\ManageRequest;
use Botble\Manage\Repositories\Interfaces\ManageInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Manage\Tables\ManageTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Manage\Forms\ManageForm;
use Botble\Base\Forms\FormBuilder;
use Illuminate\View\View;
use Botble\Manage\Models\Deanery;
use Botble\Manage\Models\Parish;
use Botble\Manage\Models\Priest;
use Botble\Manage\Models\History;
use Botble\Base\Enums\BaseStatusEnum;

class ManageController extends BaseController
{
    /**
     * @var ManageInterface
     */
    protected $manageRepository;

    /**
     * ManageController constructor.
     * @param ManageInterface $manageRepository
     */
    public function __construct(ManageInterface $manageRepository)
    {
        $this->manageRepository = $manageRepository;
    }

    /**
     * @param ManageTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ManageTable $table)
    {
        $priest = Priest::all()->where('status', BaseStatusEnum::PUBLISHED);
        $parish = Parish::all()->where('status', BaseStatusEnum::PUBLISHED);
        $deanery = Deanery::all()->where('status', BaseStatusEnum::PUBLISHED);
        return view('plugins/manage::dashboard',compact('priest','parish','deanery'));
        page_title()->setTitle(trans('plugins/manage::manage.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/manage::manage.create'));

        return $formBuilder->create(ManageForm::class)->renderForm();
    }

    /**
     * Create new item
     *
     * @param ManageRequest $request
     * @return BaseHttpResponse
     */
    public function store(ManageRequest $request, BaseHttpResponse $response)
    {
        $manage = $this->manageRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(MANAGE_MODULE_SCREEN_NAME, $request, $manage));

        return $response
            ->setPreviousUrl(route('manage.index'))
            ->setNextUrl(route('manage.edit', $manage->id))
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
        $manage = $this->manageRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $manage));

        page_title()->setTitle(trans('plugins/manage::manage.edit') . ' "' . $manage->name . '"');

        return $formBuilder->create(ManageForm::class, ['model' => $manage])->renderForm();
    }

    /**
     * @param $id
     * @param ManageRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, ManageRequest $request, BaseHttpResponse $response)
    {
        $manage = $this->manageRepository->findOrFail($id);

        $manage->fill($request->input());

        $this->manageRepository->createOrUpdate($manage);

        event(new UpdatedContentEvent(MANAGE_MODULE_SCREEN_NAME, $request, $manage));

        return $response
            ->setPreviousUrl(route('manage.index'))
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
            $manage = $this->manageRepository->findOrFail($id);

            $this->manageRepository->delete($manage);

            event(new DeletedContentEvent(MANAGE_MODULE_SCREEN_NAME, $request, $manage));

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
            $manage = $this->manageRepository->findOrFail($id);
            $this->manageRepository->delete($manage);
            event(new DeletedContentEvent(MANAGE_MODULE_SCREEN_NAME, $request, $manage));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
