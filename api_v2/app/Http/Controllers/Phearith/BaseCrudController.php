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
    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'price' => 'required',
                'description' => 'nullable|string',
                'category_id' => 'required',
                'discount' => 'nullable|string',
                'tags' => 'nullable|string',
                'additional_information' => 'nullable|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'images' => 'required|array',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            DB::beginTransaction();

            try {
                $data = $request->all();
                $image = FileUploadController::storeImage($request->file('image'), 'uploads/products');
                $data['image'] = $image;
                $data['modified_by'] = $this->getCurrentUserId();
                $item = $this->model::create($data);

                foreach ($request->file('images') as $image) {
                    $imagePath = FileUploadController::storeImage($image, 'uploads/products');
                    $item->images()->create([
                        'image' => $imagePath,
                    ]);
                }
                DB::commit();

                return response()->json($item, Response::HTTP_CREATED);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }
    :::::::::::::::::::::::::>>=====================<<:::::::::::::::::::::::::
    create and update with upload single image or multiple images
    :::::::::::::::::::::::::>>=====================<<:::::::::::::::::::::::::
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'price' => 'required',
                'description' => 'nullable|string',
                'category_id' => 'required',
                'discount' => 'nullable|string',
                'tags' => 'nullable|string',
                'additional_information' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'images' => 'nullable|array',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            DB::beginTransaction();

            try {
                $item = Product::with('images')->find($id);
                if (!$item) {
                    return response()->json(['message' => $this->getModelName() . ' not found'], Response::HTTP_NOT_FOUND);
                }

                if ($request->hasFile('image')) {
                    FileUploadController::DeleteImage($item->image);
                    $image = FileUploadController::storeImage($request->file('image'), 'uploads/products');
                    $item->update(['image' => $image]);
                }

                if ($request->hasFile('images')) {
                    foreach (Product::with('images')->find($id)->images as $image) {
                        FileUploadController::DeleteImage($image->image);
                    }
                    $item->images()->delete();
                    foreach ($request->file('images') as $image) {
                        $imagePath = FileUploadController::storeImage($image, 'uploads/products');
                        $item->images()->create(['image' => $imagePath]);
                    }
                }

                DB::commit();

                return response()->json($item, Response::HTTP_OK);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (ValidationException $e) {
            return $this->handleValidationException($e);
        } catch (\Exception $e) {
            return $this->handleUnexpectedException($e);
        }
    }
    */
