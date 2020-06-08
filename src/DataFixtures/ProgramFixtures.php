<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0; $i<=6; $i++) {
            $program = new Program();
            $program->setTitle( $faker->word . ' ' . $faker->word);
            $program->setSynopsis($faker->paragraph);
            $program->setCountry($faker->country);
            $program->setYear($faker->year);
            $program->setPoster($faker->imageUrl(1920, 1080));
            $program->setCategory($this->getReference('categorie_' . $i));
            $manager->persist($program);
            $this->addReference('program_' . $i, $program);
        }
        $manager->flush();
    }
}
