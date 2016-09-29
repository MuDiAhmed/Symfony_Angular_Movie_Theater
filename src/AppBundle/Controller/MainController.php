<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 27/09/16
 * Time: 01:20 م
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Users;

class MainController extends Controller
{
    /**
     * @Route("/")
     */
    public function viewAction(){

//        $user = new Users();
//        $user->setName('Mohamed Ahmed');
//        $em = $this->getDoctrine()->getManager();
//        // tells Doctrine you want to (eventually) save the Product (no queries yet)
//        $em->persist($user);
//
//        // actually executes the queries (i.e. the INSERT query)
//        $em->flush();
//
//        $templating = $this->container->get('templating');
//        $html = $templating->render('test/index.html.twig',[
//            'id' => $user->getId(),
//            'name' => 'Mohamed Ahmed'
//        ]);
//        return new Response($html);
        // replace this example code with whatever you need
        return $this->render('index.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}