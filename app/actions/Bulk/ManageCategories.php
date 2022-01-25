<?php

namespace App\Actions\Bulk;

use App\Actions\BaseAction;
use App\Models\Category;

class ManageCategories extends BaseAction
{
    private array $categoryData;

    public function __construct(array $categoryData)
    {
        $this->categoryData = $categoryData;
    }

    protected function transact()
    {
        return Category::rebuildTree($this->categoryData);
    }
}
