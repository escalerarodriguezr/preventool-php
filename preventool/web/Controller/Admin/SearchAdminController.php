<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Preventool\Infrastructure\Ui\Http\Request\DTO\Admin\SearchAdminRequest;
use Preventool\Infrastructure\Ui\Http\Request\DTO\Shared\QueryConditionRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SearchAdminController
{


    public function __construct()
    {
    }

    public function __invoke(
        SearchAdminRequest $request,
        QueryConditionRequest $queryCondition

    ): Response
    {
        return new JsonResponse(
            null,
            Response::HTTP_OK
        );
    }


}