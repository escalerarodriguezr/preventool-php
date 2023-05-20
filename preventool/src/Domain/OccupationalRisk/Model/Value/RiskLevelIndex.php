<?php
declare(strict_types=1);

namespace Preventool\Domain\OccupationalRisk\Model\Value;

use Assert\Assertion;
use Assert\AssertionFailedException;

class RiskLevelIndex
{

    public function __construct(
        public readonly int $value
    )
    {
        try {
            Assertion::integer($value);
            Assertion::between($value, 4, 36);
        } catch(AssertionFailedException $e) {
            throw new \DomainException(sprintf('"Value %d must be integer between 4 and 36', $value));
        }

    }

}