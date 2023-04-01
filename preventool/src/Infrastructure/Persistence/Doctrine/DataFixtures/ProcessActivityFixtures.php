<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Preventool\Domain\Admin\Model\Admin;
use Preventool\Domain\Process\Model\Process;
use Preventool\Domain\Process\Model\ProcessActivity;
use Preventool\Domain\Process\Model\Value\ProcessActivityDescription;
use Preventool\Domain\Shared\Model\Value\LongName;
use Preventool\Domain\Shared\Model\Value\Uuid;

class ProcessActivityFixtures extends Fixture implements FixtureInterface
{

    const CONFECCION_PROCESS_ACTIVITY_1_UUID = 'ea7d850b-801d-4c9b-a77f-d1de1fa16cbe';
    const CONFECCION_PROCESS_ACTIVITY_1_NAME = 'Confección_Actividad_1';
    const CONFECCION_PROCESS_ACTIVITY_1_DESCRIPTION = 'Descripción actividad 1';
    const CONFECCION_PROCESS_ACTIVITY_1_ORDER = 1;
    const CONFECCION_PROCESS_ACTIVITY_1_REFERENCE = 'confeccion-activiti-1';


    public function __construct()
    {

    }

    public function load(ObjectManager $manager): void
    {
        /**
         * @var Process $confeccionProcessOfRivendel ;
         */
        $confeccionProcessOfRivendel = $this->getReference(ProcessFixtures::CONFECCION_PROCESS_RIVENDEL_WORKPLACE_1_REFERENCE);

        /**
         * @var Admin $adminRootRef ;
         */
        $adminRootRef = $this->getReference(
            AdminFixtures::ROOT_ADMIN_REFERENCE
        );

        $confeccionActivity_1 = $this->createProcessActivity(
            self::CONFECCION_PROCESS_ACTIVITY_1_UUID,
            $confeccionProcessOfRivendel,
            self::CONFECCION_PROCESS_ACTIVITY_1_NAME,
            self::CONFECCION_PROCESS_ACTIVITY_1_ORDER,
            $adminRootRef,
            self::CONFECCION_PROCESS_ACTIVITY_1_DESCRIPTION
        );


        $manager->persist(
            $confeccionActivity_1
        );
        $manager->flush();
        $this->addReference(
            self::CONFECCION_PROCESS_ACTIVITY_1_REFERENCE,
            $confeccionActivity_1
        );

    }

    private function createProcessActivity(
        string $id,
        Process $process,
        string $name,
        int $activityOrder,
        ?Admin $creatorAdmin = null,
        ?string $description = null
    ): ProcessActivity
    {
        $processActivity = new ProcessActivity(
            new Uuid($id),
            $process,
            new LongName($name),
            $activityOrder
        );


        if($description){
            $processActivity->setDescription(
                new ProcessActivityDescription($description)
            );
        }

        $processActivity->setCreatorAdmin($creatorAdmin);


        return $processActivity;

    }

}