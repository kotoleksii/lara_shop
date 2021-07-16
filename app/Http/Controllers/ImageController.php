<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Services\FileService;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageController extends Controller
{
    /**
     * Download image from id method
     * @param $id
     * @param FileService $fileService
     * @return StreamedResponse|null
     */
    public function download($id, FileService $fileService): ?StreamedResponse
    {
        $image = Image::find($id);

        return $fileService->getStream($image->file);
    }
}
