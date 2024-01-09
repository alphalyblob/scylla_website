<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Adherent;
use App\Entity\Ateliers;
use App\Entity\Cours;
use App\Entity\Evenements;
use App\Entity\TypeEvenement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\Mapping\Id;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $faker = Factory::create('fr_FR');

        // // Création de 10 Adherents
        // $adherent = [];
        // for ($i = 0; $i < 10; $i++){
        //     $unAdherent = new Adherent();
        //     $unAdherent->setEmail($faker->email);
        //     $unAdherent->setRoles($faker->roles);
        //     $unAdherent->setPassword($faker->password);
        //     $manager->persist($unAdherent);
        //     $adherents[] = $unAdherent;
        // }


        // // Création de 3 Ateliers
        // $ateliers = [];
        // foreach (['Theatre', 'Chant', 'Danse'] as $value){
        //     $unAtelier = new Ateliers();
        //     $unAtelier->setLabel($value);
        //     $unAtelier->setDescription($faker->text);
        //     $manager->persist($unAtelier);
        //     $ateliers[] = $unAtelier;
        // }

        // // Création de 6 Cours
        // $cours = [];
        // $horaire = ['Mercredi de 20h à 22h30', 'Jeudi de 19h à 20h30', 'Lundi de 18h15 à 20h', 'Lundi de 20h15 à 22h45'];
        // $fakedebutSaison = new \DateTime('2023-09-01');
        // $fakefinSaison = new \DateTime('2024-07-01');
        // for ($i = 0; $i < 6; $i++){
        //     $unCours = new Cours();
        //     $unCours->setLabel($faker->word);
        //     $unCours->setDescriptif($faker->text);
        //     $unCours->setNiveau($faker->word);
        //     $unCours->setHoraire($faker->randomElement($horaire));
        //     $unCours->setLieu($faker->address);
        //     $unCours->setDebutSaison($fakedebutSaison);
        //     $unCours->setFinSaison($fakefinSaison);
        //     $unCours->setAtelier($faker->randomElement($ateliers));
        //     $manager->persist($unCours);
        //     $cours[] = $unCours;
        // }

        // // Création de 5 types d'évènement
        // $typeEvenement = [];
        // foreach (['Projection', 'Spectacle', 'Stage', 'Tournage', 'Vente'] as $value){
        //     $unTypeEvenement = new TypeEvenement();
        //     $unTypeEvenement->setLabel($value);
        //     $manager->persist($unTypeEvenement);
        //     $typeEvenement[] = $unTypeEvenement;
        // }

        // // Création de 8 évènements
        // $evenement = [];
        // for ($i = 0; $i < 8; $i++){
        //     $unEvenement = new Evenements();
        //     $unEvenement->
        //     descriptif
        //     date
        //     commentaire 
        // }


       


        $manager->flush();
    }
}
