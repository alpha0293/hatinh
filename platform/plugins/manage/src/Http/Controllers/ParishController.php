<?php

namespace Botble\Manage\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Manage\Http\Requests\ParishRequest;
use Botble\Manage\Repositories\Interfaces\ParishInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Manage\Tables\ParishTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Manage\Forms\ParishForm;
use Botble\Base\Forms\FormBuilder;

class ParishController extends BaseController
{
    /**
     * @var ParishInterface
     */
    protected $parishRepository;

    /**
     * ParishController constructor.
     * @param ParishInterface $parishRepository
     */
    public function __construct(ParishInterface $parishRepository)
    {
        $this->parishRepository = $parishRepository;
    }

    /**
     * @param ParishTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ParishTable $table)
    {
        page_title()->setTitle(trans('plugins/manage::parish.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/manage::parish.create'));

        return $formBuilder->create(ParishForm::class)->renderForm();
    }

    /**
     * Create new item
     *
     * @param ParishRequest $request
     * @return BaseHttpResponse
     */
    public function store(ParishRequest $request, BaseHttpResponse $response)
    {
        $parish = $this->parishRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(PARISH_MODULE_SCREEN_NAME, $request, $parish));

        return $response
            ->setPreviousUrl(route('parish.index'))
            ->setNextUrl(route('parish.edit', $parish->id))
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
        $parish = $this->parishRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $parish));

        page_title()->setTitle(trans('plugins/manage::parish.edit') . ' "' . $parish->name . '"');

        return $formBuilder->create(ParishForm::class, ['model' => $parish])->renderForm();
    }

    /**
     * @param $id
     * @param ParishRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, ParishRequest $request, BaseHttpResponse $response)
    {
        $parish = $this->parishRepository->findOrFail($id);

        $parish->fill($request->input());

        $this->parishRepository->createOrUpdate($parish);

        event(new UpdatedContentEvent(PARISH_MODULE_SCREEN_NAME, $request, $parish));

        return $response
            ->setPreviousUrl(route('parish.index'))
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
            $parish = $this->parishRepository->findOrFail($id);

            $this->parishRepository->delete($parish);

            event(new DeletedContentEvent(PARISH_MODULE_SCREEN_NAME, $request, $parish));

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
            $parish = $this->parishRepository->findOrFail($id);
            $this->parishRepository->delete($parish);
            event(new DeletedContentEvent(PARISH_MODULE_SCREEN_NAME, $request, $parish));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
