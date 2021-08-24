<?php
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Supports\SortItemsWithChildrenHelper;
use Botble\Manage\Repositories\Interfaces\ParishInterface;
use Botble\Manage\Repositories\Interfaces\PriestInterface;
use Botble\Manage\Repositories\Interfaces\DeaneryInterface;
use Botble\Manage\Repositories\Interfaces\HistoryInterface;
use Illuminate\Support\Arr;

if (!function_exists('get_all_deanery')) {
    /**
     * @return array
     * @throws Exception
     */
    function get_all_deanery()
    {
    	$data = app(DeaneryInterface::class)->getModel()->all()->where('status',BaseStatusEnum::PUBLISHED)->pluck('name','id')->toArray();
        return $data;
    }
}

if (!function_exists('get_all_priest')) {
    /**
     * @return array
     * @throws Exception
     */
    function get_all_priest()
    {
    	$data = app(PriestInterface::class)->getModel()->all()->where('status',BaseStatusEnum::PUBLISHED)->pluck('name','id')->toArray();
        return $data;
    }
}

if (!function_exists('get_all_parish')) {
    /**
     * @return array
     * @throws Exception
     */
    function get_all_parish()
    {
        $data = app(ParishInterface::class)->getModel()->all()->where('status',BaseStatusEnum::PUBLISHED)->pluck('name','id')->toArray();
        return $data;
    }
}
