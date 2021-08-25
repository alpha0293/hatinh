<?php

namespace Botble\Manage\Repositories\Eloquent;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Botble\Manage\Repositories\Interfaces\ParishInterface;
use Eloquent;
use Exception;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;

class ParishRepository extends RepositoriesAbstract implements ParishInterface
{
	/**
     * {@inheritdoc}
     */
    public function getListParishNotThis($parishId, $deaneryId)
    {
        if (!is_array($parishId)) {
            $parishId = [$parishId];
        }
        $data = $this->model
            ->where('parishes.status', BaseStatusEnum::PUBLISHED)
            ->where('parishes.deanery_id','=',$deaneryId)
            ->whereNotIn('parishes.id', $parishId)
            ->select('parishes.*')
            ->with('slugable')
            ->orderBy('parishes.name', 'desc');
        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
