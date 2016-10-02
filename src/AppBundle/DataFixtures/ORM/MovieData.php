<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 30/09/16
 * Time: 12:43 م
 */

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Movies;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class MovieData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
       
        $movie2 = new Movies();
        $movie2->setTitle('Batman vs Joker');
        $movie2->setImg('images/bat-joker.jpg');

        $movie3 = new Movies();
        $movie3->setTitle('Drive');
        $movie3->setImg('images/driver.jpg');

        $movie4 = new Movies();
        $movie4->setTitle('Fight Club');
        $movie4->setImg('images/fight-club.jpg');

        $movie5 = new Movies();
        $movie5->setTitle('Monster University');
        $movie5->setImg('images/monsters.jpg');

        $movie6 = new Movies();
        $movie6->setTitle('Straight Outta Compact');
        $movie6->setImg('images/movieposter.jpg');
        
        $manager->persist($movie2);
        $manager->persist($movie3);
        $manager->persist($movie4);
        $manager->persist($movie5);
        $manager->persist($movie6);

        $manager->flush();
    }
}