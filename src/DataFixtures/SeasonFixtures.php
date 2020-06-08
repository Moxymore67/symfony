<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $k = 1;
        for($i=0; $i<=60; $i++) {
            $season = new Season();
            $season->setDescription($faker->paragraph);
            $season->setYear($faker->year);
            if ($i <=10) {
                $season->setNumber($k);
                $season->setProgram($this->getReference('program_0'));
                $k++;
                if ($i === 10) $k = 1;
            } elseif (11 <= $i && $i <=20 ) {
                if ($i === 11) $k = 1;
                $season->setNumber($k);
                $season->setProgram($this->getReference('program_1'));
                $k++;
                if ($i === 20) $k = 1;
            } elseif (21 <= $i && $i <=30 ) {
                if ($i === 21) $k = 1;
                $season->setNumber($k);
                $season->setProgram($this->getReference('program_2'));
                $k++;
                if ($i === 30) $k = 1;
            } elseif (31 <= $i && $i <=40 ) {
                if ($i === 31) $k = 1;
                $season->setNumber($k);
                $season->setProgram($this->getReference('program_3'));
                $k++;
                if ($i === 40) $k = 1;
            } elseif (41 <= $i && $i <=50 ) {
                if ($i === 41) $k = 1;
                $season->setNumber($k);
                $season->setProgram($this->getReference('program_4'));
                $k++;
                if ($i === 50) $k = 1;
            } elseif (51 <= $i && $i <=60 ) {
                if ($i === 51) $k = 1;
                $season->setNumber($k);
                $season->setProgram($this->getReference('program_5'));
                $k++;
            }
            $manager->persist($season);
            $this->addReference('season_' . $i, $season);
        }
        $manager->flush();
    }
}
