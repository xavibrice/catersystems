<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('fullName', 'Nombre completo'),
            TextField::new('dniCif', 'Dni / Cif'),
            TelephoneField::new('mobile', 'Móvil / Teléfono'),
            EmailField::new('email', 'Correo'),
            TextEditorField::new('comment', 'Comentario'),
            CollectionField::new('installations')
                ->setTemplatePath('admin/layout/client_installations.html.twig')
                ->onlyOnDetail(),
            CollectionField::new('electricities')
                ->setTemplatePath('admin/layout/client_electricities.html.twig')
                ->onlyOnDetail()
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Cliente')
            ->setEntityLabelInPlural('Clientes')
            ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, 'detail');
        //return parent::configureActions($actions); // TODO: Change the autogenerated stub
    }

}
