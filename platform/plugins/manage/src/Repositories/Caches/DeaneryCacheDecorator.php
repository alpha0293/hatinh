<?php

namespace Botble\Manage\Repositories\Caches;

use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\Manage\Repositories\Interfaces\DeaneryInterface;

class DeaneryCacheDecorator extends CacheAbstractDecorator implements DeaneryInterface
{

	/**
     * {@inheritdoc}
     */
    public function getListDeaneryNotThis($selected)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
