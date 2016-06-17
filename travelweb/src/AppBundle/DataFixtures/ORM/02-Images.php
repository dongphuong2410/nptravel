<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Image;

/**
 * Fixtures
 */
class Images extends AbstractFixture implements OrderedFixtureInterface
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
        $kernel = $this->container->get('kernel');
        $path = $kernel->locateResource('@AppBundle/DataFixtures/ORM/pic01.jpg');
        $a1 = new Image();
        $a1->setName("pic01.jpg");
        $a1->setPath("");

        $manager->persist($a1);
        $manager->flush();
    }
}
