<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;
use thiagoalessio\TesseractOCR\TesseractOCR;


class AIController extends Controller
{
    public function ocr(UserRequest $request)
    {
        $images = Storage::allFiles('public/ocr');

        Storage::delete($images);

        $imagePath = $request->file('image')->storePublicly('ocr','public');

        $fullPath = storage_path('app/public/') . $imagePath;

        $parsedText = (new TesseractOCR($fullPath))->run();

        $response = [
            'image_path'    => $imagePath,
            'full_path'     => $fullPath,
            'text'          => $parsedText,
        ];

        return $response;
    }
}
