<?php

namespace App\Controller;

use App\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class SampleDataController extends AbstractController
{
    #[Route('/sample/data', name: 'app_sample_data')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $blogs = [
            ['title' => 'Happy New Year 2023!!!', 'date' => '2023-01-22', 'descripe' => 'Wir wünschen Ihnen alles Gute ins Jahr des Hasens 2023!!!', 'img' => 'newyear'],
            ['title' => 'Mondfest 2023', 'date' => '2022-09-10', 'descripe' => 'Alles Gute zum Mondfest 2022', 'img' => 'moon'],
        ];

        foreach($blogs as $blog){
            $data = new Blog;
            $data->setTitle($blog['title']);
            $data->setDate($blog['date']);
            $data->setDescripe($blog['descripe']);
            $data->setImg($blog['img']);

            $em = $doctrine->getManager();
            $em->persist($data);
            $em->flush();
        }


        return $this->render('sample_data/index.html.twig');
    }
}
