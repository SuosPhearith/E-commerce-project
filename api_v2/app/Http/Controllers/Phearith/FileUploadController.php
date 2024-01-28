<?php

namespace App\Http\Controllers\Phearith;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class FileUploadController extends Controller
{
    public static function uploadImage($request, $file, $directory = "uploads")
    {
        try {
            if ($request->hasFile($file)) {
                $file = $request->file($file);
                if ($file->isValid()) {
                    $request->validate([
                        $file => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);
                    $fileNameToStore = time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->move(public_path($directory), $fileNameToStore);
                    return $directory . '/' . $fileNameToStore;
                }
            }

            return "";
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public static function uploadImages($request, $files, $directory = "uploads")
    {
        try {
            $uploadedFilePaths = [];

            foreach ($files as $file) {
                if ($request->hasFile($file)) {
                    $uploadedFilePaths[] = self::uploadImage($request, $file, $directory);
                }
            }

            return $uploadedFilePaths;
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public static function storeImage($image, $directory = "uploads")
    {
        return "storage/" . $image->store($directory, "public");
    }
    public static function DeleteImage($imageUrl)
    {
        $filePath = 'public/' . str_replace('storage/', '', $imageUrl);
        Storage::delete($filePath);
    }
}
