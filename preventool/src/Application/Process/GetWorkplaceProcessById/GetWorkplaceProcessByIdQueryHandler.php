<?php
declare(strict_types=1);

namespace Preventool\Application\Process\GetWorkplaceProcessById;

use Preventool\Domain\Shared\Bus\Query\QueryHandler;

class GetWorkplaceProcessByIdQueryHandler implements QueryHandler
{


    public function __construct()
    {
    }

    public function __invoke(
        GetWorkplaceProcessByIdQuery $query
    ): mixed
    {
        return "hola";
    }


}