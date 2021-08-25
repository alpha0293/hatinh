<?php

namespace Botble\Manage\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Manage\Repositories\Interfaces\DeaneryInterface;
use Botble\Manage\Repositories\Interfaces\PriestInterface;
use Botble\Manage\Repositories\Interfaces\ParishInterface;
use Botble\Manage\Repositories\Interfaces\HistoryInterface;
use Botble\Manage\Repositories\Interfaces\LichpvInterface;
use Botble\SeoHelper\SeoOpenGraph;
use Botble\Slug\Repositories\Interfaces\SlugInterface;
use Manage;
use Illuminate\Routing\Controller;
use SeoHelper;
use Theme;
use Botble\Manage\Models\Deanery;
use Botble\Manage\Models\Parish;
use Botble\Manage\Models\Priest;
use Botble\Manage\Models\History;
use Botble\Manage\Models\Lichpv;

class PublicController extends Controller
{

    /**
     * @var DeaneryInterface
     */
    protected $deaneryRepository;
    protected $priestRepository;
    protected $parishRepository;
    protected $historyRepository;

    /**
     * @var SlugInterface
     */
    protected $slugRepository;

    /**
     * PublicController constructor.
     * @param DeaneryInterface $deaneryRepository
     * @param SlugInterface $slugRepository
     *
     */
    public function __construct(DeaneryInterface $deaneryRepository, SlugInterface $slugRepository, ParishInterface $parishRepository, PriestInterface $priestRepository, HistoryInterface $historyRepository, LichpvInterface $lichpvRepository)
    {
        $this->deaneryRepository = $deaneryRepository;
        $this->slugRepository = $slugRepository;
        $this->priestRepository = $priestRepository;
        $this->parishRepository = $parishRepository;
        $this->parishRepository = $parishRepository;
        $this->lichpvRepository = $lichpvRepository;
    }

    /**
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */

    /**
     * @param $slug
     * @return \Illuminate\Http\Response|\Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     *
     */

    public function getBySlug($slug, \Botble\Slug\Repositories\Interfaces\SlugInterface $slugRepository)
    {
        $prefix = \Request::segment(1);
        $slug = $slugRepository->getFirstBy(['key' => $slug, 'prefix' => $prefix]);
        if (!$slug) {
            abort(404);
        }

        if ($prefix == 'deanery') {
            $data = $this->deaneryRepository->getFirstBy(['id' => $slug->reference_id]);

            \SeoHelper::setTitle($data->name)
                ->setDescription($data->name);
            if (!$data) {
            abort(404);
        }
            do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $data);
            return Theme::layout('no-sidebar')->scope('deanery.deanery_index', compact('data'))->render();
        }

        if ($prefix == 'history') {
            $data = $this->historyRepository->getFirstBy(['id' => $slug->reference_id]);
            \SeoHelper::setTitle($data->name)
                ->setDescription($data->name);
            if (!$data) {
            abort(404);
        }
            do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $data);
            return Theme::scope('history.view', compact('data'))->render();
        }

        if ($prefix == 'priest') {
            $data = $this->priestRepository->getFirstBy(['id' => $slug->reference_id]);
            \SeoHelper::setTitle($data->name)
                ->setDescription($data->name);
            if (!$data) {
            abort(404);
        }
            do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $data);
            return Theme::scope('priest.view', compact('data'))->render();
        }

        if ($prefix == 'parish') {
            $data = $this->parishRepository->getFirstBy(['id' => $slug->reference_id]);
            \SeoHelper::setTitle($data->name)
                ->setDescription($data->name);
            if (!$data) {
            abort(404);
        }
            do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $data);
            return Theme::layout('no-sidebar')->scope('parish.view', compact('data','slug'))->render();
        }
    }

    public function getAllDeanery()
    {
        $data = Deanery::with(['parishes' => function($query){
            $query->where('status', BaseStatusEnum::PUBLISHED)->with('history');
        }])->where('status', BaseStatusEnum::PUBLISHED)->get();
        \SeoHelper::setTitle('Danh sách Giáo Hạt')
            ->setDescription('Danh sách Giáo Hạt');
        return Theme::scope('deanery.list', compact('data'))->render();
    }

    public function getLichPV($slug)
    {
        $month = $slug;
        $data = Lichpv::all()->where('name',$month);
      
            return Theme::scope('lichpv.index', compact('data'))->render();
      

    }
    public function getLichPVnonSlug()
    {
        $data = Lichpv::all()->where('name','can-biet-truoc');
      
            return Theme::scope('lichpv.index', compact('data'))->render();
        
    }
     public function getAllPriest()
    {
        $data = Priest::all()->where('status', BaseStatusEnum::PUBLISHED);
        $data = $data->sortByDesc('priests.updated_at');
        \SeoHelper::setTitle('Danh sách Linh Mục')
            ->setDescription('Danh sách Linh Mục');
        return Theme::scope('priest.viewAll', compact('data'))->render();

    }
     public function getAllParish()
    {
        $deanery = Deanery::all()->where('status', BaseStatusEnum::PUBLISHED);
        $deanery = $deanery->sortByDesc('deaneries.name');
        $data = Parish::all()->where('status', BaseStatusEnum::PUBLISHED);
        $data = $data->sortByDesc('parishes.updated_at');
        \SeoHelper::setTitle('Danh sách Giáo xứ')
            ->setDescription('Danh sách Giáo xứ');
        return Theme::scope('parish.list', compact('data','deanery'))->render();

    }
    public function getAllImgParish($slug, \Botble\Slug\Repositories\Interfaces\SlugInterface $slugRepository)
    {
        $prefix = \Request::segment(1);
        $slug = $slugRepository->getFirstBy(['key' => $slug, 'prefix' => $prefix]);
        if (!$slug) {
            abort(404);
        }
         $data = $this->parishRepository->getFirstBy(['id' => $slug->reference_id]);;
         $img = render_gallery_giaoxu($data);
          \SeoHelper::setTitle('Hình ảnh'.' '.$data->name)
                ->setDescription($data->name);
            do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $data);
        return Theme::scope('parish.viewimg', compact('img','data'))->render();
    }
}


