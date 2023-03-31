<?php
declare(strict_types=1);

namespace Preventool\Domain\Process\Model;

use Preventool\Domain\Admin\Model\Admin;
use Preventool\Domain\Process\Model\Value\ProcessActivityDescription;
use Preventool\Domain\Shared\Model\AggregateRoot;
use Preventool\Domain\Shared\Model\Value\LongName;
use Preventool\Domain\Shared\Model\Value\Uuid;

class ProcessActivity extends AggregateRoot
{
    private string $id;
    private string $name;
    public ?string $description;
    private Process $process;
    private int $revisionNumber;
    private ?string $revisionOf;
    private ?string $revisedBy;
    private ?Admin $creatorAdmin;
    private ?Admin $updaterAdmin;
    private bool $active;

    public function __construct(
        Uuid $id,
        Process $process,
        LongName $name,
    )
    {
        parent::__construct();
        $this->id = $id->value;
        $this->process = $process;
        $this->name = $name->value;
        $this->revisionNumber = 0;
        $this->revisionOf = null;
        $this->revisedBy = null;
        $this->active = true;
        $this->creatorAdmin = null;
        $this->updaterAdmin  =null;
        $this->description = null;
    }


    public function getId(): Uuid
    {
        return new Uuid($this->id);
    }

    public function getName(): LongName
    {
        return new LongName($this->name);
    }

    public function setName(LongName $name): void
    {
        $this->name = $name->value;
    }

    public function getProcess(): Process
    {
        return $this->process;
    }

    public function getRevisionNumber(): int
    {
        return $this->revisionNumber;
    }

    public function setRevisionNumber(int $revisionNumber): void
    {
        $this->revisionNumber = $revisionNumber;
    }

    public function getRevisionOf(): ?Uuid
    {
        return $this->revisionOf ? new Uuid($this->revisionOf) : null;
    }

    public function setRevisionOf(?Uuid $revisionOf): void
    {
        $this->revisionOf = $revisionOf->value;
    }

    public function getRevisedBy(): ?Uuid
    {
        return $this->revisedBy ? new Uuid($this->revisedBy) : null;
    }

    public function setRevisedBy(?Uuid $revisedBy): void
    {
        $this->revisedBy = $revisedBy->value;
    }

    public function getCreatorAdmin(): ?Admin
    {
        return $this->creatorAdmin;
    }

    public function setCreatorAdmin(?Admin $creatorAdmin): void
    {
        $this->creatorAdmin = $creatorAdmin;
    }

    public function getUpdaterAdmin(): ?Admin
    {
        return $this->updaterAdmin;
    }

    public function setUpdaterAdmin(?Admin $updaterAdmin): void
    {
        $this->updaterAdmin = $updaterAdmin;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }


    public function setDescription(?ProcessActivityDescription $description): void
    {
        $this->description = $description->value();
    }


    public function getDescription(): ?ProcessActivityDescription
    {
        return $this->description ? new ProcessActivityDescription($this->description,false) : null;
    }


}