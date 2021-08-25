<?php

namespace Botble\Manage\Repositories\Eloquent;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Botble\Manage\Repositories\Interfaces\DeaneryInterface;
use Eloquent;
use Exception;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;

class DeaneryRepository extends RepositoriesAbstract implements DeaneryInterface
{

	/**
     * {@inheritdoc}
     */
    public function getListDeaneryNotThis($selected)
    {
        if (!is_array($selected)) {
            $selected = [$selected];
        }
        $data = $this->model
            ->where('deaneries.status', BaseStatusEnum::PUBLISHED)
            ->whereNotIn('deaneries.id', $selected)
            ->select('deaneries.*')
            ->with('slugable')
            ->orderBy('deaneries.name', 'desc');
        return $this->applyBeforeExecuteQuery($data)->get();
    }
}

