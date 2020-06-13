<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Category;
use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i <= 1000; $i++) {
            $category = new Category();
            $category->setName($faker->word);
            $manager->persist($category);
            $this->addReference('categorys_' . $i, $category);
        }

        for ($i = 1; $i <= 1000; $i++) {
            $program = new Program();
            $program->setTitle($faker->sentence(4, true));
            $program->setSynopsis($faker->text(100));
            $program->setCategory($this->getReference('categorys_' . rand(0, 1000)));
            $program->setCountry($faker->country);
            $program->setYear($faker->year($max = 'now'));
            $program->setSlug($faker->word);
            $manager->persist($program);
            $this->addReference('programs_' . $i, $program);

            for($j = 1; $j <= 5; $j ++) {
                $actor = new Actor();
                $actor->setName($faker->firstName);
                $actor->setLastname($faker->lastName);
                $actor->setSlug($faker->lastName);
                $actor->addProgram($this->getReference('programs_'.$i));
                $manager->persist($actor);
                $this->addReference('actorbis_'.$i.$j, $actor);
            }

        }

        $manager->flush();
    }
}
