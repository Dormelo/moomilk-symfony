<?php

namespace App\Controller\Admin;

use App\Entity\Cow;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class CowCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cow::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $user = AssociationField::new('user');

        return [
            TextField::new('name'),
            NumberField::new('matricule'),
            $user
        ];
    }
    
}
