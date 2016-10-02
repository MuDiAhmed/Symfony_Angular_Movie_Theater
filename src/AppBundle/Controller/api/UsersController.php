<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 02/10/16
 * Time: 04:40 ص
 */

namespace AppBundle\Controller\api;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends Controller implements ClassResourceInterface
{
    /**
     * @param Request $request
     * @return array
     * @View()
     * @ParamConverter("request", class="Symfony\Component\HttpFoundation\Request")
     * @Route("/api/users/login")
     * @Method("POST")
     */
    public function loginAction(Request $request){
        $post_data = $request->request->all();
        $user = $this->getDoctrine()->getRepository('AppBundle:Users')->findOneBy(['name'=>$post_data['name'],'password'=>$post_data['password']]);
        return $user;
    }
}