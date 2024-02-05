<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Trait\ReadDetailTrait;
use App\Entity\Ateliers;
use App\Form\ImagesAteliersType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AteliersCrudController extends AbstractCrudController
{
    use Trait\ReadDetailTrait;
    public static function getEntityFqcn(): string
    {
        return Ateliers::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // yield IdField::new('id')->hideOnForm(),
            yield TextField::new('label'),
            yield TextareaField::new('description'),
            yield AssociationField::new('cours')
                    ->onlyOnForms(),
            yield ArrayField::new('cours')
                    ->onlyOnDetail(),
            yield CollectionField::new('imagesAteliers')
                    ->setEntryType(ImagesAteliersType::class)
                    ->hideOnIndex(),
        ];
    }
    
}
