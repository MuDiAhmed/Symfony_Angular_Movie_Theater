<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 30/09/16
 * Time: 07:51 م
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Shows;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class ShowsData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $show2 = new Shows();
        $show2->setStartTime('12:00');
        $show2->setEndTime('15:00');

        $show3 = new Shows();
        $show3->setStartTime('15:00');
        $show3->setEndTime('18:00');

        $show4 = new Shows();
        $show4->setStartTime('18:00');
        $show4->setEndTime('21:00');

        $show5 = new Shows();
        $show5->setStartTime('21:00');
        $show5->setEndTime('00:00');
        
        $manager->persist($show2);
        $manager->persist($show3);
        $manager->persist($show4);
        $manager->persist($show5);

        $manager->flush();
    }
}