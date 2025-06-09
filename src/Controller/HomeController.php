<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Repository\NewsRepository;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(NewsRepository $newsRepository): Response
    {

        $latestNews = $newsRepository->findBy([], ['id' => 'DESC'], 5);


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'latestNews' => $latestNews,
        ]);
    }
}
