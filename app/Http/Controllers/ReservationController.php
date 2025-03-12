<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Notifications\ReservationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|numeric',
            'chambre' => 'required|string',
            'arrivee' => 'required|date',
            'depart' => 'required|date',
            'personnes' => 'required|integer|min:1',
            'nombre_enfants' => 'nullable|integer|min:0', // Validation pour le nombre d'enfants
            'message' => 'nullable|string|max:500',
        ]);

        // Création de la réservation
        $reservation = Reservation::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'chambre' => $request->chambre,
            'arrivee' => $request->arrivee,
            'depart' => $request->depart,
            'personnes' => $request->personnes,
            'nombre_enfants' => $request->nombre_enfants, // Ajout du nombre d'enfants
            'message' => $request->message,
        ]);

        // Envoi de l'email
        Notification::route('mail', env('MAIL_ADMIN_ADDRESS'))->notify(new ReservationEmail($reservation));

        // Redirection ou message de succès
        return redirect()->route('reservation')->with('success', 'Réservation effectuée avec succès.');
    }
}
