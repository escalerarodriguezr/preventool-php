<?php
declare(strict_types=1);

namespace Preventool\Application\Admin\SendConfirmationEmailOnAdminCreated;

use Preventool\Domain\Shared\Bus\Message\MessageHandler;
use Psr\Log\LoggerInterface;

class SendConfirmationEmailMessageHandler implements MessageHandler
{


    public function __construct(
        private readonly LoggerInterface $logger
    )
    {
    }

    public function __invoke(
        SendConfirmationEmailMessage $message
    ): void
    {
        $this->logger->info($message->adminId);
        // TODO: Implement __invoke() method.
    }


}