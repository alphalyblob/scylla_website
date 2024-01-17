<?php

namespace App\Controller\Admin;

use App\Entity\ParticipantsEvenements;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ParticipantsEvenementsCrudController extends AbstractCrudController
{
    use Trait\ReadDetailTrait;
    public static function getEntityFqcn(): string
    {
        return ParticipantsEvenements::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('adherent'),
            CollectionField::new('evenement'),
        ];
    }
    
}
