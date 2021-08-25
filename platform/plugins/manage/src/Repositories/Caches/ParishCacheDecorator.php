<?php

namespace Botble\Manage\Repositories\Caches;

use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\Manage\Repositories\Interfaces\ParishInterface;

class ParishCacheDecorator extends CacheAbstractDecorator implements ParishInterface
{
	 /**
     * {@inheritdoc}
     */
    public function getListParishNotThis($parishId, $deaneryId)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
