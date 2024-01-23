<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SizeController extends Controller
{
    public function getAll()
    {
        try {
            $sizes = Size::all();
            return response()->json($sizes, Response::HTTP_OK);
        } catch (ValidationException $e) {
            // Validation error
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            // ===> Unexpected error
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getById($id)
    {
        try {
            $size = Size::find($id);
            if (!$size) {
                return response()->json(['message' => 'Size not found'], Response::HTTP_NOT_FOUND);
            }
            return response()->json($size, Response::HTTP_OK);
        } catch (ValidationException $e) {
            // Validation error
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            // ===> Unexpected error
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|unique:sizes',
                'description' => 'nullable|string',
            ]);

            $size = Size::create($request->all());

            return response()->json($size, Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            // Validation error
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            // ===> Unexpected error
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $size = Size::find($id);

            if (!$size) {
                return response()->json(['message' => 'Size not found'], Response::HTTP_NOT_FOUND);
            }

            $request->validate([
                'name' => 'required|string|unique:sizes',
                'description' => 'nullable|string',
            ]);

            $size->update($request->all());

            return response()->json($size, Response::HTTP_OK);
        } catch (ValidationException $e) {
            // Validation error
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            // ===> Unexpected error
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id)
    {
        try {
            $size = Size::find($id);

            if (!$size) {
                return response()->json(['message' => 'Size not found'], Response::HTTP_NOT_FOUND);
            }

            $size->delete();

            return response()->json(['message' => 'Size deleted successfully'], Response::HTTP_OK);

            return response()->json($size, Response::HTTP_OK);
        } catch (ValidationException $e) {
            // Validation error
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            // ===> Unexpected error
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
