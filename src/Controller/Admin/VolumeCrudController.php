<?php

namespace App\Controller\Admin;

use App\Entity\Volume;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VolumeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Volume::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('author'),
            AssociationField::new('bookshelf'),
            CollectionField::new('reviews'),
        ];
    }
}
