<?php
declare(strict_types=1);

namespace Preventool\Application\AuditType\SearchAuditType;

use Container5MOI6Fx\getDoctrine_Fixtures_Purger_OrmPurgerFactoryService;
use Preventool\Application\AuditType\Response\AuditTypeResponse;
use Preventool\Domain\Audit\Model\AuditType;
use function Symfony\Component\String\s;

class SearchAuditTypeResponse
{

    const TOTAL = 'total';
    const PAGES = 'pages';
    const CURRENT_PAGE = 'currentPage';
    const ITEMS = 'items';

    /**
     * @var AuditTypeResponse[]
     */
    private array $collection;

    public function __construct(
        private int $total,
        private int $pages,
        private int $currentPage,
        private \ArrayIterator $items
    )
    {
        $this->transformItems($this->items);
    }
    private function transformItems(\ArrayIterator $iterator): void
    {
        $this->collection = array_map(function (AuditType $model):AuditTypeResponse{
            return AuditTypeResponse::createFromModel($model);
        },$this->items->getArrayCopy());

    }

    public function toArray(): array
    {
        return [
            self::TOTAL => $this->total,
            self::PAGES => $this->pages,
            self::CURRENT_PAGE => $this->currentPage,
            self::ITEMS => array_map(function (AuditTypeResponse $item):array{
                return $item->toArray();
            },$this->collection)

        ];
    }

}