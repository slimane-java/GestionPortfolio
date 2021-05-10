<?php

namespace App\Controller\Admin;

use App\Entity\TypeCompetence;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TypeCompetenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeCompetence::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $id = IntegerField::new('id');
        $label = TextField::new('label');
        $competence = AssociationField::new('competence');

        return [$label, $competence];
    }

}
