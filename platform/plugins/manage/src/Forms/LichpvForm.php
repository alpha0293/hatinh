<?php

namespace Botble\Manage\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Manage\Http\Requests\LichpvRequest;
use Botble\Manage\Models\Lichpv;

class LichpvForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Lichpv)
            ->setValidatorClass(LichpvRequest::class)
            ->withCustomFields()
            ->add('name', 'select', [
                'label'      => 'Chọn Tháng',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => [
                    0 => __('Những điều cần biết trước'),
                    1 => __('Tháng 1'),
                    2 => __('Tháng 2'),
                    3 => __('Tháng 3'),
                    4 => __('Tháng 4'),
                    5 => __('Tháng 5'),
                    6 => __('Tháng 6'),
                    7 => __('Tháng 7'),
                    8 => __('Tháng 8'),
                    9 => __('Tháng 9'),
                    10 => __('Tháng 10'),
                    11 => __('Tháng 11'),
                    12 => __('Tháng 12'),
                ],
            ])
            ->add('year', 'text', [
                'label' => 'Năm Phụng vụ',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder'  => 'Nhập năm phụng vụ',
                    'data-counter' => 120,
                ],
            ])
            ->add('content', 'editor', [
                'label'      => 'Lịch PV',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Lịch PV',
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
