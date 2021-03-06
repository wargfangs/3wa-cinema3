<?php

namespace WA\FoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DirectorsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WABoBundle:Directors')->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            5/*limit per page*/);
        return $this->render('WAFoBundle:Directors:index.html.twig', array(
            'entities' => $pagination,
        ));
    }
}