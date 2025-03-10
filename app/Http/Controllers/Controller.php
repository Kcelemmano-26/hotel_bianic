<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Controller
{
    public function chambre(){
    $directory = public_path('images/chambres/presidentiel');
    $files = File::files($directory);
    
    $direct = public_path('images/chambres/standard');
    $files = File::files($direct);

    $directo = public_path('images/chambres/familliale');
    $files = File::files($direct);

    $images = [];
    $img = [];
    $directo = [];

    foreach ($files as $file) {
        $images[] = 'images/chambres/presidentiel/' . $file->getFilename();
        $img[] = 'images/chambres/standard/' . $file->getFilename();
        $directo[] = 'images/chambres/familliale/' . $file->getFilename();
    }
    return view('chambre', compact('images', 'img', 'directo'));
    }
}
