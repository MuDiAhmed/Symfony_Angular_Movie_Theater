<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 01/10/16
 * Time: 12:47 م
 */

namespace AppBundle\Controller\api;


use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowsController extends Controller implements ClassResourceInterface
{
    /**
     * @return array
     * @View()
     */
    public function cgetAction()
    {
        $show = $this->getDoctrine()
            ->getRepository('AppBundle:Shows')
            ->findAll();
        return $show;
    }
}