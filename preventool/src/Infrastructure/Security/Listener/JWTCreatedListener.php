<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Security\Listener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Preventool\Domain\User\Model\User;

class JWTCreatedListener
{
    const USER_ID = 'userId';
    const USER_ROLE = 'userRole';
    const USER_EMAIL = 'userEmail';


    public function onJWTCreated(JWTCreatedEvent $event): void
    {
        /**
         * @var User $user
         */
        $user = $event->getUser();

//        if(!$user->isActive() || !$user->isEmailConfirmed()){
//            throw UserAccountNotActiveException::fromLoginService($user->getEmail()->getValue());
//        }


        $payload = $event->getData();
        unset($payload['roles']);
        unset($payload['username']);
        $payload[self::USER_ID] = $user->getId();
        $payload[self::USER_EMAIL] = $user->getEmail();
        $payload[self::USER_ROLE] = $user->getRole();

        $event->setData($payload);
    }

}