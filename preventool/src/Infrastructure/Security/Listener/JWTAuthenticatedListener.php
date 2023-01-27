<?php

namespace Preventool\Infrastructure\Security\Listener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTAuthenticatedEvent;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Symfony\Component\HttpFoundation\RequestStack;

class JWTAuthenticatedListener
{
    const ACTION_USER_ID = 'actionUserId';

    public function __construct(
        private readonly RequestStack $requestStack,

    )
    {
    }

    public function onJWTAuthenticated(JWTAuthenticatedEvent $event)
    {

        $userId = new Uuid($event->getPayload()[JWTCreatedListener::USER_ID]);
        $this->addRequestParams($userId);

    }

    private function addRequestParams(Uuid $actionUserId): void
    {
        $request = $this->requestStack->getCurrentRequest();
        $request->attributes->set(self::ACTION_USER_ID, $actionUserId->value);

    }

}