<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class AdminResetPasswordNotification extends ResetPassword
{
    use Queueable;

    public function toMail($notifiable): MailMessage
    {
        $url = url(route('admin.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Reset Your Admin Password')
            ->greeting('Hello '.$notifiable->name.',')
            ->line('You requested a password reset for the Brevity Anderson admin panel.')
            ->action('Reset Password', $url)
            ->line('This reset link will expire in 60 minutes.')
            ->line('If you did not request a password reset, no further action is required.');
    }
}
