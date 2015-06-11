<?php

namespace YAUM\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use YAUM\Contract\UserService;

class DefaultController extends Controller
{

    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/app/welcome/{name}", name="welcome")
     */
    public function welcome($name)
    {
        return new Response('<html><body>Hello <strong>' . $name . '</strong>!</body></html>');
    }
}
