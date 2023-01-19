<?php
declare(strict_types=1);

namespace Preventool\Application\Admin\SearchAdmin;

use Preventool\Domain\Shared\Bus\Query\QueryHandler;

class SearchAdminHandler implements QueryHandler
{
    public function __invoke(
        SearchAdminQuery $query
    ): SearchAdminResponse
    {
        
        return new SearchAdminResponse(
            10,
            2,
            2,
            new \ArrayIterator([])
        );
    }


}