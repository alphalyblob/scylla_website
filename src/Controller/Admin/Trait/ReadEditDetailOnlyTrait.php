<?php

namespace App\Controller\Admin\Trait;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

trait ReadEditDetailOnlyTrait
{
    public function configureActions(Actions $actions): Actions
    {
        $actions
            ->disable(Action::NEW, Action::DELETE)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
        return $actions;
    }
}

?>