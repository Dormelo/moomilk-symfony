<?php

namespace App\Controller\Admin;

use App\Entity\Milking;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class MilkingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Milking::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $cow = AssociationField::new('cow');
        $createdAt = DateTimeField::new('createdAt');

        return [
            $createdAt->setFormat( DateTimeField::FORMAT_MEDIUM,  DateTimeField::FORMAT_SHORT),
            $cow,
            NumberField::new('quantity'),
        ];
    }
}
