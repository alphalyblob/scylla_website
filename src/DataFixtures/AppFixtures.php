<?php

namespace App\DataFixtures;

use App\Entity\ParticipantsCours;
use Faker\Factory;
use Doctrine\ORM\Mapping\Id;
use App\Factory\CoursFactory;
use App\Factory\MediasFactory;
use App\Factory\TarifsFactory;
use App\Factory\SeancesFactory;
use App\Factory\AdherentFactory;
use App\Factory\AteliersFactory;
use App\Factory\InfosAssoFactory;
use App\Factory\EvenementsFactory;
use App\Factory\ParticipantsEvenementsFactory;
use App\Factory\InfosAdherentFactory;
use App\Factory\MembresEquipeFactory;
use App\Factory\TypeEvenementFactory;
use Doctrine\Persistence\ObjectManager;
use App\Factory\ParticipantsCoursFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Migrations\Provider\Exception\NoMappingFound;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $faker = Factory::create('fr_FR');

        // TypeEvenementFactory:: createMany(5); 
        // EvenementsFactory::createMany(8);
        // AteliersFactory::createMany(3);
        // CoursFactory::createMany(6);
        // AdherentFactory::createMany(10);
        // InfosAdherentFactory::createMany(10);
        // InfosAssoFactory::createOne();
        // MediasFactory::createMany(2);
        // MembresEquipeFactory::createMany(4);
        // SeancesFactory::createMany(50);
        // TarifsFactory::createMany(6);
        // ParticipantsCoursFactory::createMany(8);
        // ParticipantsEvenementsFactory::createMany(10);
        

       
        $manager->flush();
    }
}
