<?php

namespace App\Controller\Admin;

use App\Entity\ProjetEntreprise;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjetEntrepriseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProjetEntreprise::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $id = IntegerField::new('id');
        $experiences = AssociationField::new('experiences');
        $titre = TextField::new('titre');
        $description = TextareaField::new('description');
        $nomEntreprise = TextField::new('nomEntreprise');
        $emailEntreprise = TextField::new('emailEntreprise');
        $descriptionEntreprise = TextareaField::new('descriptionEntreprise');
        $typeEmploye = TextField::new('typeEmploye');
        $post = TextField::new('post');

        return [$experiences, $post, $nomEntreprise, $emailEntreprise, $descriptionEntreprise, $typeEmploye,$titre, $description];
    }

}
