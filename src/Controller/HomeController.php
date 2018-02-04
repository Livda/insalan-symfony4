<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\News;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $nbNews = 20;

        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository(News::class)->findBy(['status' => 'activated'], ['createdAt' => 'DESC'], $nbNews);

        return $this->render('news/news.html.twig', [
            'news' => $news,
            ]);
    }

    /**
     * @Route("/forum/", name="forum")
     */
    public function forumAction()
    {
        // the redirection is in 302 to avoid the vistor's browsers caching this redirection FOR EVER
        return $this->redirect('http://old.insalan.fr/forum', 302);
    }
}
