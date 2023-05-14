<?php
declare(strict_types=1);

namespace Preventool\Domain\OccupationalRisk\Model;

use Preventool\Domain\Admin\Model\Admin;
use Preventool\Domain\Process\Model\ProcessActivityTask;
use Preventool\Domain\Shared\Model\AggregateRoot;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\WorkplaceHazard\Model\WorkplaceHazard;

class TaskHazard extends AggregateRoot
{
    private string $id;
    private ProcessActivityTask $task;
    private WorkplaceHazard $hazard;
    private bool $active;
    private Admin $creatorAdmin;
    private ?Admin $updaterAdmin;
    private ?TaskRisk $taskRisk;

    public function __construct(
        Uuid $id,
        ProcessActivityTask $task,
        WorkplaceHazard $hazard,
        Admin $creatorAdmin
    )
    {
        parent::__construct();
        $this->id = $id->value;
        $this->task = $task;
        $this->hazard = $hazard;
        $this->creatorAdmin = $creatorAdmin;
        $this->active = true;
        $this->taskRisk = null;
    }


    public function getId(): Uuid
    {
        return new Uuid($this->id);
    }

    public function getTask(): ProcessActivityTask
    {
        return $this->task;
    }


    public function getHazard(): WorkplaceHazard
    {
        return $this->hazard;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getCreatorAdmin(): Admin
    {
        return $this->creatorAdmin;
    }

    public function getUpdaterAdmin(): ?Admin
    {
        return $this->updaterAdmin;
    }

    public function setUpdaterAdmin(?Admin $updaterAdmin): void
    {
        $this->updaterAdmin = $updaterAdmin;
    }

    public function getTaskRisk(): ?TaskRisk
    {
        return $this->taskRisk;
    }

}