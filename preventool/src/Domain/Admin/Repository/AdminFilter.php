<?php
declare(strict_types=1);

namespace Preventool\Domain\Admin\Repository;

class AdminFilter
{


    public function __construct(
        private ?string $filterById = null,
        private ?string $filterByEmail = null
    )
    {
    }

    public function getFilterById(): ?string
    {
        return $this->filterById;
    }

    public function setFilterById(?string $filterById): void
    {
        $this->filterById = $filterById;
    }

    public function getFilterByEmail(): ?string
    {
        return $this->filterByEmail;
    }

    public function setFilterByEmail(?string $filterByEmail): void
    {
        $this->filterByEmail = $filterByEmail;
    }


}