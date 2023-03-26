<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Ui\Http\Request\DTO\Process;

use Preventool\Infrastructure\Ui\Http\Request\RequestDTO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CreateProcessRequest implements RequestDTO
{
    const NAME = 'name';

    #[NotBlank(
        message: "Missing request parameter 'name"
    )]
    #[Length(
        min: 2,
        max: 100,
        minMessage: 'Name must be at least {{ limit }} characters long',
        maxMessage: 'Name cannot be longer than {{ limit }} characters',
    )]
    private mixed $name;

    public function __construct(Request $request)
    {
        $payload = $request->toArray();
        $this->name = $payload[self::NAME] ?? null;
    }


    public function getName(): string
    {
        return $this->name;
    }

}