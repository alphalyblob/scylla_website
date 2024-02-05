<?php

namespace App\Controller\Admin;

use App\Entity\Seances;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

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
            // yield IdField::new('id')->hideOnForm(),
            yield AssociationField::new('cours'),
            yield DateTimeField::new('dateDebut'),
            yield DateTimeField::new('dateFin'),
            yield TextareaField::new('infos'),
        ];
    }
    
}
