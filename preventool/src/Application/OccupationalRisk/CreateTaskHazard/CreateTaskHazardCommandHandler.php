<?php
declare(strict_types=1);

namespace Preventool\Application\OccupationalRisk\CreateTaskHazard;

use Preventool\Domain\Process\Repository\ProcessActivityTaskRepository;
use Preventool\Domain\Shared\Bus\Command\CommandHandler;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\WorkplaceHazard\Repository\WorkplaceHazardRepository;

class CreateTaskHazardCommandHandler implements CommandHandler
{


    public function __construct(
        private readonly ProcessActivityTaskRepository $taskRepository,
        private readonly WorkplaceHazardRepository $hazardRepository
    )
    {
    }

    public function __invoke(
        CreateTaskHazardCommand $command
    ): void
    {
        $taskId = new Uuid($command->taskId);
        $hazardId = new Uuid($command->hazardId);

        $task = $this->taskRepository->findById($taskId);
        $hazard = $this->hazardRepository->findById($hazardId);

        dd($task, $hazard);
    }


}