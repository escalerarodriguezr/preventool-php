<?php
declare(strict_types=1);

namespace Preventool\Application\Admin\SendConfirmationEmailOnAdminCreated;

use Preventool\Domain\Shared\Bus\Message\MessageHandler;
use Preventool\Domain\Shared\Service\Mailer\Mailer;
use Preventool\Infrastructure\Mailer\TwigTemplate;
use Psr\Log\LoggerInterface;

class SendConfirmationEmailMessageHandler implements MessageHandler
{


    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly Mailer $mailer
    )
    {
    }

    public function __invoke(
        SendConfirmationEmailMessage $message
    ): void
    {

        $payload = [
            'email' => "un mensaje bonito..."
        ];

        $this->mailer->send(
            "email@email.com",
            TwigTemplate::ADMIN_REGISTER,
            $payload
        );
//        $this->logger->info($message->adminId);
//        // TODO: Implement __invoke() method.
    }


}