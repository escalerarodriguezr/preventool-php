<?php
declare(strict_types=1);

namespace Preventool\Application\Workplace\GetWorkplaceDashboard;

use Preventool\Application\Workplace\GetWorkplaceDashboard\Response\WorkplaceDashboardResponse;
use Preventool\Domain\BaselineStudy\Repository\BaselineStudyComplianceRepository;
use Preventool\Domain\Shared\Bus\Query\QueryHandler;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\Workplace\Repository\WorkplaceRepository;

class GetWorkplaceDashboardQueryHandler implements QueryHandler
{


    public function __construct(
        private readonly WorkplaceRepository $workplaceRepository,
        private readonly BaselineStudyComplianceRepository $baselineStudyComplianceRepository

    )
    {
    }

    public function __invoke(
        GetWorkplaceDashboardQuery $query
    ): WorkplaceDashboardResponse
    {
        $workplaceId = new Uuid($query->workplaceId);

        $workplace = $this->workplaceRepository->findById($workplaceId);
        $baselineStudyCompliance = $this->baselineStudyComplianceRepository->findByWorkplace($workplace);

        return WorkplaceDashboardResponse::createFromModels(
            $baselineStudyCompliance
        );

    }


}