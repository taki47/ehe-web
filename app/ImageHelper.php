<?php

namespace App;

use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

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
     * new: csak feltölti a képet,
     * update: törli és feltölti a képet
     */
    public function UploadImage($method, $oldImage=null)
    {
        $image = $this->image;

        $imageInfo = pathinfo($image->getClientOriginalName());
        $imageName = Str::slug($imageInfo["filename"]).".webp";
        
        if ( file_exists($this->imagePath.$imageName) )
            $imageName = \Carbon\Carbon::now()->format("U").$imageName;
        
        if ( $method=="update" ) {
            //régi törlése
            Self::DeleteImage($oldImage);
        }
        
        $manager = new ImageManager(Driver::class);
        $img = $manager->read($image->path());
        $img->resize(50, 25);

        $img->toWebp()->save($this->imagePath.$imageName);

        return $imageName;
    }

    public function DeleteImage($image)
    {
        if ( $image!="" ) {
            $image = $this->imagePath.$image;
            if ( file_exists($image) )
                    unlink($image);
        }
    }

}