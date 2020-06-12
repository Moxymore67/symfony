<?php

namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailSender extends AbstractController
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(string $html) : void
    {
        $email = (new Email())
            ->from($this->getParameter('mailer_from'))
            ->to('moxymore67@yahoo.fr')
            ->subject('Une nouvelle série vient d\'être publiée !')
            ->html($html);

        $this->mailer->send($email);
    }
}
