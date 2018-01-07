<?php

namespace App\EventSubscriber;

use App\Entity\User;
use App\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Envoi un mail de bienvenue à chaque creation d'un utilisateur
 *
 */
class RegistrationNotifySubscriber implements EventSubscriberInterface
{
    private $mailer;
    private $sender;

    public function __construct(\Swift_Mailer $mailer, $sender)
    {
        $this->mailer = $mailer;
        $this->sender = $sender;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::USER_REGISTERED => 'onUserRegistrated',
        ];
    }

    public function onUserRegistrated(GenericEvent $event): void
    {
        /** @var User $user */
        $user = $event->getSubject();

        $subject = "Bienvenue";
        $body = "Bienvenue mon ami.e sur ce tutorial";

        $message = (new \Swift_Message())
            ->setSubject($subject)
            ->setTo($user->getEmail())
            ->setFrom($this->sender)
            ->setBody($body, 'text/html')
        ;

        $this->mailer->send($message);
    }
}
