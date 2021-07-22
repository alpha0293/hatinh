<?php

namespace Botble\Manage\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Manage\Repositories\Interfaces\DeaneryInterface;
use Botble\Manage\Repositories\Interfaces\PriestInterface;
use Botble\Manage\Repositories\Interfaces\ParishInterface;
use Botble\Manage\Repositories\Interfaces\HistoryInterface;
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
    public function __construct(DeaneryInterface $deaneryRepository, SlugInterface $slugRepository, ParishInterface $parishRepository, PriestInterface $priestRepository, HistoryInterface $historyRepository)
    {
        $this->deaneryRepository = $deaneryRepository;
        $this->slugRepository = $slugRepository;
        $this->priestRepository = $priestRepository;
        $this->parishRepository = $parishRepository;
        $this->historyRepository = $historyRepository;
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

            do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $data);
            return Theme::scope('deanery.deanery_index', compact('data'))->render();
        }

        if ($prefix == 'history') {
            $data = $this->historyRepository->getFirstBy(['id' => $slug->reference_id]);

            do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $data);
            return Theme::scope('history.view', compact('data'))->render();
        }

        if ($prefix == 'priest') {
            $data = $this->priestRepository->getFirstBy(['id' => $slug->reference_id]);

            do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $data);
            return Theme::scope('priest.view', compact('data'))->render();
        }

        if ($prefix == 'parish') {
            $data = $this->parishRepository->getFirstBy(['id' => $slug->reference_id]);

            do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $data);
            return Theme::scope('parish.view', compact('data'))->render();
        }

        if (!$data) {
            abort(404);
        }


    }

    public function getAllDeanery()
    {
        $data = Deanery::with(['parishes' => function($query){
            $query->where('status', BaseStatusEnum::PUBLISHED)->with('history');
        }])->where('status', BaseStatusEnum::PUBLISHED)->get();
        return Theme::scope('deanery.list', compact('data'))->render();
    }


}
