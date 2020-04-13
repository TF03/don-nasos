<?php

namespace App\AdminController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends BaseAdminController
{
    /**
     * @Route("/test",
     *     name="test"
     * )
     */
    public function getTestAction(Request $request): Response
    {
        return $this->render('base.html.twig', []);

    }
}
