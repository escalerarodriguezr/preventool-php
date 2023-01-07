<?php
declare(strict_types=1);

namespace PHPUnit\Tests\Functional\Http;

use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionalHttpTestBase extends WebTestCase
{
//    protected AbstractDatabaseTool $databaseTool;
    private static ?KernelBrowser $client = null;
    protected static ?KernelBrowser $baseClient = null;
    protected static ?KernelBrowser $authenticatedRootClient = null;
    protected static ?KernelBrowser $authenticatedAdminFrodoClient = null;

    public function setUp():void
    {
        parent::setUp();
        $this->getClient();
        $this->databaseTool = static::getContainer()->get(DatabaseToolCollection::class)->get();
    }


    protected function getClient():void
    {
        self::$client = null;
        if (null === self::$client) {
            self::$client = static::createClient();
        }


    }

}