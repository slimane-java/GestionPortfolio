<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use App\Entity\Role;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('name')
            ->add('prenom')
            ->add('username')
            ->add('enabled')
            ->add('lastLogin')
            ->add('createdAt');
    }

    public function configureFields(string $pageName): iterable
    {

        $id = IntegerField::new('id');
        $name = TextField::new('name');
        $prenom = TextField::new('prenom');
        $dateNaissance = DateField::new('dateNaissance');
        $tell = TextField::new('tell');
        $adress = TextField::new('adress');
        $linkdine = TextField::new('linkdine');
        $github = TextField::new('github');
        $facebook = TextField::new('facebook');
        $username = TextField::new('username');
        $usernameCanonical = TextField::new('usernameCanonical');
        $email = TextField::new('email');
        $emailCanonical = TextField::new('emailCanonical');
        $enabled = BooleanField::new('enabled')->renderAsSwitch(false);
        $salt = TextField::new('salt');
        $password = TextField::new('password');
        $lastLogin = DateField::new('lastLogin');
        $confirmationToken = TextField::new('confirmationToken');
        $passwordRequestedAt = DateField::new('passwordRequestedAt');
        $roles = TextField::new('roles');
        $createdAt = DateField::new('createdAt');
        $updatedAt = DateField::new('updatedAt');
        $plainPassword = TextField::new('plainPassword');

        if ($this->isGranted(Role::ROLE_ADMIN)) {
            $enabled->renderAsSwitch(true);
        }

        if (Crud::PAGE_INDEX === $pageName) {
            return [$name, $prenom, $username, $enabled, $lastLogin, $createdAt, $updatedAt];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $name, $prenom, $dateNaissance, $tell, $adress, $linkdine, $github, $facebook,$username, $usernameCanonical, $email, $emailCanonical, $enabled, $salt, $password, $passwordRequestedAt, $lastLogin, $confirmationToken, $roles, $createdAt, $updatedAt];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$name, $prenom, $dateNaissance, $tell, $adress, $linkdine, $github, $facebook, $email, $enabled, $plainPassword];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$name, $prenom, $dateNaissance, $tell, $adress, $linkdine, $github, $facebook, $email, $enabled, $plainPassword];
        }

        return [];
    }
}
