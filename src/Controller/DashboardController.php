<?php

namespace App\Controller;

use App\Repository\WebsiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{

    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(WebsiteRepository $websiteRepository): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'websites' => $websiteRepository->findBy([], [
                'created' => 'DESC',
            ]),
        ]);
    }
}
