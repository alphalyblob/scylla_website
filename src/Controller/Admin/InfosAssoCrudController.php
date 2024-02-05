<?php

namespace App\Controller\Admin;

use App\Entity\InfosAsso;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class InfosAssoCrudController extends AbstractCrudController
{
    use Trait\ReadDetailTrait;
    public static function getEntityFqcn(): string
    {
        return InfosAsso::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // yield IdField::new('id')->hideOnForm(),
            yield TextField::new('nom'),
            yield TextareaField::new('description'),
            yield TextField::new('telephone'),
            yield TextField::new('mail'),
            yield TextField::new('siege'),
        ];
    }
    
}
