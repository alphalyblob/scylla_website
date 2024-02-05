<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use App\Entity\ParticipantsCours;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ParticipantsCoursCrudController extends AbstractCrudController
{
    use Trait\ReadDetailTrait;
    public static function getEntityFqcn(): string
    {
        return ParticipantsCours::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // yield IdField::new('id')->hideOnForm(),
            yield AssociationField::new('adherent'),
            yield AssociationField::new('cours')->autocomplete(),
        ];
    }
    
}
