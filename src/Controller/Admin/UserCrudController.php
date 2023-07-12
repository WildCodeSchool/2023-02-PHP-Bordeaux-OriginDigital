<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Factory\FilterFactory;
use App\Service\CsvService;
use EasyCorp\Bundle\EasyAdminBundle\Config\Option\EA;
use Symfony\Component\HttpFoundation\Request;

class UserCrudController extends AbstractCrudController
{
    use Trait\AddShowTrait;

    private CsvService $csvService;
    private FilterFactory $filterFactory;

    public function __construct(CsvService $csvService, FilterFactory $filterFactory)
    {
        $this->csvService = $csvService;
        $this->filterFactory = $filterFactory;
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $export = Action::new('export', 'Télécharger la liste')
            ->setIcon('fa fa-download')
            ->linkToCrudAction('export')
            ->setCssClass('btn')
            ->createAsGlobalAction();

        return $actions->add(Crud::PAGE_INDEX, $export);
    }

    public function export(Request $request): \Symfony\Component\HttpFoundation\Response
    {
        $context = $request->attributes->get(EA::CONTEXT_REQUEST_ATTRIBUTE);
        $fields = FieldCollection::new($this->configureFields(Crud::PAGE_INDEX));
        $filters = $this->filterFactory->create($context->getCrud()
            ->getFiltersConfig(), $fields, $context->getEntity());
        $users = $this->createIndexQueryBuilder($context->getSearch(), $context->getEntity(), $fields, $filters)
            ->getQuery()
            ->getResult();

        $data = [];
        foreach ($users as $user) {
            $data[] = $user->getExportData();
        }

        return $this->csvService->export(
            $data,
            'export_users_' . date_create()->format('d-m-y') . '.csv'
        );
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs');
    }


    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
