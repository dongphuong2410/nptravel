<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Place;

/**
 * Fixtures
 */
class Places extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @{inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }

    public function load(ObjectManager $manager)
    {
        $a1 = new Place();
        $a1->setName("GANGNEUNG");
        
        $a2 = new Place();
        $a2->setName("GANGHWA");

        $a3 = new Place();
        $a3->setName("JEJU");

        $manager->persist($a1);
        $manager->persist($a2);
        $manager->persist($a3);

        $manager->flush();
    }
}
