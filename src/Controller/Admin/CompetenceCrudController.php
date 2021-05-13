<?php

namespace App\Controller\Admin;

use App\Entity\Competence;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompetenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Competence::class;
    }


    public function configureFields(string $pageName): iterable
    {
       $id = TextField::new("id");
       $label = TextField::new("label");
       $client= AssociationField::new("client");

       return [$label, $client];
    }

}
