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
use Vich\UploaderBundle\Form\Type\VichFileType;

class VideoCrudController extends AbstractCrudController
{
    use Trait\AddShowTrait;
    public static function getEntityFqcn(): string
    {
        return Video::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', label: 'Id')->hideOnForm(),
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
                ])
                ->formatValue(function ($value, $entity) {
                    // Supprimer les balises HTML du texte de description
                    return strip_tags($value);
                }),
            BooleanField::new('Is_Premium', 'Premium')
                ->renderAsSwitch(false),
            Field::new('videoFile', 'Fichier vidéo')
                ->setFormType(VichFileType::class)
                ->setFormTypeOptions([
                    'required' => true,
                    'download_label' => 'Voir la video',
                ])
                ->formatValue(function ($value, $entity) {
                    // Récupérer le nom du fichier depuis l'entité Video
                    $fileName = $entity->getVideoLink();
                    // Retourner le nom du fichier s'il est disponible, sinon retourner la valeur par défaut
                    return $fileName ? $fileName : 'Aucun fichier sélectionné';
                }),
        ];
    }
}
