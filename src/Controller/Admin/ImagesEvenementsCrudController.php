<?php

namespace App\Controller\Admin;

use App\Entity\ImagesEvenements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImagesEvenementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImagesEvenements::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('evenement')
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
