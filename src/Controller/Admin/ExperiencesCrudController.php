<?php

namespace App\Controller\Admin;

use App\Entity\Experiences;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ExperiencesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experiences::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $id = IntegerField::new('id');
        $dateDebut = DateField::new('dateDebut');
        $dateFin = DateField::new('dateFin');
        $actuellement = BooleanField::new('actuellement');
        $client = AssociationField::new('client');
        $projets = AssociationField::new('projets');

        return [$dateDebut, $dateFin, $client];
    }
}
