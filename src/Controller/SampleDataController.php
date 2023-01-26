<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\Menu;
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

        $menues = [
            ['name' => 'Frühlingsrollen', 'descripe' => 'knackige Frühlingsrollen mit vegetarischer Füllung', 'price' => '8.00', 'img' => 'springroll'],
            ['name' => 'Fried Rice mit Cervetten', 'descripe' => 'Gebratene Reis nach Hongkong Art mit frischen Crevetten', 'price' => '23.00', 'img' => 'friedrice'],
            ['name' => 'Szechuan', 'descripe' => 'Gericht nach Szechuan Art mit Poulet (scharf)', 'price' => '25.00', 'img' => 'szechuan'],
            ['name' => 'Reis in Süss-Sauer Sauce', 'descripe' => 'Gedämpfte Reis in Süss-Sauer Sauce mit Poulet', 'price' => '18.00', 'img' => 'sweetsour'],
            ['name' => 'Kungpao', 'descripe' => 'Reisgericht nach Kungpao Art', 'price' => '25.00', 'img' => 'kungpao'],
        ];

        foreach($menues as $menu){
            $data = new Menu;
            $data->setName($menu['name']);
            $data->setDescripe($menu['descripe']);
            $data->setPrice($menu['price']);
            $data->setImg($menu['img']);

            $em = $doctrine->getManager();
            $em->persist($data);
            $em->flush();
        }


        return $this->render('sample_data/index.html.twig');
    }
}
