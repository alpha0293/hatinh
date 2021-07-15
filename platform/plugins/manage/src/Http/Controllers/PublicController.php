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
        $slug = $slugRepository->getFirstBy(['key' => $slug, 'reference_type' => Deanery::class]);
        if (!$slug) {
            abort(404);
        }

        $data = $this->deaneryRepository->getFirstBy(['id' => $slug->reference_id]);
        if (!$data) {
            abort(404);
        }

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, DEANERY_MODULE_SCREEN_NAME, $data);

        return Theme::scope('deanery_index', compact('data'))->render();
    }

    public function getAllDeanery()
    {
        $deanery = $this->deaneryRepository->all();
        return Theme::scope('deanery', compact('deanery'), 'plugins/deanery::themes.deanery_all')->render();
    }
}
