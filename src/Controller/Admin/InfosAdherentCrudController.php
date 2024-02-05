<?php

namespace App\Controller\Admin;

use App\Entity\InfosAdherent;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InfosAdherentCrudController extends AbstractCrudController
{
    use Trait\ReadEditDetailOnlyTrait;
    public static function getEntityFqcn(): string
    {
        return InfosAdherent::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // yield IdField::new('id')->hideOnForm(),
            yield TextField::new('nom'),
            yield TextField::new('prenom'),
            yield TextField::new('telephone'),
            yield TextField::new('adresse'),
            yield DateField::new('dateNaissance'),
            yield TextField::new('pratique'),
            yield AssociationField::new('adherent'),  
        ];
    }
    
}
