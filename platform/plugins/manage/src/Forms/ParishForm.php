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
            ->add('lmquanxu', 'text', [
                'label'      => 'Linh mục quản xứ',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Nhập LM quản xứ...',
                ],
            ])
            ->add('lmpho', 'text', [
                'label'      => 'Linh mục phó',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Nhập LM phó...',
                ],
            ])
            ->add('lmphutrach', 'text', [
                'label'      => 'Linh mục phụ trách',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Nhập LM phụ trách...',
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
            ->add('note', 'text', [
                'label'      => 'Ghi chú',
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'            => 4,
                    'placeholder'     => 'Nhập ghi chú',
                ],
            ])
            ->add('lmtungquan', 'editor', [
                'label'      => 'LM từng quản',
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'            => 4,
                    'placeholder'     => 'Nhập thông tin LM từng quản xứ',
                ],
            ])
            ->add('lmquehuong', 'editor', [
                'label'      => 'Danh sách LM quê hương',
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'            => 4,
                    'placeholder'     => 'Nhập danh sách LM quê hương',
                ],
            ])
            ->add('sotusiquehuong', 'number', [
                'label'      => 'Số tu sĩ',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Nhập số tu sĩ...',
                ],
            ])
            ->add('sochungsinh', 'number', [
                'label'      => 'Số Chủng sinh',
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => 'Nhập số Chủng sinh',
                ],
            ])
            ->add('hoidonghiendien', 'editor', [
                'label'      => 'Hội dòng trong Giáo xứ',
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'            => 4,
                    'placeholder'     => 'Nhập thông tin danh sách hội dòng',
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
