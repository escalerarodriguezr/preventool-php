<?php

namespace Preventool\Application\Workplace\GetWorkplaceDashboard\Response;

use Preventool\Domain\BaselineStudy\Model\BaselineStudyCompliance;

class WorkplaceDashboardResponse
{
    const BASELINE_STUDY_TOTAL_COMPLIANCE = 'baselineStudyTotalCompliance';

    public function __construct(
        public readonly int $baselineStudyTotalCompliance
    )
    {
    }

    public static function createFromModels(
        BaselineStudyCompliance $baselineStudyCompliance
    ): self
    {
        return new self(
            $baselineStudyCompliance->getTotalCompliance()->value
        );
    }

    public function toArray(): array
    {
        return [
            self::BASELINE_STUDY_TOTAL_COMPLIANCE => $this->baselineStudyTotalCompliance
        ];
    }


}