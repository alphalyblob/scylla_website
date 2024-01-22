<?php

namespace App\Controller\Admin;

use App\Entity\Adherent;
use App\Entity\InfosAdherent;
use App\Form\AdminAdherentType;
use App\Form\InfosAdherentType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdherentCrudController extends AbstractCrudController
{
    use Trait\ReadDetailTrait;

    public function __construct(public UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Adherent::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $passwordnew = TextField::new('password')
            ->setFormType(RepeatedType::class)
            ->setFormTypeOptions([
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => 'Mot de passe',
                    'hash_property_path' => 'password',
                ],
                'second_options' => ['label' => 'Répéter'],
                'mapped' => false,
            ])
            ->setRequired($pageName === Crud::PAGE_NEW)
            ->onlyOnForms();
        
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email'),
            $passwordnew,
            TextField::new('password')->hideOnForm(),
            ArrayField::new('roles'),
            AssociationField::new('infosAdherent'),
            AssociationField::new('participantsCours', 'Participation')->setFormTypeOptions([
                'by_reference' => false, // Make sure to set by_reference to false
            ])->addCssClass('select2'), // You can use select2 for a better UI



            // CollectionField::new('participantsCours'),
            // CollectionField::new('participantsEvenements'),

        ];
    }
}
