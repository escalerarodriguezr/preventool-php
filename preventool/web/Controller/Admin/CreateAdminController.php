<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Preventool\Infrastructure\Ui\Http\Request\DTO\Admin\CreateAdminRequest;
use Preventool\Infrastructure\Ui\Http\Service\HttpRequestService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateAdminController
{


    public function __construct(
        private readonly HttpRequestService $httpRequestService
    )
    {
    }

    public function __invoke(
        CreateAdminRequest $request
    ): Response
    {


        return new JsonResponse(
            null,
            Response::HTTP_CREATED
        );
    }


}