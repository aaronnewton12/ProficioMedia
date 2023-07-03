<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\BusinessValuation;

use App\Form\Type\StartBusinessValuationType;

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
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $metaTitle = 'Business Valuation | Value your business for FREE today!';
        $metaDescription = 'Get a FREE instant business valuation today with our simple online calculator.';

        $businessValuation = new BusinessValuation();

        $businessValuationForm = $this->createForm(StartBusinessValuationType::class, $businessValuation);

        $businessValuationForm->handleRequest($request);
        if ($businessValuationForm->isSubmitted() && $businessValuationForm->isValid()) {
            $em->persist($businessValuationForm);

            // TODO: Complete!

//            $em->flush();
//
//            return $this->performRedirectWithFlashBag($session, 'chat', 'success', 'You have successfully posted a message in the chat.');
        }

        $viewData = array();
        $viewData['metaTitle'] = $metaTitle;
        $viewData['metaDescription'] = $metaDescription;
        $viewData['businessValuationForm']= $businessValuationForm->createView();
        return $this->render('Web/homepage.html.twig', $viewData);
    }

    /*
     * View selling a business page
     *
     * @param Request $request
     */
    public function sellingABusiness(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $metaTitle = 'Selling a Business in the UK | Business Sales Advisers';
        $metaDescription = 'Thinking of selling a business in the UK? Speak to one of our expert business sales advisers today!';

        $viewData = array();
        $viewData['metaTitle'] = $metaTitle;
        $viewData['metaDescription'] = $metaDescription;
        return $this->render('Web/selling-a-business.html.twig', $viewData);
    }

}