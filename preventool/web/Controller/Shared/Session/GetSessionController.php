<?php
declare(strict_types=1);

namespace App\Controller\Shared\Session;

use Preventool\Infrastructure\Security\Listener\JWTAuthenticatedListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class GetSessionController
{


    public function __construct(
        private readonly RequestStack $requestStack
    )
    {
    }

    public function __invoke(Request $request): Response
    {

        //Crear un servicio http para obtener el admin user
        //antes crear las fixtures del admin
        $id = $this->requestStack->getCurrentRequest()->get(JWTAuthenticatedListener::ACTION_USER_ID);


        return new JsonResponse(
            $id,
            Response::HTTP_OK
        );

    }


}