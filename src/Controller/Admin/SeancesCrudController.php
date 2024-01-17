<?php

namespace App\Controller\Admin;

use App\Entity\Seances;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SeancesCrudController extends AbstractCrudController
{
    use Trait\ReadDetailTrait;
    public static function getEntityFqcn(): string
    {
        return Seances::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('cours'),
            DateField::new('dateDebut'),
            DateField::new('dateFin'),
            TextField::new('infos'),
        ];
    }
    
}
