<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Phearith\BaseCrudController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CategoryController extends BaseCrudController
{
    protected $model = Category::class;
    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', Rule::unique('categories')],
                'description' => 'nullable|string',
                'parent_id' => 'nullable',
            ]);
            $data = $request->all();
            $data['modified_by'] = $this->getCurrentUserId();
            $item = $this->model::create($data);
            return response()->json($item, Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $item = $this->model::find($id);
            if (!$item) {
                return response()->json(['message' => $this->getModelName() . ' not found'], Response::HTTP_NOT_FOUND);
            }
            $data = $request->validate([
                'name' => ['required', 'string', Rule::unique('categories')->ignore($id)],
                'description' => 'nullable|string',
                'parent_id' => 'nullable',
            ]);
            $data['modified_by'] = $this->getCurrentUserId();
            $item->update($data);
            return response()->json($item, Response::HTTP_OK);
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }
}
