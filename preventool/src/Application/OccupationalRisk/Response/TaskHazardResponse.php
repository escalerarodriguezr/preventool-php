<?php
declare(strict_types=1);

namespace Preventool\Application\OccupationalRisk\Response;

use DateTimeInterface;
use Preventool\Domain\OccupationalRisk\Model\TaskHazard;

class TaskHazardResponse
{

    const ID = 'id';
    const HAZARD_NAME = 'hazardName';
    const HAZARD_DESCRIPTION = 'hazardDescription';
    const HAZARD_CATEGORY_NAME = 'hazardCategoryName';
    const ACTIVE = 'active';
    const CREATOR_ID = 'creatorId';
    const UPDATER_ID = 'updaterId';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    public function __construct(
        public readonly string $id,
        public readonly string $hazardName,
        public readonly ?string $hazardDescription,
        public readonly string $hazardCategoryName,
        public readonly bool $active,
        public readonly ?string $creatorId,
        public readonly ?string $updaterId,
        public readonly \DateTimeImmutable $createdAt,
        public readonly \DateTimeImmutable $updatedAt

    )
    {
    }

    public static function createFromModel(TaskHazard $model): self
    {
        return new self(
            $model->getId()->value,
            $model->getHazardName()->value,
            $model->getHazardDescription()?->value,
            $model->getHazardCategoryName()->value,
            $model->isActive(),
            $model->getCreatorAdmin()?->getId()->value,
            $model->getUpdaterAdmin()?->getId()->value,
            $model->getCreatedAt(),
            $model->getUpdatedAt()
        );
    }

    public function toArray(): array
    {
        return [
            self::ID => $this->id,
            self::HAZARD_NAME => $this->hazardName,
            self::HAZARD_DESCRIPTION => $this->hazardDescription,
            self::HAZARD_CATEGORY_NAME => $this->hazardCategoryName,
            self::ACTIVE => $this->active,
            self::CREATOR_ID => $this->creatorId,
            self::UPDATER_ID => $this->updaterId,
            self::CREATED_AT => $this->createdAt->format(DateTimeInterface::RFC3339),
            self::UPDATED_AT => $this->updatedAt->format(DateTimeInterface::RFC3339),
        ];
    }


}