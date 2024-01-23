<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Phearith\BaseCrudController;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SizeController extends BaseCrudController
{
    protected $model = Size::class;

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', Rule::unique('sizes')],
                'description' => 'nullable|string',
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
                'name' => ['required', 'string', Rule::unique('sizes')->ignore($id)],
                'description' => 'nullable|string',
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
