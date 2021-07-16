<?php

namespace Botble\Manage\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Manage\Http\Requests\HistoryRequest;
use Botble\Manage\Repositories\Interfaces\HistoryInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Manage\Tables\HistoryTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Manage\Forms\HistoryForm;
use Botble\Base\Forms\FormBuilder;

class HistoryController extends BaseController
{
    /**
     * @var HistoryInterface
     */
    protected $historyRepository;

    /**
     * HistoryController constructor.
     * @param HistoryInterface $historyRepository
     */
    public function __construct(HistoryInterface $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    /**
     * @param HistoryTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(HistoryTable $table)
    {
        page_title()->setTitle(trans('plugins/manage::history.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/manage::history.create'));

        return $formBuilder->create(HistoryForm::class)->renderForm();
    }

    /**
     * Create new item
     *
     * @param HistoryRequest $request
     * @return BaseHttpResponse
     */
    public function store(HistoryRequest $request, BaseHttpResponse $response)
    {
        $history = $this->historyRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(HISTORY_MODULE_SCREEN_NAME, $request, $history));

        return $response
            ->setPreviousUrl(route('history.index'))
            ->setNextUrl(route('history.edit', $history->id))
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
        $history = $this->historyRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $history));

        page_title()->setTitle(trans('plugins/manage::history.edit') . ' "' . $history->name . '"');

        return $formBuilder->create(HistoryForm::class, ['model' => $history])->renderForm();
    }

    /**
     * @param $id
     * @param HistoryRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, HistoryRequest $request, BaseHttpResponse $response)
    {
        $history = $this->historyRepository->findOrFail($id);

        $history->fill($request->input());

        $this->historyRepository->createOrUpdate($history);

        event(new UpdatedContentEvent(HISTORY_MODULE_SCREEN_NAME, $request, $history));

        return $response
            ->setPreviousUrl(route('history.index'))
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
            $history = $this->historyRepository->findOrFail($id);

            $this->historyRepository->delete($history);

            event(new DeletedContentEvent(HISTORY_MODULE_SCREEN_NAME, $request, $history));

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
            $history = $this->historyRepository->findOrFail($id);
            $this->historyRepository->delete($history);
            event(new DeletedContentEvent(HISTORY_MODULE_SCREEN_NAME, $request, $history));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
