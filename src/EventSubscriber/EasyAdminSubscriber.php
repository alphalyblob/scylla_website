<?php
# src/EventSubscriber/EasyAdminSubscriber.php
namespace App\EventSubscriber;

use App\Entity\Adherent;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;



class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;

    }

    public static function getSubscribedEvents()
    {
        return [
            AfterEntityPersistedEvent::class => ['sendUserCreatedMail'],
        ];
    }

    public function sendUserCreatedMail(AfterEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        // Si l'entité créé n'est pas Adherent alors pas d'evenement donc return

        if (!($entity instanceof Adherent)) {
            return;
        }
        // dd($entity);
        // Sinon (si entité créée est un Adherent) l'évenement sendUserCreatedMail se déclenche
        $email = (new TemplatedEmail())
            ->from(new Address('no-reply@scylla.com', 'Bienvenue chez Scylla'))
            ->to($entity->getEmail())
            ->subject('Your password reset request')
            ->htmlTemplate('created_mail/email_bienvenue.html.twig')
            ->context([
                'adherent' => $entity,
            ])
        ;

        $this->mailer->send($email);
    }
}