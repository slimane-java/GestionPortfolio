<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ExperienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experience::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $id = IntegerField::new('id');
        $post = TextField::new('post');
        $dateDebut = DateField::new('dateDebut');
        $dateFin = DateField::new('dateFin');
        $nomEntreprise = TextField::new('nomEntreprise');
        $emailEntreprise = TextField::new('emailEntreprise');
        $descriptionEntreprise = TextField::new('descriptionEntreprise');
        $function = TextField::new('functiongit');
        $client = AssociationField::new('client');
        return [$post, $dateFin, $dateDebut, $nomEntreprise, $emailEntreprise, $descriptionEntreprise, $function, $client];
    }

}
