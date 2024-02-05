<?php

namespace App\Controller\Admin;

use App\Entity\ParticipantsEvenements;
use App\Form\ParticipantsEvenementsType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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
            // yield IdField::new('id')->hideOnForm(),
            yield AssociationField::new('adherent'),
            yield AssociationField::new('evenement')->autocomplete(),
        ];
    }
    
}
