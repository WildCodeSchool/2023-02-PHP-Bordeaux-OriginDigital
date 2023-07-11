<?php

namespace App\Components;

use App\Repository\CategoryRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('all_category')]
class AllCategoryComponent
{
    public function __construct(
        private CategoryRepository $categoryRepository
    ) {
    }

    public function getAllCategory(): array
    {
        return $this->categoryRepository->findAll();
    }
}
