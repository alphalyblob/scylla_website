<?php

namespace App\Controller\Admin;

use App\Entity\Adherent;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Form\{FormBuilderInterface, FormEvent, FormEvents};
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
        $password = TextField::new('password')
            ->setFormType(RepeatedType::class)
            ->setFormTypeOptions([
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => 'Password',
                    'hash_property_path' => 'password',
                ],
                'second_options' => ['label' => '(Repeat)'],
                'mapped' => false,
            ])
            ->setRequired($pageName === Crud::PAGE_NEW)
            ->onlyOnForms();
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('email'),
            $password,
            TextField::new('password'),
            ArrayField::new('roles'),
            AssociationField::new('infosAdherent'),
        ];
    }
}
