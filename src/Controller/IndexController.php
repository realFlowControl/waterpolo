<?php

namespace App\Controller;

use App\Service\NewsService;
use App\Service\YouTubeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @var NewsService
     */
    private $newsService;

    /**
     * @var YouTubeService
     */
    private $youTubeService;

    public function __construct(NewsService $newsService, YouTubeService $youTubeService)
    {
        $this->newsService = $newsService;
        $this->youTubeService = $youTubeService;
    }

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $news = $this->newsService->getNews();
        $youTubeVideos = $this->youTubeService->getItemsFromChannel();

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'news' => $news,
            'youTubeVideos' => $youTubeVideos
        ]);
    }
}
