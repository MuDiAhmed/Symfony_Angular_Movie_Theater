<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 02/10/16
 * Time: 12:21 ص
 */

namespace AppBundle\Controller\api;

use AppBundle\Entity\Tickets;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TicketsController extends Controller implements ClassResourceInterface
{
    /**
     * @param Request $request
     * @return array
     * @View()
     * @ParamConverter("request", class="Symfony\Component\HttpFoundation\Request")
     * @Route("/movies-halls")
     * @Method("POST")
     */
    public function postAction(Request $request)
    {
        $post_data = $request->request->all();
        $user = $this->getDoctrine()->getRepository('AppBundle:Users')->findOneBy(['id'=>$post_data['user_id']]);
        $movieHall = $this->getDoctrine()->getRepository('AppBundle:HallMovieShow')->findOneBy(['id'=>$post_data['movieHall']]);
        $ticket = new Tickets();
        $ticket->setChairNumber($post_data['chair']);
        $ticket->setRowNumber($post_data['row']);
        $ticket->setUser($user);
        $ticket->setHallMovieShow($movieHall);
        $manager = $this->getDoctrine()->getEntityManager();
        $manager->persist($ticket);
        $manager->flush();
        return $ticket;
    }
}