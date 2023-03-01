<?php
declare(strict_types=1);

namespace Preventool\Application\AuditType\SearchAuditType;

use Preventool\Domain\Audit\Repository\AuditTypeRepository;
use Preventool\Domain\Shared\Bus\Query\QueryHandler;

class SearchAuditTypeQueryHandler implements QueryHandler
{


    public function __construct(
        private readonly AuditTypeRepository $auditTypeRepository
    )
    {
    }

    public function __invoke(
        SearchAuditTypeQuery $query
    ): SearchAuditTypeResponse
    {

        return new SearchAuditTypeResponse(
            1,
            1,
            1,
            new \ArrayIterator([])
        );
    }


}