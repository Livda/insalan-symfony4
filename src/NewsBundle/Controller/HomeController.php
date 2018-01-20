<?php

declare(strict_types=1);

namespace App\NewsBundle\Controller;

use App\NewsBundle\Entity\News;
use App\NewsBundle\Entity\Slider;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @var RegistryInterface $registry
     */
    private $registry;

    /**
     * HomeController constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $nbNews = 20;

        $em = $this->registry->getManager();
        $news = $em->getRepository(News::class)->findBy(['status' => 'activated'], ['createdAt' => 'DESC'], $nbNews);
        $sliders = $em->getRepository(Slider::class)->findBy([], ['createdAt' => 'DESC'], $nbNews);

        dump($news, $sliders);

        return $this->render('NewsBundle/index.html.twig', [
            'news' => $news,
            'sliders' => $sliders,
            ]);
    }

    /**
     * @Route("/forum/", name="forum")
     */
    public function forumAction()
    {
        // the redirection is in 302 to avoid the vistor's browsers caching this redirection FOR EVER
        return $this->redirect("http://old.insalan.fr/forum", 302);
    }
}
