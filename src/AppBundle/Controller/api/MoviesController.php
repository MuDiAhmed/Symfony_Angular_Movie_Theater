<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 27/09/16
 * Time: 08:26 م
 */

namespace AppBundle\Controller\api;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class MoviesController
{
    /**
     * @Route("/api/movies", name="movies_index")
     * @Method("GET")
     */
    public function IndexAction(){
        $data = [
            ['id'=>'1','title'=>'what'],
            ['id'=>'2','title'=>'haha']
        ];
        return new JsonResponse($data);
    }
}