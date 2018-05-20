<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\News;
use App\Enum\Status;
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
        $newsRepository = $em->getRepository(News::class);
        $news = $newsRepository->findBy(['status' => Status::ACTIVATED], ['createdAt' => 'DESC'], $nbNews);

        return $this->render('homepage.html.twig', [
            'news' => $news,
            ]
        );
    }

    /**
     * @Route("/forum/", name="forum")
     */
    public function forumAction()
    {
        // the redirection is in 302 to avoid the vistor's browsers caching this redirection FOR EVER
        return $this->redirect('http://old.insalan.fr/forum', 302);
    }

    /**
     * @Route("/faq/", name="faq")
     */
    public function faqAction()
    {
        return $this->render('faq.html.twig');
    }

    /**
     * @Route("/contact/", name="contact")
     */
    public function contactAction()
    {
        return $this->render('contact.html.twig');
    }
}
