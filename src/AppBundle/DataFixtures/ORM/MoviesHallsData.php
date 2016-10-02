<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 02/10/16
 * Time: 04:55 ص
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\HallMovieShow;
use AppBundle\Entity\Halls;
use AppBundle\Entity\Shows;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use AppBundle\Entity\Movies;


class MoviesHallsData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $movie = new Movies();
        $movie->setTitle('Angry Birds');
        $movie->setImg('images/Angry-Birds.jpg');

        $hall = new Halls();
        $hall->setName('Hall 1');
        $hall->setRowChairs(15);
        $hall->setRowTotal(8);
        
        $show = new Shows();
        $show->setStartTime('09:00');
        $show->setEndTime('12:00');

        $movieShow = new HallMovieShow();
        $movieShow->setMovie($movie);
        $movieShow->setHall($hall);
        $movieShow->setShow($show);
        $movieShow->setPrice(50);

        $manager->persist($movie);
        $manager->persist($hall);
        $manager->persist($show);
        $manager->persist($movieShow);

        $manager->flush();
    }
}