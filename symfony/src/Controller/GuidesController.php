<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/*
 * Handle guides functionality
 */
class GuidesController extends BaseController
{

    public function __construct()
    {
        $this->guideUrls = array(
            'what-is-a-business-valuation',
            'how-do-you-calculate-the-value-of-a-business',
            'how-do-you-increase-the-value-of-a-business'
        );
    }

    /*
     * List all guides
     *
     * @param Request $request
     */
    public function list(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $metaTitle = 'Free Business Guides | Business Valuations';
        $metaDescription = 'Expert, jargon-free guides to help you understanding growing, valuing and selling a business.';

        $guideUrls = $this->guideUrls;

        $viewData = array();
        $viewData['metaTitle'] = $metaTitle;
        $viewData['metaDescription'] = $metaDescription;
        $viewData['guideUrls'] = $guideUrls;
        return $this->render('Guides/list.html.twig', $viewData);
    }

    /*
     * View a guide
     *
     * @param Request $request
     * @param string $$slug
     */
    public function view(Request $request, string $slug)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $guideUrls = $this->guideUrls;
        if (!in_array($slug, $guideUrls)) {
            // TODO: perm redirect
        }

        if ($slug === 'what-is-a-business-valuation') {
            $metaTitle = 'What is a business valuation? | Business Valuations';
            $metaDescription = 'A business valuation is a series of calculations against your businesses key metrics to give your business a saleable value.';
        } else if ($slug === 'how-do-you-calculate-the-value-of-a-business') {
            $metaTitle = 'How do you calculate the value of a business? | Business Valuations';
            $metaDescription = 'Discover how to calculate the value of a business with expert insights and methods. Learn about financial analysis, market trends, and more.';
        } else if ($slug === 'how-do-you-increase-the-value-of-a-business') {
            $metaTitle = 'How do you increase the value of a business? | Business Valuations';
            $metaDescription = 'Unlock the secrets to increasing your business\'s value. Explore strategies, optimization techniques, and industry insights to boost your company\'s worth.';
        } else {
            $metaTitle = 'Free Business Guides | Business Valuations';
            $metaDescription = 'Expert, jargon-free guides to help you understanding growing, valuing and selling a business.';
        }

        $viewData = array();
        $viewData['metaTitle'] = $metaTitle;
        $viewData['metaDescription'] = $metaDescription;
        $viewData['guideUrls'] = $guideUrls;
        return $this->render('Guides/guide/' . $slug . '.html.twig', $viewData);
    }
}