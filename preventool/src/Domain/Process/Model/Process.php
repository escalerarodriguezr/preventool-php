<?php
declare(strict_types=1);

namespace Preventool\Domain\Process\Model;

use Preventool\Domain\Admin\Model\Admin;
use Preventool\Domain\Shared\Model\AggregateRoot;
use Preventool\Domain\Shared\Model\Value\LongName;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\Workplace\Model\Workplace;

class Process extends AggregateRoot
{
    private string $id;
    private string $name;
    private Workplace $workplace;
    private int $revisionNumber;
    private ?string $revisionOf;
    private ?string $revisedBy;
    private ?Admin $creatorAdmin;
    private ?Admin $updaterAdmin;
    private bool $active;

    public function __construct(
        Uuid $id,
        Workplace $workplace,
        LongName $name,
        Admin $creatorAdmin = null
    )
    {
        parent::__construct();
        $this->id = $id->value;
        $this->workplace = $workplace;
        $this->name = $name->value;
        $this->revisionNumber = 0;
        $this->revisionOf = null;
        $this->revisedBy = null;
        $this->active = true;
        $this->creatorAdmin = $creatorAdmin;
        $this->updaterAdmin  =null;
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

    public function getWorkplace(): Workplace
    {
        return $this->workplace;
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
        return new Uuid($this->revisionOf);
    }

    public function setRevisionOf(?Uuid $revisionOf): void
    {
        $this->revisionOf = $revisionOf->value;
    }

    public function getRevisedBy(): ?Uuid
    {
        return new Uuid($this->revisedBy);
    }

    public function setRevisedBy(?Uuid $revisedBy): void
    {
        $this->revisedBy = $revisedBy->value;
    }

    public function getCreatorAdmin(): ?Admin
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

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }


}