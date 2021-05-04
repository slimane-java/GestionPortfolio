<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class HomeController extends AbstractController
{
    /**
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="app-home-page")
     */
    public function index(AdminUrlGenerator $crudUrlGenerator)
    {
        return $this->redirect($crudUrlGenerator->setAction(Action::INDEX)->generateUrl());
    }
}
