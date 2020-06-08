<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0; $i<=50; $i++) {
            $actor = new Actor();
            $actor->setName($name = $faker->name);
            $slug = (new Slugify())->generate($name);
            $actor->setSlug($slug);
            if($i <= 12) {
                $actor->addProgram($this->getReference('program_0'));
            } elseif ( 13 <= $i && $i <= 25) {
                $actor->addProgram($this->getReference('program_1'));
            } elseif ( 26 <= $i && $i <= 35) {
                $actor->addProgram($this->getReference('program_2'));
            } elseif ( 36 <= $i && $i <= 42) {
                $actor->addProgram($this->getReference('program_3'));
            } elseif ( 43 <= $i && $i <= 46) {
                $actor->addProgram($this->getReference('program_4'));
            } elseif ( 47 <= $i && $i <= 50) {
                $actor->addProgram($this->getReference('program_5'));
            }

            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
        }

        $manager->flush();
    }
}
