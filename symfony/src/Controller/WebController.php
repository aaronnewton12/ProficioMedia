<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\BusinessValuation;

use App\Repository\BusinessValuationRepository;

use App\Form\Type\StartBusinessValuationType;
use App\Form\Type\FinishBusinessValuationType;

/*
 * Handle web functionality
 */
class WebController extends BaseController
{
    public function __construct(BusinessValuationRepository $businessValuationRepository)
    {
        $this->businessValuationRepository = $businessValuationRepository;
    }

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
        $businessValuation->setCreatedAt(new \DateTime());

        $businessValuationForm = $this->createForm(StartBusinessValuationType::class, $businessValuation);

        $businessValuationForm->handleRequest($request);
        if ($businessValuationForm->isSubmitted() && $businessValuationForm->isValid()) {
            $em->persist($businessValuation);

            $em->flush();

            // Redirect
            return $this->redirectToRoute('web_valuation', array('id' => $businessValuation->getId(), 'signature' => $businessValuation->getSignature()));
        }

        $viewData = array();
        $viewData['metaTitle'] = $metaTitle;
        $viewData['metaDescription'] = $metaDescription;
        $viewData['businessValuationForm']= $businessValuationForm->createView();
        return $this->render('Web/homepage.html.twig', $viewData);
    }

    /*
     * Handle the valuation process
     *
     * @param Request $request
     * @param int $id
     * @param string $signature
     */
    public function valuation(Request $request, int $id, string $signature)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $businessValuation = $this->businessValuationRepository->find($id);
        if (!$businessValuation) {
            return $this->redirectToRoute('web_homepage');
        }

        if ($businessValuation->getSignature() !== $signature) {
            return $this->redirectToRoute('web_homepage');
        }

        $businessValuationForm = $this->createForm(FinishBusinessValuationType::class, $businessValuation);

        $businessValuationForm->handleRequest($request);
        if ($businessValuationForm->isSubmitted() && $businessValuationForm->isValid()) {
            $em->persist($businessValuation);

            $em->flush();

            if (!$businessValuation->checkHasRequirements()) {
                return $this->redirectToRoute('web_valuation', array('id' => $businessValuation->getId(), 'signature' => $businessValuation->getSignature()));
            }

            $lowerValuationValue = ($businessValuation->getNetProfit() * 3) + $businessValuation->getAssetsValue();
            $upperValuationValue = ($businessValuation->getNetProfit() * 4)  + $businessValuation->getAssetsValue();

            $businessValuation->setEstimatedValueLower($lowerValuationValue);
            $businessValuation->setEstimatedValueUpper($upperValuationValue);

            $em->flush();

            // Redirect
            return $this->redirectToRoute('web_valuation_confirm', array('id' => $businessValuation->getId(), 'signature' => $businessValuation->getSignature()));
        }


        $viewData = array();
        $viewData['noindex'] = true;
        $viewData['businessValuation'] = $businessValuation;
        $viewData['businessValuationForm'] = $businessValuationForm->createView();
        return $this->render('Web/valuation.html.twig', $viewData);
    }

    /*
     * Show the valuation
     *
     * @param Request $request
     * @param int $id
     * @param string $signature
     */
    public function valuationConfirm(Request $request, int $id, string $signature)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $businessValuation = $this->businessValuationRepository->find($id);
        if (!$businessValuation) {
            return $this->redirectToRoute('web_homepage');
        }

        if ($businessValuation->getSignature() !== $signature) {
            return $this->redirectToRoute('web_homepage');
        }

        if (!$businessValuation->getEstimatedValueLower()) {
            return $this->redirectToRoute('web_valuation', array('id' => $businessValuation->getId(), 'signature' => $businessValuation->getSignature()));
        }

        $isSalesReq = false;
        if ($request->get('req') && $request->get('req') == 'sales') {
            $isSalesReq = true;

            $businessValuation->setIsSaleCallRequested(true);

            $em->flush();
        }
        $isGrowthReq = false;
        if ($request->get('req') && $request->get('req') == 'growth') {
            $isGrowthReq = true;

            $businessValuation->setIsGrowthCallRequested(true);

            $em->flush();
        }

        $viewData = array();
        $viewData['noindex'] = true;
        $viewData['isSalesReq'] = $isSalesReq;
        $viewData['isGrowthReq'] = $isGrowthReq;
        $viewData['businessValuation'] = $businessValuation;
        return $this->render('Web/valuation-confirm.html.twig', $viewData);
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