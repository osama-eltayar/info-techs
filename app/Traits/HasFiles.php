<?php

namespace App\Traits;

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Storage;

trait HasFiles
{
    protected $storageDisk = 'local';

    public function storeFile( string $dirName, $file, $parent = NULL )
    {
        $path = $dirName;
        $path .= $parent ? '/' . $parent : NULL;
        return Storage::disk($this->disk())->putFile($path, $file);
    }

    public function getFileUrl( $path ): ?string
    {
        if ( $path )
            return Storage::disk($this->disk())->url($path);
        return NULL;
    }

    public function getMimeType( $path )
    {
        if ( $path )
            return Storage::disk($this->disk())->mimeType($path);
        return NULL;
    }

    public function disk()
    {
        return $this->storageDisk??'public';
    }

    public function deleteFile( $path ): ?bool
    {
        if ( $path && Storage::exists($path) )
            return Storage::delete($path);
        return NULL;
    }

    public function getDownloadUrl( $path )
    {
        if ( $path )
            return Storage::disk($this->disk())->download($path);
        return null;
    }

    public function getDownloadFileUrl( $path ): ?string
    {
        if ( $path )
            return action([ UploadController::class, 'download' ], [ 'path' => $path ]);
        return null;
    }
}
