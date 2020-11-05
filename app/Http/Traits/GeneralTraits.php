<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;


trait GeneralTraits{

    public function file_save($folder,$file, $filename){

        $path = $file->storeAs(
            $folder, $filename
        );

        if($path){
            return Storage::url($folder."/".$filename);
        }
    }
}