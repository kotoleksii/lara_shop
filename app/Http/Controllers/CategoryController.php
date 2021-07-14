<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\ValidationService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Get all categories
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Category::all();
    }

    /**
     * Get by id
     *
     * @param Category $category
     * @return Category
     */
    public function get(Category $category): Category
    {
        return $category;
    }

    /**
     * Create new category
     * @param Request $request
     * @param ValidationService $validationService
     * @return Category|Model
     * @throws ValidationException
     */
    public function create(Request $request, ValidationService $validationService): Category
    {
         return Category::create($validationService->check('category_create'));
    }

    /**
     * Patch category
     *
     * @param Category $category
     * @param ValidationService $validationService
     * @return JsonResponse
     * @throws ValidationException
     */
   public function patch(Category $category, ValidationService $validationService): JsonResponse
   {
       // TODO:
       $category->update($validationService->check('category_patch'));

       return response()->json('', \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
   }

    /**
     * Delete category
     *
     * @param Category $category
     * @return JsonResponse
     */
   public function delete(Category $category): JsonResponse
   {
       if($category->subCategories()->exists())
           return response()->json('', \Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY);

       $category->delete();

       return response()->json('', \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
   }
}
