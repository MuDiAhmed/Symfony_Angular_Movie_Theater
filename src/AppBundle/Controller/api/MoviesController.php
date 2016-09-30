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
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\File\File;
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
        $post_data = $request->request->all();
        $post_file = $request->files;
        $image_name = str_replace(" ","-",$post_data['title']).'jpg';
        foreach($post_file as $uploadedFile) {
            $file = $uploadedFile->move('images', $image_name);
        }
        $movie = new Movies();
        $movie->setTitle($post_data['title']);
        $movie->setImg('images/'.$image_name);
        $manager = $this->getDoctrine()->getEntityManager();
        $manager->persist($movie);
        $manager->flush();
        return $movie;
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
        $manager = $this->getDoctrine()->getEntityManager();
        $manager->remove($movie);
        $manager->flush();
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