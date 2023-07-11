<?php

namespace App\Components;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('category')]
class CategoryComponent
{
    public int $id;

    public function __construct(
        private CategoryRepository $categoryRepository
    ) {
    }

    public function getCategory(): Category
    {
        return $this->categoryRepository->find($this->id);
    }
}
