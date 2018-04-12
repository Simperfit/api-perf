<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Gerard;
use App\Entity\Greeting;
use App\Entity\Hello;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $hellos = new ArrayCollection();
        $greets = new ArrayCollection();

        // create 20 products! Bam!
        for ($i = 0; $i < 10; $i++) {
            $hello = new Hello();
            $hello->name = 'hello '.$i;
            $manager->persist($hello);
            $hellos->add($hello);

            $greet = new Greeting();
            $greet->name = 'greeting '.$i;
            $manager->persist($greet);
            $greets->add($greet);
        }

        $gerard = new Gerard();
        $gerard->hellos = $hellos;
        $gerard->greetings = $greets;
        $manager->persist($gerard);

        $manager->flush();
    }
}