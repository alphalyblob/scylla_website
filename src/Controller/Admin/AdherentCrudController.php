<?php

namespace App\Controller\Admin;

use App\Entity\Adherent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdherentCrudController extends AbstractCrudController
{
    use Trait\ReadDetailTrait;
    public static function getEntityFqcn(): string
    {
        return Adherent::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('email'),
            TextEditorField::new('password'),
            ArrayField::new('roles'),
            AssociationField::new('infosAdherent'),
        ];
    }
    
}
