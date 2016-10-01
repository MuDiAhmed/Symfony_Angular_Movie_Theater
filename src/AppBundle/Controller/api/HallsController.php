<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 30/09/16
 * Time: 07:40 م
 */

namespace AppBundle\Controller\api;

use AppBundle\Entity\Halls;
use FOS\RestBundle\Controller\Annotations\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class HallsController extends Controller
{
    /**
     * @return array
     * @View()
     */
    public function getHallsAction()
    {
        $hall = $this->getDoctrine()
            ->getRepository('AppBundle:Halls')
            ->findAll();
        return $hall;
    }

    /**
     * @param Request $request
     * @return array
     * @View()
     * @ParamConverter("request", class="Symfony\Component\HttpFoundation\Request")
     * @Route("/halls")
     * @Method("POST")
     */
    public function postHallsAction(Request $request)
    {
        $post_data = $request->request->all();
        $hall = new Halls();
        $hall->setName($post_data['name']);
        $hall->setRowChairs($post_data['chairs']);
        $hall->setRowTotal($post_data['rows']);
        $manager = $this->getDoctrine()->getEntityManager();
        $manager->persist($hall);
        $manager->flush();
        return $hall;
    }

    /**
     * @param Halls $hall
     * @return array
     * @View()
     * @ParamConverter("hall",class="AppBundle:Halls")
     */
    public function getHallAction(Halls $hall)
    {
        return $hall;
    }
    /**
     * @param Halls $hall
     * @return array
     * @View()
     * @ParamConverter("hall",class="AppBundle:Halls")
     */
    public function deleteHallAction(Halls $hall){
        $manager = $this->getDoctrine()->getEntityManager();
        $manager->remove($hall);
        $manager->flush();
        return $hall;
    }
}