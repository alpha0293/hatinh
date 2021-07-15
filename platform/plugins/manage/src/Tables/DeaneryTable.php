<?php

namespace Botble\Manage\Tables;

use Auth;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Manage\Repositories\Interfaces\DeaneryInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Botble\Manage\Models\Deanery;

class DeaneryTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * DeaneryTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlDevTool
     * @param DeaneryInterface $deaneryRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlDevTool, DeaneryInterface $deaneryRepository)
    {
        $this->repository = $deaneryRepository;
        $this->setOption('id', 'table-plugins-deanery');
        parent::__construct($table, $urlDevTool);

        if (!Auth::user()->hasAnyPermission(['deanery.edit', 'deanery.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     * @since 2.1
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                if (!Auth::user()->hasPermission('deanery.edit')) {
                    return $item->name;
                }
                return anchor_link(route('deanery.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return table_checkbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return date_from_database($item->created_at, config('core.base.general.date_format.date'));
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return table_actions('deanery.edit', 'deanery.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Get the query object to be processed by table.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     * @since 2.1
     */
    public function query()
    {
        $model = $this->repository->getModel();
        $query = $model->select([
            'deaneries.id',
            'deaneries.name',
            'deaneries.lmquanhat',
            'deaneries.numberofparish',
            'deaneries.numberofmember',
            'deaneries.address',
            'deaneries.created_at',
            'deaneries.status',
        ]);

        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model));
    }

    /**
     * @return array
     * @since 2.1
     */
    public function columns()
    {
        return [
            'id' => [
                'name'  => 'deaneries.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name'  => 'deaneries.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'address' => [
                'name' => 'deaneries.address',
                'title' => 'Địa chỉ',
                'class' => 'text-left',
            ],'lmquanhat' => [
                'name' => 'deaneries.lmquanhat',
                'title' => 'Linh mục quản hạt',
                'class' => 'text-left',
            ],'numberofmember' => [
                'name' => 'deaneries.numberofmember',
                'title' => 'Số Giáo dân',
                'class' => 'text-left',
            ],'numberofparish' => [
                'name' => 'deaneries.numberofparish',
                'title' => 'Số Giáo xứ',
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'deaneries.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'name'  => 'deaneries.status',
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    /**
     * @return array
     * @since 2.1
     * @throws \Throwable
     */
    public function buttons()
    {
        $buttons = $this->addCreateButton(route('deanery.create'), 'deanery.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Deanery::class);
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('deanery.deletes'), 'deanery.destroy', parent::bulkActions());
    }

    /**
     * @return array
     */
    public function getBulkChanges(): array
    {
        return [
            'deaneries.name' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'deaneries.status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'deaneries.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }
}
