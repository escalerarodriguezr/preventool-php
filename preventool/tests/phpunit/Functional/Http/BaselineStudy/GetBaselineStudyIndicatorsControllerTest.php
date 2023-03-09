<?php
declare(strict_types=1);

namespace PHPUnit\Tests\Functional\Http\BaselineStudy;

use Container0MjksZY\get_Console_Command_About_LazyService;
use PHPUnit\Tests\Functional\Http\FunctionalHttpTestBase;
use Preventool\Infrastructure\Persistence\Doctrine\DataFixtures\AdminFixtures;
use Preventool\Infrastructure\Persistence\Doctrine\DataFixtures\UserFixtures;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetBaselineStudyIndicatorsControllerTest extends FunctionalHttpTestBase
{
    const END_POINT = 'api/v1/baseline-study-indicators';

    public function setUp(): void
    {
        parent::setUp();
    }
    private function prepareDatabase() :void
    {
        $this->databaseTool->loadFixtures([
            UserFixtures::class,
            AdminFixtures::class,
        ]);
    }

    public function testGetBaselineStudyIndicatorsSuccessResponse(): void
    {
        $this->prepareDatabase();
        $this->authenticatedRootClient();

        self::$authenticatedRootClient->request(
            Request::METHOD_GET,
            self::END_POINT
        );

        $response = self::$authenticatedRootClient->getResponse();

        self::assertSame(Response::HTTP_OK, $response->getStatusCode());

        $responseData = json_decode($response->getContent(), true);

        self::assertIsArray($responseData);
        self::assertArrayHasKey('compromiso', $responseData);
        self::assertArrayHasKey('politica-sst', $responseData);


    }


}