<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\DeleteCategory;
use App\Http\Requests\UpdateCategory;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Support\CategoryPrivacy;

class CategoryController extends BaseController
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $categories = CategoryPrivacy::getFilteredFor($request->user, $request->query('parent_id'))->keys();

        return CategoryResource::collection($categories);
    }

    public function fetch(Request $request, Category $category): CategoryResource
    {
        if (! $category->isAccessibleTo($request->user())) {
            return $this->notFoundResponse();
        }

        return new CategoryResource($category);
    }

    public function store(CreateCategory $request): CategoryResource
    {
        $category = $request->fulfill();

        return new CategoryResource($category);
    }

    public function update(UpdateCategory $request): CategoryResource
    {
        $category = $request->fulfill();

        return new CategoryResource($category);
    }

    public function delete(DeleteCategory $request): Response
    {
        $request->fulfill();

        return new Response(['success' => true], 200);
    }
}
