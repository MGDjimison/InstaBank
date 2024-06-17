<?php

namespace App\Tests;

use App\Entity\TypeCompte;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TypeCompteRepositoryTest extends KernelTestCase
{
    public function testCountTypeCompte(): void
    {
        $manager = static::getContainer()->get('doctrine')->getManager();
        $typeCompteRepository = $manager->getRepository(TypeCompte::class);
        $nb_type_compte = count($typeCompteRepository->findAll());

        self::assertSame(4, $nb_type_compte);
    }
}
