<?php

namespace Botble\Manage\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class ParishRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'required',
            'deanery_id' => 'required',
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
    public function attributes()
    {
        return [
            'deanery_id' => 'Giáo hạt',
        ];
    }
}
