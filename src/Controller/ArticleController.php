<?php

namespace App\Controller;

use KnpU\LoremIpsumBundle\KnpUIpsum;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * Currently unused: just showing a controller with a constructor!
     */
    private $isDebug;
    private $knpUIpsum;
    public function __construct(bool $isDebug, KnpUIpsum $knpUIpsum)
    {
        $this->isDebug = $isDebug;
        $this->knpUIpsum = $knpUIpsum;
    }
    
    /**
     * @Route("/article", name="app_homepage")
     */
    public function index()
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    
}
