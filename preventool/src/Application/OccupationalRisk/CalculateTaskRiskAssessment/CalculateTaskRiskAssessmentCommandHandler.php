<?php
declare(strict_types=1);

namespace Preventool\Application\OccupationalRisk\CalculateTaskRiskAssessment;

use Preventool\Domain\Shared\Bus\Command\CommandHandler;

class CalculateTaskRiskAssessmentCommandHandler implements CommandHandler
{


    public function __construct()
    {
    }

    public function __invoke(CalculateTaskRiskAssessmentCommand $command): void
    {
        dd($command);
    }


}