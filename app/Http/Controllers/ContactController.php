<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Twilio\Rest\Client;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validation correcte
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        // Envoi de l'e-mail
        Mail::to(env('MAIL_ADMIN_ADDRESS'))->send(new ContactMail($validatedData));

        // Envoi du message WhatsApp
        // $this->sendWhatsAppNotification($validatedData);

        // Ajouter un message flash
        return redirect()->back()->with('success', 'Votre message a bien été envoyé !');

        // return response()->json(['message' => 'Votre message a été envoyé avec succès.']);
    }

    // private function sendWhatsAppNotification($data)
    // {
    //     $sid = env('TWILIO_SID');
    //     $token = env('TWILIO_AUTH_TOKEN');
    //     $twilio = new Client($sid, $token);

    //     $message = "Nouveau message de contact pour l'Hôtel Bianiac :\n"
    //         . "- Nom: {$data['name']}\n"
    //         . "- Email: {$data['email']}\n"
    //         . "- Sujet: {$data['subject']}\n"
    //         . "- Message: {$data['message']}";

    //     $twilio->messages->create(
    //         env('WHATSAPP_TO'),
    //         [
    //             'from' => env('TWILIO_WHATSAPP_FROM'),
    //             'body' => $message
    //         ]
    //     );
    // }
}
