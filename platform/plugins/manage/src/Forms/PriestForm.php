<?php

namespace Botble\Manage\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Manage\Http\Requests\PriestRequest;
use Botble\Manage\Models\Priest;

class PriestForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Priest)
            ->setValidatorClass(PriestRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('email', 'email', [
                'label' => 'Email',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => 'Nhập email',
                    'data-counter' => 120,
                ],
            ])
            ->add('phonenumber', 'phonenumber', [
                'label' => 'Số điện thoại',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => 'Nhập SĐT',
                    'data-counter' => 120,
                ],
            ])
            ->add('dob', 'date', [
                'label' => 'Ngày sinh',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => trans('core/base::forms.dob_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('dopriest', 'date', [
                'label' => 'Năm LM',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => trans('core/base::forms.dopriest_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('address', 'text', [
                'label' => 'Địa chỉ',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => 'Nhập địa chỉ',
                    'data-counter' => 120,
                ],
            ])
            ->add('note', 'text', [
                'label' => 'Ghi chú',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => 'Nhập ghi chú',
                    'data-counter' => 120,
                ],
            ])
            ->add('image', 'mediaImage', [
                'label' => trans('core/base::forms.image'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => trans('core/base::forms.image_placeholder'),
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
