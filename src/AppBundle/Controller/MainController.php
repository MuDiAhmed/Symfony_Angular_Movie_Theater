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
        return $this->render('index.html.twig', [
        ]);
    }
}