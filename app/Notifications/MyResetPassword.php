<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use PharIo\Manifest\InvalidEmailException;

class MyResetPassword extends ResetPassword
{

    public function toMail($notifiable)
    {
//        return (new MailMessage)
//            ->line('You are receiving this email because we received a password reset request for your account.')
//            ->action('Reset Password', route('password.reset', $this->token))
//            ->line('If you did not request a password reset, no further action is required.');
        try{

                return (new MailMessage)
                    ->subject('Recuperar contraseña')
                    ->greeting('Hola')
                    ->line('Estás recibiendo este correo porque hiciste una solicitud de recuperación de contraseña para tu cuenta.')
                    ->action('Recuperar contraseña', route('password.reset', $this->token))
                    ->line('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.')
                    ->salutation('Saludos, '. config('app.name'));

        }catch (InvalidEmailException $e){
            dd($e);
        }

    }



}