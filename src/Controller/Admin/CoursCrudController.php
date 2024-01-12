<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CoursCrudController extends AbstractCrudController
{
    use Trait\ReadDetailTrait;
    public static function getEntityFqcn(): string
    {
        return Cours::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('label'),
            TextField::new('descriptif'),
            TextField::new('niveau'),
            TextField::new('horaire'),
            TextField::new('lieu'),
            DateField::new('debutSaison'),
            DateField::new('finSaison'),
            AssociationField::new('atelier'),
            CollectionField::new('seances'),
            CollectionField::new('participantsCours'),
            CollectionField::new('medias'),
        ];
    }
    
}
