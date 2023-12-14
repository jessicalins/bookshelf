<?php

namespace App\Controller\Admin;

use App\Entity\Bookshelf;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BookshelfCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bookshelf::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('owner'),
            ChoiceField::new('type'),
            CollectionField::new('volumes'),
        ];
    }
}
