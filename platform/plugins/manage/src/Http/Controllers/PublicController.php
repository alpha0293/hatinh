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
        // return $slug;
        $slug = $slugRepository->getFirstBy(['key' => $slug, 'reference' => DEANERY_MODULE_SCREEN_NAME]);
        if (!$slug) {
            abort(404);
        }
        return $slug;
        $deanery = $this->deaneryRepository
            ->getFirstBy([
                'id'     => $slug->reference_id,
                'status' => BaseStatusEnum::PUBLISHED,
            ]);
        if (!$deanery) {
            abort(404);
        }
        // return $deanery->parishes;
        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $deanery);
        return Theme::scope('deanery', compact('deanery'), 'plugins/deanery::themes.deanery')->render();
    }

    public function getAllDeanery()
    {
        $deanery = $this->deaneryRepository->all();
        return Theme::scope('deanery', compact('deanery'), 'plugins/deanery::themes.deanery_all')->render();
    }
}
