<?php

namespace App\Controller\Admin;

use App\Entity\Evenements;
use App\Form\ImagesEvenementsType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
            yield IdField::new('id')->hideOnForm(),
            yield TextField::new('titre'),
            yield TextField::new('descriptif'),
            yield DateField::new('date'),
            yield TextField::new('commentaire'),
            yield AssociationField::new('typeEvenement'),
            yield CollectionField::new('imagesEvenements')
                ->setEntryType(ImagesEvenementsType::class),
            

            
        ];
    }
    
}
