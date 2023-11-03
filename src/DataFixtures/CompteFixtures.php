<?php

namespace App\DataFixtures;

use App\Entity\Compte;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CompteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $typeCompte = ['courant', 'epargne', 'titre', 'terme'];

        for ($i = 0; $i < 20; $i++)
        {
            $compte = new Compte();
            $compte->setUser($this->getReference('user_' . $faker->numberBetween(0, 19)));
            $compte->setType($this->getReference($faker->randomElement($typeCompte)));
            $compte->setSolde($faker->randomFloat(2,0,10000));
            $manager->persist($compte);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}
