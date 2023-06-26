<?php

namespace App\Controller\Admin;

use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class VideoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Video::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', label: 'Id'),
            TextField::new('title', label: 'Titre')
                ->setFormTypeOptions([
                    'required' => true,
                ]),
            AssociationField::new('category', label: 'Categories')
                ->setFormTypeOptions([
                    'required' => true,
                ]),
            TextEditorField::new('Description', label: 'Description')
                ->setFormTypeOptions([
                    'required' => true,
                ]),
            BooleanField::new('Is_Premium', 'Premium')
                ->renderAsSwitch(false),
            Field::new('Video_Link', label: 'Lien de la video')
                ->setFormType(FileType::class)
                ->setFormTypeOptions([
                    'required' => true,
                ])
        ];
    }
}
