<?php

namespace Botble\Manage\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use \Botble\Slug\Traits\SlugTrait;

class Deanery extends BaseModel
{
    use SlugTrait;
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'deaneries';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'lmquanhat',
        'numberofparish',
        'numberofmember',
        'address',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function parishes()
    {
        return $this->hasMany(Parish::class);
    }
}
