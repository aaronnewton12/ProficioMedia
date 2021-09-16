<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/*
 * Handle web functionality
 */
class WebController extends AbstractController
{
    /*
     * View homepage
     *
     * @param Request $request
     */
    public function homepage(Request $request)
    {

        $metaTitle = 'Proficio Media | Affiliate Marketing & Online Shopping Exports';
        $metaDescription = 'Here at Proficio Media, we pride ourselves on our extensive knowledge of Affiliate Marketing & Online Shopping, helping brands scale to 7-figures and beyond.';

        $viewData = array();
        $viewData['metaTitle'] = $metaTitle;
        $viewData['metaDescription'] = $metaDescription;
        return $this->render('Web/homepage.html.twig', $viewData);
    }

}