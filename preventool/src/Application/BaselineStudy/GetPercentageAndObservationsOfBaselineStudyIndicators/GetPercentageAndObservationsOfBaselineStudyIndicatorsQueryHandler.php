<?php

namespace Preventool\Application\BaselineStudy\GetPercentageAndObservationsOfBaselineStudyIndicators;

use Preventool\Domain\BaselineStudy\Repository\BaselineStudyRepository;
use Preventool\Domain\Shared\Bus\Query\QueryHandler;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\Workplace\Repository\WorkplaceRepository;

class GetPercentageAndObservationsOfBaselineStudyIndicatorsQueryHandler implements QueryHandler
{


    public function __construct(
        private readonly BaselineStudyRepository $baselineStudyRepository,
        private readonly WorkplaceRepository $workplaceRepository
    )
    {
    }

    public function __invoke(
        GetPercentageAndObservationsOfBaselineStudyIndicatorsQuery $query
    ): array
    {
        $workplaceId = new Uuid($query->workplaceId);
        $workplace = $this->workplaceRepository->findById($workplaceId);

        $baselineStudyIndicators = $this->baselineStudyRepository->findAllByWorkplace(
            $workplace
        );








        return [];
    }


}