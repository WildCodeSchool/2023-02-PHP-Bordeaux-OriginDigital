<?php

namespace App\Controller\Admin;

use App\Entity\Advertisement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AdvertisementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Advertisement::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', label: 'Id')->hideOnForm(),
            TextField::new('name', label: 'Nom de la publicité'),

            Field::new('link', label: 'Lien de la video')
                ->setFormType(FileType::class)
                ->setFormTypeOptions([
                    'required' => true,
                ]),
//            ImageField::new('thumbnail', label: 'Image de la publicité')
//                ->setBasePath('uploads/advertisements/')
//                ->setUploadDir('public/uploads/advertisements/')
//                ->setUploadedFileNamePattern('[randomhash].[extension]')
//                ->setRequired(true),
        ];
    }
}
