<?php
declare(strict_types=1);

namespace Preventool\Application\WorkplaceHazard\SearchWorkplaceHazard;

use Container2bR9Czo\getDoctrine_Fixtures_Purger_OrmPurgerFactoryService;
use Preventool\Domain\Shared\Bus\Query\Query;

class SearchWorkplaceHazardQuery implements Query
{
    public function __construct(
        public readonly string $actionAdminId,
        public readonly ?int $pageSize,
        public readonly ?int $currentPage,
        public readonly ?string $orderBy,
        public readonly ?string $orderDirection,
        public readonly ?string $filterById,
        public readonly ?string $filterByWorkplaceId,
        public readonly ?string $filterByNotHasTaskHazardId
    )
    {
    }

}