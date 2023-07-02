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

        $metaTitle = 'Business Valuation | Value your business for FREE today!';
        $metaDescription = 'Get a FREE instant business valuation today with our simple online calculator.';

        $viewData = array();
        $viewData['metaTitle'] = $metaTitle;
        $viewData['metaDescription'] = $metaDescription;
        return $this->render('Web/homepage.html.twig', $viewData);
    }

}