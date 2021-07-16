<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Services\FileService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageController extends Controller
{
    public function download($id, FileService $fileService): ?StreamedResponse
    {
        $image = Image::find($id);

        return $fileService->getStream($image->file);
    }
}
