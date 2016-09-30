<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 27/09/16
 * Time: 08:26 م
 */

namespace AppBundle\Controller\api;

use AppBundle\Entity\Movies;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class MoviesController extends Controller
{
    /**
     * @return array
     * @View()
     */
    public function getMoviesAction()
    {
        $movies = $this->getDoctrine()
            ->getRepository('AppBundle:Movies')
            ->findAll();
        return $movies;
    }

    /**
     * @param Request $request
     * @return array
     * @View()
     * @ParamConverter("request", class="Symfony\Component\HttpFoundation\Request")
     * @Route("/movies")
     */
    public function postMoviesAction(Request $request)
    {
        $post = $request->request->all();
        return $post['title'];
    }

    /**
     * @param Movies $movie
     * @return array
     * @View()
     * @ParamConverter("movie",class="AppBundle:Movies")
     */
    public function getMovieAction(Movies $movie)
    {
        return $movie;
    }
    /**
     * @param Movies $movie
     * @return array
     * @View()
     * @ParamConverter("movie",class="AppBundle:Movies")
     */
    public function putMovieAction(Movies $movie)
    {
        return $movie;
    }
    /**
     * @param Movies $movie
     * @return array
     * @View()
     * @ParamConverter("movie",class="AppBundle:Movies")
     */
    public function deleteMovieAction(Movies $movie){
        return $movie;
    }
////    /**
////     * @Route("/api/movies/{id}", name="movies_delete")
////     * @Method("DELETE")
////     */
//    public function deleteMovieAction($slug){
//        $movie = $this->getDoctrine()
//            ->getRepository('AppBundle:Movies')
//            ->find($slug);
//        return new Response($movie);
//    }
}