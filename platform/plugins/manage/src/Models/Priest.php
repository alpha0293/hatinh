<?php

namespace Botble\Manage\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use \Botble\Slug\Traits\SlugTrait;

class Priest extends BaseModel
{
    use EnumCastable;
    use SlugTrait;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'priests';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phonenumber',
        'dob',
        'dopriest',
        'address',
        'note',
        'image',
        'status',
        'quequan',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
