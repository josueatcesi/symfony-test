<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use APP\Entity\Category;
use APP\Entity\Produit;
use Faker;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 5; $i++) {
            $category = new Category();        
            $category->setNom($faker->name);
            $manager->persist($category); 
            for ($j=0; $j < 4; $j++) { 
                $produit = new Produit();
                $produit->setLibelle($faker->word);
                $produit->setPrix($faker->randomfloat(2, $min = 10,00, $max = 100,00));
                $produit->setCategory($category);
                $manager->persist($produit); 
            }
        }
        $manager->flush();
    }
}
