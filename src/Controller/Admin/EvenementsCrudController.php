<?php

namespace App\Controller\Admin;

use App\Entity\Evenements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EvenementsCrudController extends AbstractCrudController
{
    use Trait\ReadDetailTrait;
    public static function getEntityFqcn(): string
    {
        return Evenements::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('titre'),
            TextField::new('descriptif'),
            DateField::new('date'),
            TextField::new('commentaire'),
            AssociationField::new('typeEvenement'),

            
        ];
    }
    
}
