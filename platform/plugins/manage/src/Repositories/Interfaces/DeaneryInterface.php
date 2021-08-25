<?php

namespace Botble\Manage\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;
use Eloquent;

interface DeaneryInterface extends RepositoryInterface
{

	/**
     * @param array $selected
     * @param int $limit
     * @return mixed
     */
    public function getListDeaneryNotThis($selected);
}
