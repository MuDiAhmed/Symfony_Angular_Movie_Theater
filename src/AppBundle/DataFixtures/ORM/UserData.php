<?php
/**
 * Created by PhpStorm.
 * User: mudi
 * Date: 30/09/16
 * Time: 02:45 ص
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Users;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class UserData implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $admin = new Users();
        $admin->setName('Mohamed Ahmed');
        $admin->setPassword('123456');

        $user = new Users();
        $user->setName('Maged Ali');
        $user->setPassword('123456');

        $manager->persist($admin);
        $manager->persist($user);

        $manager->flush();
    }
}