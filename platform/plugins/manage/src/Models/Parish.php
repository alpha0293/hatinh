<?php

namespace Botble\Manage\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use \Botble\Slug\Traits\SlugTrait;

class Parish extends BaseModel
{
    use EnumCastable;
    use SlugTrait;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parishes';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'phonenumber',
        'totalmember',
        'totalGiaoho',
        'deanery_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
