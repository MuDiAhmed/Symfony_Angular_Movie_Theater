<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 30/09/16
 * Time: 07:45 م
 */

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Halls;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class HallsData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $hall = new Halls();
        $hall->setName('Hall 1');
        $hall->setRowChairs(15);
        $hall->setRowTotal(8);

        $hall2 = new Halls();
        $hall2->setName('Hall 2');
        $hall2->setRowChairs(10);
        $hall2->setRowTotal(7);

        $hall3 = new Halls();
        $hall3->setName('Hall 3');
        $hall3->setRowChairs(12);
        $hall3->setRowTotal(10);

        $hall4 = new Halls();
        $hall4->setName('Hall 4');
        $hall4->setRowChairs(20);
        $hall4->setRowTotal(12);

        $hall5 = new Halls();
        $hall5->setName('Hall 5');
        $hall5->setRowChairs(16);
        $hall5->setRowTotal(16);

        $hall6 = new Halls();
        $hall6->setName('Hall 6');
        $hall6->setRowChairs(20);
        $hall6->setRowTotal(15);

        $manager->persist($hall);
        $manager->persist($hall2);
        $manager->persist($hall3);
        $manager->persist($hall4);
        $manager->persist($hall5);
        $manager->persist($hall6);

        $manager->flush();
    }
}