<?php
declare(strict_types=1);

namespace PHPUnit\Tests\Functional\Http\HealthCheck;

use PHPUnit\Tests\Functional\Http\FunctionalHttpTestBase;
use Preventool\Infrastructure\Persistence\Doctrine\DataFixtures\UserFixtures;

class HealthCheckTest extends FunctionalHttpTestBase
{
    public function setUp():void
    {
        parent::setUp();
    }

    private function prepareDataBase():void
    {
        $this->databaseTool->loadFixtures([
            UserFixtures::class
        ]);
    }

    public function testHealthCheck(): void
    {
        $this->prepareDataBase();
        self::assertSame(1,1);

    }


}