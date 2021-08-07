<?php

namespace Botble\Manage\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use \Botble\Slug\Traits\SlugTrait;
use Botble\Manage\Models\Deanery;

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
        'lmquanxu',
        'lmpho',
        'lmphutrach',
        'note',
        'lmtungquan',
        'lmquehuong',
        'sotusiquehuong',
        'sochungsinh',
        'hoidonghiendien',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function deanery()
    {
        return $this->belongsTo(Deanery::class);
    }
}
