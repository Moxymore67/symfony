<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    CONST CATEGORIES = [
        'Action', 'Aventure', 'Animation', 'Fantastique', 'Horreur', 'Thriller',
    ];

    public function load(ObjectManager $manager)
    {
        for($i=0; $i<=5; $i++) {
            $category = new Category();
            $category->setName(self::CATEGORIES[$i]);
            $manager->persist($category);

            $this->addReference('categorie_' . $i, $category);
        }

        $manager->flush();
    }
}
