<?php

namespace App\Controller\Admin;

use App\Entity\Cours;


use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
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
            yield IdField::new('id')->hideOnForm(),
            yield TextField::new('label'),
            yield TextField::new('descriptif'),
            yield TextField::new('niveau'),
            yield TextField::new('horaire'),
            yield TextField::new('lieu'),
            yield DateField::new('debutSaison'),
            yield DateField::new('finSaison'),
            yield AssociationField::new('atelier'),

            yield AssociationField::new('seances')
                ->onlyOnIndex(),
            yield ArrayField::new('seances')
                ->onlyOnDetail(),

            yield AssociationField::new('participantsCours')
                ->onlyOnIndex(),
            yield ArrayField::new('participantsCours')
                ->onlyOnDetail(),

            
        ];
    }
    
}

// AssociationField::new('cours')
//                 ->onlyOnIndex(),
//             ArrayField::new('cours')
//                 ->onlyOnDetail(),