<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // 1) Validación
        $data = $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // 2) Envío: aquí DEFINES el destinatario con to()
        Mail::to('joseluis@gmail.com')              // <— tu email
            ->send(new ContactMessage($data));

        return back()->with('success', '¡Mensaje enviado correctamente!');
    }
}
