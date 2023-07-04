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
            'how-do-you-increase-the-value-of-a-business',
            'what-effects-the-value-of-a-business',
            'why-do-i-need-to-know-the-value-of-my-business',
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

        $metaTitle = 'Free Business Guides | Business Valuations';
        $metaDescription = 'Expert, jargon-free guides to help you understanding growing, valuing and selling a business.';

        $viewData = array();
        $viewData['metaTitle'] = $metaTitle;
        $viewData['metaDescription'] = $metaDescription;
        $viewData['guideUrls'] = $guideUrls;
        return $this->render('Guides/guide/' . $slug . '.html.twig', $viewData);
    }
}