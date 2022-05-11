<?php

namespace App\Controller;
use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrepriseController extends AbstractController
{
    #[Route('/stats', name: 'app_stats')]
    public function index(ManagerRegistry $doctrine,): Response {
        $repo = $doctrine->getRepository(PFE::class);
        $PFEparEntreprise = $repo->countPFE();

        return $this->render('stats/index.html.twig', [
            'PFEparEntreprise' => $PFEparEntreprise
        ]);
    }
    #[Route('/all', name: 'app_all')]
    public function afficheAll(ManagerRegistry $doctrine,): Response {
        $repo = $doctrine->getRepository(PFE::class);
        $allPFE = $repo->findAll();

        return $this->render('all/index.html.twig', [
            'listePFE' => $allPFE
        ]);
    }
}
