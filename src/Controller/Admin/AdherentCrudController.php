<?php

namespace App\Controller\Admin;

use App\Entity\Adherent;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
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
            TextField::new('email'),
            $passwordnew,
            TextField::new('password')->hideOnForm(),
            ArrayField::new('roles'),
            AssociationField::new('infosAdherent'),
        ];
    }
}
