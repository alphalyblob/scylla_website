<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Adherent;
use App\Entity\Ateliers;
use App\Entity\Cours;
use App\Entity\Evenements;
use App\Entity\InfosAdherent;
use App\Entity\TypeEvenement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Migrations\Provider\Exception\NoMappingFound;
use Doctrine\ORM\Mapping\Id;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');


        // Création de 3 Ateliers
        $ateliers = [];
        foreach (['Theatre', 'Chant', 'Danse'] as $value){
            $unAtelier = new Ateliers();
            $unAtelier->setLabel($value);
            $unAtelier->setDescription($faker->text);
            $manager->persist($unAtelier);
            $ateliers[] = $unAtelier;
        }
        
        // Création de 6 Cours
        $cours = [];
        $fakehoraire = ['Mercredi de 20h à 22h30', 'Jeudi de 19h à 20h30', 'Lundi de 18h15 à 20h', 'Lundi de 20h15 à 22h45'];
        $fakedebutSaison = new \DateTime('2023-09-01');
        $fakefinSaison = new \DateTime('2024-07-01');
        for ($i = 0; $i < 6; $i++){
            $unCours = new Cours();
            $unCours->setLabel($faker->word);
            $unCours->setDescriptif($faker->text);
            $unCours->setNiveau($faker->word);
            $unCours->setHoraire($faker->randomElement($fakehoraire));
            $unCours->setLieu($faker->address);
            $unCours->setDebutSaison($fakedebutSaison);
            $unCours->setFinSaison($fakefinSaison);
            $unCours->setAtelier($faker->randomElement($ateliers));
            $manager->persist($unCours);
            $cours[] = $unCours;
        }
        

        // Création de 5 types d'évènement
        $typeEvenement = [];
        foreach (['Projection', 'Spectacle', 'Stage', 'Tournage', 'Vente'] as $value){
            $unTypeEvenement = new TypeEvenement();
            $unTypeEvenement->setLabel($value);
            $manager->persist($unTypeEvenement);
            $typeEvenement[] = $unTypeEvenement;
        }
        
        // Création de 8 évènements
        $evenements = [];
        for ($i = 0; $i < 8; $i++){
            $unEvenement = new Evenements();
            $unEvenement->setTitre($faker->sentence);
            $unEvenement->setDescriptif($faker->text);
            $unEvenement->setDate($faker->dateTime);
            $unEvenement->setCommentaire($faker->sentence);
            $unEvenement->setTypeEvenement($faker->randomElement($typeEvenement));
            $manager->persist($unEvenement);
            $evenements[] = $unEvenement;
        }



        // Création de 10 adherents 
        //1 GESTION 2 MEMBRE 7 ADHERENT
       
        // adherent gestionnaire
        $gestionnaire = new Adherent();
        $gestionnaire->setEmail('gestion1@example.com');
        $gestionnaire->setPassword('gestion1');
        $gestionnaire->setRoles(['ROLE_GESTION']);
        $manager->persist($gestionnaire);

        // adherent membre
        $membre1 = new Adherent();
        $membre1->setEmail('admin1@example.com');
        $membre1->setPassword('admin1');
        $membre1->setRoles(['ROLE_MEMBRE']);
        $manager->persist($membre1);

        $membre2 = new Adherent();
        $membre2->setEmail('admin2@example.com');
        $membre2->setPassword('admin2');
        $membre2->setRoles(['ROLE_MEMBRE']);
        $manager->persist($membre2);

        

        // adherent user
        $users = [];
        for ($i = 1; $i <= 7; $i++) {
            $user = new Adherent();
            $user->setEmail($faker->unique()->email);
            $user->setPassword('password123');
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
            $users [] = $user;
        }

        // Création de 10 infos adherents
        //infos gestionnaire
        $infoGestionnaire = new InfosAdherent();
        $infoGestionnaire->setNom($faker->lastName);
        $infoGestionnaire->setPrenom($faker->firstName);
        $infoGestionnaire->setTelephone($faker->unique()->phoneNumber);
        $infoGestionnaire->setAdresse($faker->address);
        $infoGestionnaire->setDateNaissance($faker->dateTime);
        $infoGestionnaire->setPratique($faker->word);
        $infoGestionnaire->setAdherent($gestionnaire);
        $manager->persist($infoGestionnaire);

        //infos membres

        $infoMembre1 = new InfosAdherent();
        $infoMembre1->setNom($faker->lastName);
        $infoMembre1->setPrenom($faker->firstName);
        $infoMembre1->setTelephone($faker->unique()->phoneNumber);
        $infoMembre1->setAdresse($faker->address);
        $infoMembre1->setDateNaissance($faker->dateTime);
        $infoMembre1->setPratique($faker->word);
        $infoMembre1->setAdherent($membre1);
        $manager->persist($infoMembre1);

        $infoMembre2 = new InfosAdherent();
        $infoMembre2->setNom($faker->lastName);
        $infoMembre2->setPrenom($faker->firstName);
        $infoMembre2->setTelephone($faker->unique()->phoneNumber);
        $infoMembre2->setAdresse($faker->address);
        $infoMembre2->setDateNaissance($faker->datet);
        $infoMembre2->setPratique($faker->word);
        $infoMembre2->setAdherent($membre2);
        $manager->persist($infoMembre2);



        //infos des users
        $infosUsers = [];
        for ($i = 1; $i < 7; $i++) {
            $uneInfoUser = new InfosAdherent();
            $uneInfoUser->setNom($faker->lastName);
            $uneInfoUser->setPrenom($faker->firstName);
            $uneInfoUser->setTelephone($faker->unique()->phoneNumber);
            $uneInfoUser->setAdresse($faker->address);
            $uneInfoUser->setDateNaissance($faker->dateTime);
            $uneInfoUser->setPratique($faker->word);
            $uneInfoUser->setAdherent($faker->randomElement($users));
            $manager->persist($uneInfoUser);
            $infosUsers[] = $uneInfoUser;
        }

        dd($infoGestionnaire, $infoMembre1, $infoMembre2, $infosUsers); 
     
        





       


        $manager->flush();
    }
}
