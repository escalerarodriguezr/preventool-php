<?php
declare(strict_types=1);

namespace Preventool\Domain\BaselineStudy\Repository;

use Preventool\Domain\BaselineStudy\Model\BaselineStudy;
use Preventool\Domain\BaselineStudy\Model\Value\BaselineIndicatorCategory;
use Preventool\Domain\Workplace\Model\Workplace;

interface BaselineStudyRepository
{
    public function save(BaselineStudy $model): void;

    /**
     * @param Workplace $workplace
     * @return BaselineStudy[]
     */
    public function findAllByWorkplace(Workplace $workplace): array;

    public function findAllByWorkplaceAndCategory(
        Workplace $workplace,
        BaselineIndicatorCategory $category
    ): array;

}