<?php


namespace App\Services;


use App\Models\File;
use Exception;
use Illuminate\Http\UploadedFile;
use App\Enums\FileTypes as FT;
use Storage;
use Symfony\Component\HttpFoundation\File\Exception\CannotWriteFileException;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileService
{
    /**
     * File saving method
     *
     * @param UploadedFile $uploadedFile
     * @param array $config
     * @return File
     */
    public function save(UploadedFile $uploadedFile, array $config): File
    {
        $path = null;

        switch ($config['slug'])
        {
            case FT::PRODUCT_IMAGE_FILE_TYPE['slug']:
                $path = $this->saveProductImage($uploadedFile);
                break;
            case FT::PRODUCT_PDF_FILE_TYPE['slug']:
                $path = $this->saveProductPdf($uploadedFile);
                break;
        }

        if(!$path)
            throw new CannotWriteFileException();

        $file = new File();
        $file->original_name = $uploadedFile->getClientOriginalName();
        $file->original_extension = $uploadedFile->getClientOriginalExtension();
        $file->path = $path;

        $file->save();

        return $file;
    }

    /**
     * Delete file method
     *
     * @param File $file
     * @return bool
     */
    public function delete(File $file): bool
    {
        try {
            if(Storage::exists($file->path))
                Storage::delete($file->path);

            $file->delete();

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Get url file
     *
     * @param File $file
     * @return string
     */
    public function getUrl(File $file): string
    {
        if($file && Storage::exists($file->path))
            return asset('storage/' . $file->path);

        return '';
    }

    /**
     * Get file stream
     *
     * @param File $file
     * @return StreamedResponse|null
     */
    public function getStream(File $file): ?StreamedResponse
    {
        if($file && Storage::exists($file->path))
            return Storage::download($file->path, $file->original_name);

        return null;
    }

    /**
     * Save product image file
     *
     * @param UploadedFile $uploadedFile
     * @return string|null
     */
    private function saveProductImage(UploadedFile $uploadedFile): ?string
    {
        return $uploadedFile->store(FT::PRODUCT_IMAGE_FILE_TYPE['dir']);
    }

    /**
     * Save product pdf file
     *
     * @param UploadedFile $uploadedFile
     * @return false|string
     */
    private function saveProductPdf(UploadedFile $uploadedFile)
    {
        return $uploadedFile->store(FT::PRODUCT_PDF_FILE_TYPE['dir']);
    }
}
