<?php

namespace App\Controller\Admin;

use App\Entity\Tarifs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TarifsCrudController extends AbstractCrudController
{
    use Trait\ReadDetailTrait;
    public static function getEntityFqcn(): string
    {
        return Tarifs::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // yield IdField::new('id')->hideOnForm(),
            yield TextareaField::new('formule'),
            yield TextField::new('prix'),
        ];
    }
    
}
