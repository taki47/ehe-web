<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class ImageHelper {

    protected $image;
    protected $imagePath;

    public function __construct($image, $imagePath)
    {
        $this->image     = $image;
        $this->imagePath = $imagePath;
    }

    public function IsImageOk()
    {
        $image = $this->image;

        //méret
        $size = $image->getSize();
        if ( $size==0 )
            return "A feltöltött kép mérete maximum 2MB lehet!";

        //csak kép
        $mimeType = explode("/",$image->getClientMimeType());
        if ( $mimeType[0]!="image" )
            return "A feltöltött fájl nem kép!";
        
        //megfelelő kiterjesztés
        $ext = $image->getClientOriginalExtension();
        if ( !($ext=="jpeg" || $ext=="png" || $ext=="jpg" || $ext=="gif" || $ext=="webp") )
            return "A feltöltött kép kiterjesztése csak a következőek lehetnek: jpeg, jpg, png, gif!";

        return "";
    }

    /**
     * METHOD:
     * new: csak feltölti a fájlt,
     * update: törli és feltölti a fájlt
     */
    public function UploadImage($method, $resize = false, $resizeDimensions = [], $oldImage = null)
    {
        $image = $this->image;
        $fullPath = public_path($this->imagePath);

        // Get the image file info
        $imageInfo = pathinfo($image->getClientOriginalName());
        // Create a slugged name for the image file
        $imageName = Str::slug($imageInfo["filename"]) . ".webp";
        
        // Check if a file with the same name exists
        if (File::exists($fullPath . '/' . $imageName)) {
            $imageName = \Carbon\Carbon::now()->format("U") . $imageName; // Prevent overwrite
        }
        
        // Handle image deletion if updating
        if ($method == "update" && $oldImage) {
            $this->DeleteImage($oldImage);
        }
        
        // Create an instance of the ImageManager
        $manager = new ImageManager(Driver::class);
        $img = $manager->read($image->path());
        
        if ( $resize )
            $img->resize($resizeDimensions[0], $resizeDimensions[1]);

        // Check and create the directory if it does not exist
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true); // Rekurzív létrehozás
        }

        // Save the image to the storage
        $img->toWebp()->save($fullPath."/".$imageName);

        return $imageName;
    }

    public function DeleteImage($image)
    {
        if ( $image!="" ) {
            $image = public_path().$this->imagePath.$image;
            if ( file_exists($image) )
                    unlink($image);
        }
    }

}