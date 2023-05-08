<?php

namespace Preventool\Infrastructure\Persistence\Doctrine\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Preventool\Domain\Admin\Model\Admin;
use Preventool\Domain\OccupationalRisk\Model\TaskHazard;
use Preventool\Domain\Process\Model\ProcessActivityTask;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\WorkplaceHazard\Model\WorkplaceHazard;


class TaskHazardFixtures extends Fixture implements FixtureInterface
{
    const TASK_1_NOISES_ID = '16a3b6cb-2ee7-4e15-a4d0-1a3cabd1c9e4';
    const ACTIVE = true;

    const TASK_1_NOISES_ID_REFERENCE= 'task-1-noises-reference';

    const TASK_2_TEMPERATURES_ID = 'bbda2af8-0a73-413c-8404-30e5ed433c4f';


    const TASK_2_TEMPERATURES_ID_REFERENCE= 'task-2-temperatures-reference';



    public function __construct()
    {

    }

    public function load(ObjectManager $manager): void
    {

        /**
         * @var WorkplaceHazard $hazard
         */
        $hazard = $this->getReference(WorkplaceHazardFixtures::NOISES_REFERENCE);

        /**
         * @var Admin $adminRootRef ;
         */
        $adminRootRef = $this->getReference(AdminFixtures::ROOT_ADMIN_REFERENCE);

        /**
         * @var ProcessActivityTask $task
         */
        $task = $this->getReference(ProcessActivityTaskFixtures::CONFECCION_PROCESS_ACTIVITY_1_TASK_1_REFERENCE);

        $taskHazardTask1Noises = $this->createTaskHazard(
            self::TASK_1_NOISES_ID,
            $task,
            $hazard,
            $adminRootRef
        );

        $manager->persist($taskHazardTask1Noises);
        $manager->flush();
        $this->addReference(self::TASK_1_NOISES_ID_REFERENCE,$taskHazardTask1Noises);




        /**
         * @var WorkplaceHazard $hazardTemp
         */
        $hazardTemp = $this->getReference(WorkplaceHazardFixtures::TEMPERATURES_REFERENCE);



        /**
         * @var ProcessActivityTask $task_2
         */
        $task_2 = $this->getReference(ProcessActivityTaskFixtures::CONFECCION_PROCESS_ACTIVITY_1_TASK_2_REFERENCE);

        $taskHazardTask2Temperatures = $this->createTaskHazard(
            self::TASK_2_TEMPERATURES_ID,
            $task_2,
            $hazardTemp,
            $adminRootRef
        );

        $manager->persist($taskHazardTask2Temperatures);
        $manager->flush();
        $this->addReference(self::TASK_2_TEMPERATURES_ID_REFERENCE,$taskHazardTask2Temperatures);

    }

    private function createTaskHazard(
        string $id,
        ProcessActivityTask $task,
        WorkplaceHazard $hazard,
        Admin $creatorAdmin
    ): TaskHazard
    {
        return new TaskHazard(
            new Uuid($id),
            $task,
            $hazard,
            $creatorAdmin
        );
    }

}