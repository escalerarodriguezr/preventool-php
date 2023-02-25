<?php
declare(strict_types=1);

namespace Preventool\Domain\Audit\Model;

use Preventool\Domain\Admin\Model\Admin;
use Preventool\Domain\Company\Model\Company;
use Preventool\Domain\Shared\Model\AggregateRoot;
use Preventool\Domain\Shared\Model\Value\MediumDescription;
use Preventool\Domain\Shared\Model\Value\Name;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\Workplace\Model\Workplace;

class AuditType extends AggregateRoot
{
    private string $id;
    private ?Company $company;
    private ?Workplace $workplace;
    private string $name;
    private ?string $description;
    private bool $active;
    private ?Admin $creatorAdmin;
    private ?Admin $updaterAdmin;

    public function __construct(
        Uuid $uuid,
        Name $name
    )
    {
        $this->id = $uuid->value;
        $this->name = $name->value;
        $this->active = true;
    }

    public function getId(): Uuid
    {
        return new Uuid($this->id);
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): void
    {
        $this->company = $company;
    }

    public function getWorkplace(): ?Workplace
    {
        return $this->workplace;
    }

    public function setWorkplace(?Workplace $workplace): void
    {
        $this->workplace = $workplace;
    }

    public function getName(): Name
    {
        return new Name($this->name);
    }

    public function setName(Name $name): void
    {
        $this->name = $name->value;
    }

    public function getDescription(): ?MediumDescription
    {
        return new MediumDescription($this->description);
    }

    public function setDescription(?MediumDescription $description): void
    {
        $this->description = $description->value;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
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


}