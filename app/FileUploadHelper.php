<?php

namespace App;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FileUploadHelper {

    protected $file;
    protected $filePath;

    public function __construct($file, $filePath)
    {
        $this->file     = $file;
        $this->filePath = $filePath;
    }

    /**
     * METHOD:
     * new: csak feltölti a fájlt,
     * update: törli és feltölti a fájlt
     */
    public function UploadFile($method, $oldFile=null)
    {
        $file = $this->file;
        $fullPath = public_path($this->filePath);

        $fileInfo = pathinfo($file->getClientOriginalName());
        $fileName = Str::slug($fileInfo["filename"]) . "." . $fileInfo["extension"];

        if (File::exists($fullPath . '/' . $fileName)) {
            $fileName = \Carbon\Carbon::now()->format("U") . '-' . $fileName; // Prevent overwrite
        }

        if ($method == "update") {
            // régi törlése
            Self::DeleteFile($oldFile);
        }

        // Check and create the directory if it does not exist
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true); // Rekurzív létrehozás
        }

        // Move the uploaded file to the designated path
        $file->move($fullPath, $fileName);

        return $fileName;
    }

    public function DeleteFile($file)
    {
        if ( $file!="" ) {
            $file = $this->filePath.$file;
            if ( file_exists($file) )
                    unlink($file);
        }
    }

}