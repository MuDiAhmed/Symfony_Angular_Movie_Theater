<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 01/10/16
 * Time: 12:53 ص
 */

namespace AppBundle\Controller\api;

use AppBundle\Entity\HallMovieShow;
use AppBundle\Entity\Movies;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @RouteResource("Movies-Halls")
 */
class MovieHallController extends Controller implements ClassResourceInterface
{
    /**
     * @param Request $request
     * @return array
     * @View()
     * @ParamConverter("request", class="Symfony\Component\HttpFoundation\Request")
     */
    public function cgetAction(Request $request)
    {
        $get_data = $request->query->all();
        $movie_hall = $this->getDoctrine()
            ->getRepository('AppBundle:HallMovieShow');
        if($get_data){
            $movie_hall = $movie_hall->findOneBy(['movie'=>$get_data['movie'],'hall'=>$get_data['hall'],'show'=>$get_data['show']]);
        }else{
            $movie_hall = $movie_hall ->findAll();
        }

        return $movie_hall;
    }

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
        $movie = $this->getDoctrine()->getRepository('AppBundle:Movies')->findOneBy(['id'=>$post_data['movie']]);
        $hall = $this->getDoctrine()->getRepository('AppBundle:Halls')->findOneBy(['id'=>$post_data['hall']]);
        $show = $this->getDoctrine()->getRepository('AppBundle:Shows')->findOneBy(['id'=>$post_data['show']]);
        $movie_hall = new HallMovieShow();
        $movie_hall->setMovie($movie);
        $movie_hall->setHall($hall);
        $movie_hall->setShow($show);
        $movie_hall->setPrice($post_data['price']);
        $manager = $this->getDoctrine()->getEntityManager();
        $manager->persist($movie_hall);
        $manager->flush();
        return $movie_hall;
    }

    /**
     * @param HallMovieShow $movie_hall
     * @return array
     * @View()
     * @ParamConverter("movie_hall",class="AppBundle:HallMovieShow")
     */
    public function getAction(HallMovieShow $movie_hall)
    {
        return $movie_hall;
    }
    /**
     * @param HallMovieShow $movie_hall
     * @return array
     * @View()
     * @ParamConverter("movie_hall",class="AppBundle:HallMovieShow")
     */
    public function deleteAction(HallMovieShow $movie_hall){
        $manager = $this->getDoctrine()->getEntityManager();
        $manager->remove($movie_hall);
        $manager->flush();
        return $movie_hall;
    }
}