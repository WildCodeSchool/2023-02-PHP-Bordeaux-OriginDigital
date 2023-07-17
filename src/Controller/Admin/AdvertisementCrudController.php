<?php

namespace App\Controller\Admin;

use App\Entity\Advertisement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichFileType;

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

            Field::new('advertisementFile', 'Fichier vidéo')
                ->setFormType(VichFileType::class)
                ->setFormTypeOptions([
                    'required' => true,
                    'download_label' => 'Voir la video',
                ])
                ->formatValue(function ($value, $entity) {
                    // Récupérer le nom du fichier depuis l'entité Video
                    $fileName = $entity->getLink();
                    // Retourner le nom du fichier s'il est disponible, sinon retourner la valeur par défaut
                    return $fileName ? $fileName : 'Aucun fichier sélectionné';
                }),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Publicité')
            ->setEntityLabelInPlural('Publicités');
    }
}
