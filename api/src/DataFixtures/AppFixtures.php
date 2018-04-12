<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Gerard;
use App\Entity\Greeting;
use App\Entity\Hello;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 200; $i++) {
            $hello = new Hello();
            $hello->name = 'hello '.$i;
            $manager->persist($hello);

            $greet = new Greeting();
            $greet->name = 'greeting '.$i;
            $manager->persist($greet);

            $gerard = new Gerard();
            $gerard->hellos->add($hello);
            $gerard->greetings->add($greet);
            $manager->persist($gerard);

        }

        $manager->flush();
    }
}