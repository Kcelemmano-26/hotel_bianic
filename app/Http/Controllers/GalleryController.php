<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    function galleryImages() {
        $files = File::files(public_path('images/gallery'));
        $galleryImages = array_map(fn($file) => asset('images/gallery/' . $file->getFilename()), $files);
        

        $albums = [];

        // Définir les catégories et leurs chemins respectifs
        $categories = [
            'chambres' => 'images/gallery/chambres',
            'piscines' => 'images/gallery/piscines',
            'jardin' => 'images/gallery/jardin',
        ];

        foreach ($categories as $category => $path) {
            $fullPath = public_path($path); // Chemin absolu vers le dossier

            if (File::exists($fullPath)) {
                $files = File::files($fullPath); // Récupère les fichiers
                $albums[$category] = array_map(fn($file) => asset($path . '/' . $file->getFilename()), $files);
            } else {
                $albums[$category] = []; // Si aucun fichier, le tableau reste vide
            }
        }

        return view('gallery', compact('galleryImages', 'albums'));
    }
}
