<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Ui\Http\Request\DTO\Admin;

use Preventool\Infrastructure\Ui\Http\Request\RequestDTO;
use Symfony\Component\HttpFoundation\Request;

class SearchAdminRequest implements RequestDTO
{
    const FILTER_BY_ID = 'filterById';
    const FILTER_BY_EMAIL = 'filterByEmail';


    private ?string $filterById;
    private ?string $filterByEmail;


    public function __construct(
        Request $request
    )
    {
        $this->filterById = $request->get(self::FILTER_BY_ID) ?? null;
        $this->filterByEmail = $request->get(self::FILTER_BY_EMAIL) ?? null;
    }


    public function filterById(): ?string
    {
        return $this->filterById;
    }

    public function filterByEmail(): ?string
    {
        return $this->filterByEmail;
    }




}