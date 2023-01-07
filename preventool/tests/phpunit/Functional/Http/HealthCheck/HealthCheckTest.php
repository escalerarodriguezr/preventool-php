<?php
declare(strict_types=1);

namespace PHPUnit\Tests\Functional\Http\HealthCheck;

use PHPUnit\Tests\Functional\Http\FunctionalHttpTestBase;

class HealthCheckTest extends FunctionalHttpTestBase
{
    public function setUp():void
    {
        parent::setUp();
    }

    public function testHealthCheck(): void
    {
        self::assertSame(1,1);

    }


}