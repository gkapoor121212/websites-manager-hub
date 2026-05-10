<?php

namespace App\Controller;

use App\Entity\Website;
use App\Form\WebsiteType;
use App\Repository\WebsiteRepository;
use App\Service\WebsiteScreenshotService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/websites')]
class WebsiteController extends AbstractController
{

    public function __construct()
    {
        $now = new \DateTimeImmutable();

        $this->created = $now;
        $this->updated = $now;
    }

    #[Route('/new', name: 'app_website_new')]
    public function new(Request $request, EntityManagerInterface $entityManager, WebsiteScreenshotService $screenshotService): Response
    {
        $website = new Website();

        $form = $this->createForm(WebsiteType::class, $website);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $website->setUpdated(new \DateTimeImmutable());
            $entityManager->persist($website);
            $entityManager->flush();

            $screenshotPath = $screenshotService->capture($website);
            $website->setScreenshotPath($screenshotPath);
            $website->setUpdated(new \DateTimeImmutable());
            $entityManager->flush();

            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('website/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_website_show')]
    public function show(Website $website): Response
    {
        return $this->render('website/show.html.twig', [
            'website' => $website,
        ]);
    }
}