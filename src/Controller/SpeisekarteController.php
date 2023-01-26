<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpeisekarteController extends AbstractController
{
    #[Route('/speisekarte', name: 'speisekarte')]
    public function index(MenuRepository $menuRepository): Response
    {
        $menues = $menuRepository->findAll();
        return $this->render('speisekarte/speisekarte.twig', [
            'menues' => $menues,
        ]);
    }
}
