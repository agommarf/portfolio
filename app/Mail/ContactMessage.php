<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    // Aquí guardamos los datos que nos pasan para el mensaje de contacto
    public $data;

    // Constructor que recibe los datos del formulario o donde sea y los guarda en $data
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    // Construye el correo con asunto, la vista que usará y los datos que pasará a esa vista
    public function build()
    {
        return $this->subject('Nuevo mensaje de contacto') // Asunto del correo
                    ->view('emails.contact')              // Vista que se usa para el cuerpo del email
                    ->with('data', $this->data);          // Pasa los datos a la vista para mostrarlos
    }
}
