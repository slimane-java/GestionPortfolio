<?php

namespace App\Controller\Admin;

use App\Entity\Mession;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MessionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mession::class;

    }


    public function configureFields(string $pageName): iterable
    {
        $id = TextField::new('id');
        $projets = AssociationField::new('projets');
        $titre = TextField::new('titre');
        $description = TextareaField::new('description');

        return [$projets, $titre, $description];
    }

}
