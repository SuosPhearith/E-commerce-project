<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ColorController extends Controller
{
    public function getAll()
    {
        try {
            $colors = Color::all();
            return response()->json($colors, Response::HTTP_OK);
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
            $color = Color::find($id);
            if (!$color) {
                return response()->json(['message' => 'Color not found'], Response::HTTP_NOT_FOUND);
            }
            return response()->json($color, Response::HTTP_OK);
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
                'name' => 'required|string|unique:colors',
                'description' => 'nullable|string',
            ]);

            $color = Color::create($request->all());

            return response()->json($color, Response::HTTP_CREATED);
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
            $color = Color::find($id);

            if (!$color) {
                return response()->json(['message' => 'Color not found'], Response::HTTP_NOT_FOUND);
            }

            $request->validate([
                'name' => 'required|string|unique:colors',
                'description' => 'nullable|string',
            ]);

            $color->update($request->all());

            return response()->json($color, Response::HTTP_OK);
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
            $color = Color::find($id);

            if (!$color) {
                return response()->json(['message' => 'Color not found'], Response::HTTP_NOT_FOUND);
            }

            $color->delete();

            return response()->json(['message' => 'Color deleted successfully'], Response::HTTP_OK);

            return response()->json($color, Response::HTTP_OK);
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
