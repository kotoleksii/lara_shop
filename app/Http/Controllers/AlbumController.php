<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use App\Services\FileService;
use App\Services\ValidationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use App\Enums\FileTypes as FT;
use function request;

class AlbumController extends Controller
{
    /**
     * Create new album
     * @param ValidationService $validationService
     * @return mixed
     * @throws ValidationException
     */
    public function create(ValidationService $validationService)
    {
        return Album::create($validationService->check('album_create'));
    }

    /**
     * @throws ValidationException
     */
    public function multipleUpload(
        Album $album,
        ValidationService $validationService,
        FileService $fileService
    ): JsonResponse
    {
        $data = $validationService->check('images_multiple_upload', request()->all());

        foreach ($data['upload'] as $image) {
            /*var App\Model\File $file*/
            $file = $fileService->save($image, FT::PRODUCT_IMAGE_FILE_TYPE);

           if ($file) {
                $image = new Image();
                $image->file_id = $file->id;
                $image->album()->associate($album);
                $image->save();
           }
        }

        $album->load(['images']);

        return response()->json($album, 201);
    }
}
