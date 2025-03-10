<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;
use Twilio\Rest\Client;

class ContactController extends Controller
{

    public function submitForm(Request $request)
    {
        $request->validated([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        //Contact::create($request->all());

        // Envoi de l'e-mail
        Mail::to(env('MAIL_ADMIN_ADDRESS'))->send(new ContactMail($validated));

        // Envoi du message WhatsApp
        $this->sendWhatsAppNotification($validated);

        return response()->json(['message' => 'Votre message a été envoyé avec succès.']);
    }

    private function sendWhatsAppNotification($data)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);

        $message = "Nouveau message de contact pour l'Hôtel Bianiac :
        - Nom: {$data['nom]}
        - Email: {$data['email]}
        - Sujet: {$data['subject]}
        - Message: {$data['message]}"

        $twilio->messages->create(
            env('WHATSAPP_TO'),
            [
                'from' => env('TWILIO_WHATSAPP_FROM'),
                'body' => $message
            ]
            );
    }
}
