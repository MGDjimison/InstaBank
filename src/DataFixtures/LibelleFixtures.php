<?php

namespace App\DataFixtures;

use App\Entity\Libelle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LibelleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $lib = new Libelle();
        $lib->setLibelle('Banque');
        $manager->persist($lib);

        $lib1 = new Libelle();
        $lib1->setLibelle('Vie quotidienne');
        $manager->persist($lib1);

        $lib2 = new Libelle();
        $lib2->setLibelle('Loisir et sortie');
        $manager->persist($lib2);

        $lib3 = new Libelle();
        $lib3->setLibelle('Transport et vehicule');
        $manager->persist($lib3);

        $lib4 = new Libelle();
        $lib4->setLibelle('Logement');
        $manager->persist($lib4);

        $manager->flush();
    }
}
