<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Services\ValidationService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
    public function multipleUpload(Album $album, ValidationService $validationService)
    {
        $data = $validationService->check('images_multiple_upload', \request()->all());

        foreach ($data['upload'] as $image) {

        }
    }

}
