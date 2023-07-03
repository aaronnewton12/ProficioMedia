<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class  BaseController extends AbstractController
{
    /*
     * Handle currency formating
     *
     * @param int $amount
     *
     * @return string
     */
    public function renderCurrency(int $amount)
    {
        return '£' . number_format($amount, 0);
    }

    /*
     * Perform a redirect with flash bag
     *
     * @param Session $session
     * @param string $redirectRoute
     * @param string $flashType
     * @param string $flashMessage
     *
     * @return RedirectResponse
     */
    public function performRedirectWithFlashBag(Session $session, string $redirectRoute, string $flashType, string $flashMessage): RedirectResponse
    {
        // User feedback
        $session->getFlashBag()->add($flashType, $flashMessage);

        // Redirect
        return $this->redirectToRoute($this->getRoutingPaths($redirectRoute));
    }

    /*
     * Functionality to return some of the core routing paths
     *
     * @param string $page
     *
     * @return string
     */
    public function getRoutingPaths(string $page): string
    {
        $routePathsIndexedOnPage = array();
        $routePathsIndexedOnPage['dashboard'] = 'index_index';
        $routePathsIndexedOnPage['mission'] = 'mission_view';
        $routePathsIndexedOnPage['village'] = 'village_view';
        $routePathsIndexedOnPage['village_boosters'] = 'village_booster_view';
        $routePathsIndexedOnPage['barracks'] = 'barracks_view';
        $routePathsIndexedOnPage['notifications'] = 'notification_view';
        $routePathsIndexedOnPage['messages'] = 'message_view';
        $routePathsIndexedOnPage['register'] = 'security_register';
        $routePathsIndexedOnPage['spy'] = 'spy_view';
        $routePathsIndexedOnPage['stroll_the_village'] = 'index_stroll_the_village';
        $routePathsIndexedOnPage['clan'] = 'clan_view';
        $routePathsIndexedOnPage['chat'] = 'chat_view';
        $routePathsIndexedOnPage['month_challenge'] = 'month_challenge_view';
        $routePathsIndexedOnPage['userpref'] = 'user_preferences';

        return $routePathsIndexedOnPage[$page];
    }
}