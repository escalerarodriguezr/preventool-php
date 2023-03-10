<?php
declare(strict_types=1);

namespace App\Controller\BaselineStudy;

use Preventool\Application\BaselineStudy\GetPercentageAndObservationsOfBaselineStudyIndicators\GetPercentageAndObservationsOfBaselineStudyIndicatorsQuery;
use Preventool\Application\BaselineStudy\GetPercentageAndObservationsOfBaselineStudyIndicators\GetPercentageAndObservationsOfBaselineStudyIndicatorsQueryHandler;
use Preventool\Domain\Shared\Bus\Query\QueryBus;
use Preventool\Domain\Shared\Model\IdentityValidator;
use Preventool\Infrastructure\Ui\Http\Service\HttpRequestService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetPercentageAndObservationsOfBaselineStudyIndicatorsController
{


    public function __construct(
        private readonly HttpRequestService $httpRequestService,
        private readonly IdentityValidator $identityValidator,
        private readonly QueryBus $queryBus
    )
    {
    }

    public function __invoke(
        string $id
    ): Response
    {
        $this->identityValidator->validate($id);

        $response = $this->queryBus->handle(
            new GetPercentageAndObservationsOfBaselineStudyIndicatorsQuery(
                $this->httpRequestService->actionAdmin->getId()->value,
                $id
            )
        );

        return new JsonResponse(
            $response,
            Response::HTTP_OK
        );
    }


}