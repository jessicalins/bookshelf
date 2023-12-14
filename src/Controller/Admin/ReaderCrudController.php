<?php

namespace App\Controller\Admin;

use App\Entity\Reader;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReaderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reader::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
