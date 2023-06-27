<?php

namespace App\Controller\Admin;

use App\Entity\Advertisement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdvertisementCrudController extends AbstractCrudController
{
    use Trait\AddShowTrait;

    public static function getEntityFqcn(): string
    {
        return Advertisement::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', label: 'Id')->hideOnForm(),
            TextField::new('name', label: 'Nom de la publicité'),
            TextField::new('link', label: 'Lien de la publicité'),
            ImageField::new('thumbnail', label: 'Image de la publicité')
                ->setBasePath('uploads/advertisements/')
                ->setUploadDir('public/uploads/advertisements/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true),
        ];
    }
}
