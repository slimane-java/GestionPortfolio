<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use App\Entity\Role;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $id = IntegerField::new('id');
        $deplome = TextField::new('deplome');
        $dateDebut = DateField::new('dateDebut');
        $dateFin = DateField::new('dateFin');
        $ecole = TextField::new('ecole');
        $enabled = BooleanField::new('enabled')->renderAsSwitch(true);
        $client = AssociationField::new('client');

        if ($this->isGranted(Role::ROLE_ADMIN)) {
            $enabled->renderAsSwitch(true);
        }


        if (Crud::PAGE_INDEX === $pageName) {
            return [$deplome, $dateDebut, $dateFin, $ecole, $enabled, $client];

        }  elseif ( Crud::PAGE_NEW ==$pageName) {
            return [$deplome, $dateDebut, $dateFin, $ecole, $enabled, $client];
        }
        return [$enabled];



    }

}
