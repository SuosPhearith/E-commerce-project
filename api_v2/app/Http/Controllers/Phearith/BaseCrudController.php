<?php

namespace App\Http\Controllers\Phearith;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BaseCrudController extends Controller
{
    protected $model;

    public function getAll(Request $request)
    {
        try {
            $perPage = $request->query('per_page', 20);
            $items = $this->model::paginate($perPage);

            return response()->json($items, Response::HTTP_OK);
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }


    public function getById($id)
    {
        try {
            $item = $this->model::find($id);
            if (!$item) {
                return response()->json(['message' => $this->getModelName() . ' not found'], Response::HTTP_NOT_FOUND);
            }
            return response()->json($item, Response::HTTP_OK);
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }


    public function delete($id)
    {
        try {
            $item = $this->model::find($id);

            if (!$item) {
                return response()->json(['message' => $this->getModelName() . ' not found'], Response::HTTP_NOT_FOUND);
            }

            $item->delete();

            return response()->json(['message' => $this->getModelName() . ' deleted successfully'], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }

    protected function handleValidationException(ValidationException $e)
    {
        return response()->json([
            'message' => 'Validation Error',
            'errors' => $e->errors(),
        ], Response::HTTP_BAD_REQUEST);
    }

    protected function handleUnexpectedException(\Exception $e)
    {
        return response()->json([
            'message' => 'Server Error',
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    protected function getModelName()
    {
        return class_basename($this->model);
    }

    protected function getCurrentUserId()
    {
        return Auth::id();
    }
}

/*

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', Rule::unique('colors')],
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
                'name' => ['required', 'string', Rule::unique('colors')->ignore($id)],
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
    */
