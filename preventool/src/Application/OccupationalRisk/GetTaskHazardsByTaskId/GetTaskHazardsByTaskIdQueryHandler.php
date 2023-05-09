<?php
declare(strict_types=1);

namespace Preventool\Application\OccupationalRisk\GetTaskHazardsByTaskId;

use Preventool\Application\WorkplaceHazard\Response\WorkplaceHazardResponse;
use Preventool\Domain\OccupationalRisk\Model\TaskHazard;
use Preventool\Domain\OccupationalRisk\Repository\TaskHazardRepository;
use Preventool\Domain\Process\Repository\ProcessActivityTaskRepository;
use Preventool\Domain\Shared\Bus\Query\QueryHandler;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\WorkplaceHazard\Model\WorkplaceHazard;

class GetTaskHazardsByTaskIdQueryHandler implements QueryHandler
{


    public function __construct(
        private readonly ProcessActivityTaskRepository $taskRepository,
        private readonly TaskHazardRepository $taskHazardRepository
    )
    {
    }

    public function __invoke(
        GetTaskHazardsByTaskIdQuery $query
    ): array
    {
        $taskId = new Uuid($query->taskId);

        $task = $this->taskRepository->findById($taskId);


        $taskHazards = $this->taskHazardRepository->getAllByTaskId($taskId);

        $hazardsArray = [];
        /**
         * @var $taskHazard TaskHazard
         */
        foreach ($taskHazards as $taskHazard){

            $hazardsArray[] = $taskHazard->getHazard();

        }

//        return array_map(function (WorkplaceHazard $workplaceHazard) use ($task){
//            return WorkplaceHazardResponse::createFromModel(
//                $workplaceHazard,
//
//            )
//        },$hazardsArray);

        dd($hazardsArray);


    }


}