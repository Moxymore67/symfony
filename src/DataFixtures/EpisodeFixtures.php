<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [SeasonFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0; $i<=600; $i++) {
            $episode = new Episode();
            $episode->setTitle($faker->words(3, true));
            $episode->setSynopsis($faker->paragraph);
            $episode->setNumber(rand(1,10));
            if ($i <=100) {
                if ($i <= 10) {
                    $episode->setSeason($this->getReference('season_0'));
                } elseif (11 <= $i && $i <= 20) {
                    $episode->setSeason($this->getReference('season_1'));
                } elseif (21 <= $i && $i <= 30) {
                    $episode->setSeason($this->getReference('season_2'));
                } elseif (31 <= $i && $i <= 40) {
                    $episode->setSeason($this->getReference('season_3'));
                } elseif (41 <= $i && $i <= 50) {
                    $episode->setSeason($this->getReference('season_4'));
                } elseif (51 <= $i && $i <= 60) {
                    $episode->setSeason($this->getReference('season_5'));
                } elseif (61 <= $i && $i <= 70) {
                    $episode->setSeason($this->getReference('season_6'));
                } elseif (71 <= $i && $i <= 80) {
                    $episode->setSeason($this->getReference('season_7'));
                } elseif (81 <= $i && $i <= 90) {
                    $episode->setSeason($this->getReference('season_8'));
                } elseif (91 <= $i && $i <= 100) {
                    $episode->setSeason($this->getReference('season_9'));
                }
            } elseif (101 <= $i && $i <=200 ) {
                if ($i <= 110) {
                    $episode->setSeason($this->getReference('season_10'));
                } elseif (110 <= $i && $i <= 120) {
                    $episode->setSeason($this->getReference('season_11'));
                } elseif (121 <= $i && $i <= 130) {
                    $episode->setSeason($this->getReference('season_12'));
                } elseif (131 <= $i && $i <= 140) {
                    $episode->setSeason($this->getReference('season_13'));
                } elseif (141 <= $i && $i <= 150) {
                    $episode->setSeason($this->getReference('season_14'));
                } elseif (151 <= $i && $i <= 160) {
                    $episode->setSeason($this->getReference('season_15'));
                } elseif (161 <= $i && $i <= 170) {
                    $episode->setSeason($this->getReference('season_16'));
                } elseif (171 <= $i && $i <= 180) {
                    $episode->setSeason($this->getReference('season_17'));
                } elseif (181 <= $i && $i <= 190) {
                    $episode->setSeason($this->getReference('season_18'));
                } elseif (191 <= $i && $i <= 200) {
                    $episode->setSeason($this->getReference('season_19'));
                }
            } elseif (201 <= $i && $i <=300 ) {
                if ($i <= 210) {
                    $episode->setSeason($this->getReference('season_20'));
                } elseif (210 <= $i && $i <= 220) {
                    $episode->setSeason($this->getReference('season_21'));
                } elseif (221 <= $i && $i <= 230) {
                    $episode->setSeason($this->getReference('season_22'));
                } elseif (231 <= $i && $i <= 240) {
                    $episode->setSeason($this->getReference('season_23'));
                } elseif (241 <= $i && $i <= 250) {
                    $episode->setSeason($this->getReference('season_24'));
                } elseif (251 <= $i && $i <= 260) {
                    $episode->setSeason($this->getReference('season_25'));
                } elseif (261 <= $i && $i <= 270) {
                    $episode->setSeason($this->getReference('season_26'));
                } elseif (271 <= $i && $i <= 280) {
                    $episode->setSeason($this->getReference('season_27'));
                } elseif (281 <= $i && $i <= 290) {
                    $episode->setSeason($this->getReference('season_28'));
                } elseif (291 <= $i && $i <= 300) {
                    $episode->setSeason($this->getReference('season_29'));
                }
            } elseif (301 <= $i && $i <=400 ) {
                if ($i <= 310) {
                    $episode->setSeason($this->getReference('season_30'));
                } elseif (310 <= $i && $i <= 320) {
                    $episode->setSeason($this->getReference('season_31'));
                } elseif (321 <= $i && $i <= 330) {
                    $episode->setSeason($this->getReference('season_32'));
                } elseif (331 <= $i && $i <= 340) {
                    $episode->setSeason($this->getReference('season_33'));
                } elseif (341 <= $i && $i <= 350) {
                    $episode->setSeason($this->getReference('season_34'));
                } elseif (351 <= $i && $i <= 360) {
                    $episode->setSeason($this->getReference('season_35'));
                } elseif (361 <= $i && $i <= 370) {
                    $episode->setSeason($this->getReference('season_36'));
                } elseif (371 <= $i && $i <= 380) {
                    $episode->setSeason($this->getReference('season_37'));
                } elseif (381 <= $i && $i <= 390) {
                    $episode->setSeason($this->getReference('season_38'));
                } elseif (391 <= $i && $i <= 400) {
                    $episode->setSeason($this->getReference('season_39'));
                }
            } elseif (401 <= $i && $i <=500 ) {
                if ($i <= 410) {
                    $episode->setSeason($this->getReference('season_40'));
                } elseif (410 <= $i && $i <= 420) {
                    $episode->setSeason($this->getReference('season_41'));
                } elseif (421 <= $i && $i <= 430) {
                    $episode->setSeason($this->getReference('season_42'));
                } elseif (431 <= $i && $i <= 440) {
                    $episode->setSeason($this->getReference('season_43'));
                } elseif (441 <= $i && $i <= 450) {
                    $episode->setSeason($this->getReference('season_44'));
                } elseif (451 <= $i && $i <= 460) {
                    $episode->setSeason($this->getReference('season_45'));
                } elseif (461 <= $i && $i <= 470) {
                    $episode->setSeason($this->getReference('season_46'));
                } elseif (471 <= $i && $i <= 480) {
                    $episode->setSeason($this->getReference('season_47'));
                } elseif (481 <= $i && $i <= 490) {
                    $episode->setSeason($this->getReference('season_48'));
                } elseif (491 <= $i && $i <= 500) {
                    $episode->setSeason($this->getReference('season_49'));
                }
            } elseif (501 <= $i && $i <=600 ) {
                if ($i <= 510) {
                    $episode->setSeason($this->getReference('season_50'));
                } elseif (510 <= $i && $i <= 520) {
                    $episode->setSeason($this->getReference('season_51'));
                } elseif (521 <= $i && $i <= 530) {
                    $episode->setSeason($this->getReference('season_52'));
                } elseif (531 <= $i && $i <= 540) {
                    $episode->setSeason($this->getReference('season_53'));
                } elseif (541 <= $i && $i <= 550) {
                    $episode->setSeason($this->getReference('season_54'));
                } elseif (551 <= $i && $i <= 560) {
                    $episode->setSeason($this->getReference('season_55'));
                } elseif (561 <= $i && $i <= 570) {
                    $episode->setSeason($this->getReference('season_56'));
                } elseif (571 <= $i && $i <= 580) {
                    $episode->setSeason($this->getReference('season_57'));
                } elseif (581 <= $i && $i <= 590) {
                    $episode->setSeason($this->getReference('season_58'));
                } elseif (591 <= $i && $i <= 600) {
                    $episode->setSeason($this->getReference('season_59'));
                }
            }
            $manager->persist($episode);
            $this->addReference('episode_' . $i, $episode);
        }
        $manager->flush();
    }
}
