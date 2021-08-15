<?php

namespace Botble\Manage\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Manage\Http\Requests\DeaneryRequest;
use Botble\Manage\Models\Deanery;

class DeaneryForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Deanery)
            ->setValidatorClass(DeaneryRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Tên giáo hạt',
                    'data-counter' => 120,
                ],
            ])
            ->add('sohat', 'text', [
                'label'      => 'Sở hạt',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Sở hạt',
                    'data-counter' => 120,
                ],
            ])
            ->add('lmquanhat', 'text', [
                'label'      => 'LM quản hạt',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'LM quản hạt',
                    'data-counter' => 120,
                ],
            ])
            ->add('address', 'text', [
                'label'      => 'Địa chỉ',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Nhập địa chỉ',
                    'data-counter' => 120,
                ],
            ])
            ->add('content', 'editor', [
                'label'      => 'Lịch sử giáo hạt',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'rows'         => 4,
                ],
            ])
            ->add('image', 'mediaImage', [
                'label'      => 'Chọn ảnh',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
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
