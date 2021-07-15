<?php

namespace Botble\Manage\Tables;

use Auth;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Manage\Repositories\Interfaces\PriestInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Botble\Manage\Models\Priest;
use Html;

class PriestTable extends TableAbstract
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
     * PriestTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlDevTool
     * @param PriestInterface $priestRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlDevTool, PriestInterface $priestRepository)
    {
        $this->repository = $priestRepository;
        $this->setOption('id', 'table-plugins-priest');
        parent::__construct($table, $urlDevTool);

        if (!Auth::user()->hasAnyPermission(['priest.edit', 'priest.destroy'])) {
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
                if (!Auth::user()->hasPermission('priest.edit')) {
                    return $item->name;
                }
                return anchor_link(route('priest.edit', $item->id), $item->name);
            })
            ->editColumn('image', function ($item) {
                if ($this->request()->input('action') === 'excel') {
                    return get_object_image($item->image, 'thumb');
                }
                return Html::image(get_object_image($item->image, 'thumb'), $item->name, ['width' => 50]);
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
                return table_actions('priest.edit', 'priest.destroy', $item);
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
            'priests.id',
            'priests.name',
            'priests.email',
            'priests.phonenumber',
            'priests.dob',
            'priests.dopriest',
            'priests.address',
            'priests.note',
            'priests.image',
            'priests.created_at',
            'priests.status',
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
                'name'  => 'priests.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name'  => 'priests.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'email'       => [
                'name'  => 'priests.email',
                'title' => trans('core/base::tables.email'),
                'class' => 'text-left',
            ],
            'phonenumber'       => [
                'name'  => 'priests.phonenumber',
                'title' => 'Số ĐT',
                'class' => 'text-left',
            ],
            'dob'       => [
                'name'  => 'priests.dob',
                'title' => 'Ngày sinh',
                'class' => 'text-left',
            ],
            'dopriest'       => [
                'name'  => 'priests.dopriest',
                'title' => 'Năm LM',
                'class' => 'text-left',
            ],
            'address'       => [
                'name'  => 'priests.address',
                'title' => 'Địa Chỉ',
                'class' => 'text-left',
            ],
            'note'       => [
                'name'  => 'priests.note',
                'title' => 'Ghi chú',
                'class' => 'text-left',
            ],
            'image'       => [
                'name'  => 'priests.image',
                'title' => trans('core/base::tables.image'),
                'width' => '70px',
            ],
            'created_at' => [
                'name'  => 'priests.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'name'  => 'priests.status',
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
        $buttons = $this->addCreateButton(route('priest.create'), 'priest.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Priest::class);
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('priest.deletes'), 'priest.destroy', parent::bulkActions());
    }

    /**
     * @return array
     */
    public function getBulkChanges(): array
    {
        return [
            'priests.name' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'priests.status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'priests.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }
}
