<?php
declare(strict_types=1);

namespace App\Controller\OccupationalRisk;

use Preventool\Domain\Shared\Bus\Command\CommandBus;
use Preventool\Domain\Shared\Model\IdentityValidator;
use Preventool\Infrastructure\Ui\Http\Request\DTO\OccupationalRisk\UpdateTaskRiskRequest;
use Preventool\Infrastructure\Ui\Http\Service\HttpRequestService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateTaskRiskController
{


    public function __construct(
        private readonly HttpRequestService $httpRequestService,
        private readonly IdentityValidator $identityValidator,
        private readonly CommandBus $commandBus
    )
    {
    }

    public function __invoke(
        string $id,
        UpdateTaskRiskRequest $request
    ): Response
    {
        $this->identityValidator->validate($id);

        return new JsonResponse(
            null,
            Response::HTTP_OK
        );
    }


}