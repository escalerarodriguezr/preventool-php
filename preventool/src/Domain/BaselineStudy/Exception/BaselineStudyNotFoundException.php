<?php
declare(strict_types=1);

namespace Preventool\Domain\BaselineStudy\Exception;

use Preventool\Domain\Workplace\Model\Workplace;

class BaselineStudyNotFoundException extends \DomainException
{
    public static function fotWorkplace(Workplace $workplace): self
    {
        return new self(
            sprintf(
                'BaselineStudy of wotkplace %s not found',
                $workplace->getId()->value
            )
        );
    }

}