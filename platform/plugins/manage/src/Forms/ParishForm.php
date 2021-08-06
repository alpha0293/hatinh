<?php

namespace Botble\Manage\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Manage\Http\Requests\ParishRequest;
use Botble\Manage\Models\Parish;

class ParishForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Parish)
            ->setValidatorClass(ParishRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('address', 'text', [
                'label'      => 'Địa chỉ',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Nhập địa chỉ...',
                    'data-counter' => 120,
                ],
            ])
            ->add('phonenumber', 'number', [
                'label'      => 'SĐT',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Nhập SĐT...',
                    'data-counter' => 120,
                ],
            ])
            ->add('totalmember', 'number', [
                'label'      => 'Số Giáo dân',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Nhập số Giáo dân...',
                    'data-counter' => 120,
                ],
            ])
            ->add('totalGiaoho', 'number', [
                'label'      => 'Số Giáo họ',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Nhập số giáo họ...',
                    'data-counter' => 120,
                ],
            ])
            ->add('deanery_id', 'select', [
                'label'      => 'Chọn Giáo hạt',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => get_all_deanery(),
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
