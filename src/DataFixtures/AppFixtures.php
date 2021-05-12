<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use App\Entity\Sexe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();
        $sexes = [];
        for ($i = 0; $i < 2; $i++){
            $sexe = new Sexe();
            $sexe->setNom($faker->randomElement(['masculin', 'feminin']));
            $manager->persist($sexe);
            $sexes[] = $sexe;
        }
        for ($i = 0; $i < 30; $i++){
            $sexep = $sexes[mt_rand(0,count($sexes) - 1)];
            $personne = new Personne();
            $personne->setNom($faker->lastName);
            $personne->setPrenom($faker->firstName);
            $personne->setDateNaissance($faker->dateTimeBetween('-30 years','now'));
            $personne->setEmail($faker->email);
            $personne->setNumeroFixe($faker->e164PhoneNumber);
            $personne->setNumeroPortable($faker->e164PhoneNumber);
            $personne->setSexe($sexep);
            $manager->persist($personne);

        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();

    }
}
