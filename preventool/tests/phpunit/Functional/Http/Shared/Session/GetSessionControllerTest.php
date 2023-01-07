<?php
declare(strict_types=1);

namespace PHPUnit\Tests\Functional\Http\Shared\Session;

use PHPUnit\Tests\Functional\Http\FunctionalHttpTestBase;
use Preventool\Infrastructure\Persistence\Doctrine\DataFixtures\UserFixtures;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetSessionControllerTest extends FunctionalHttpTestBase
{
    const END_POINT = 'api/v1/session';
    public function setUp():void
    {
        parent::setUp();
    }

    private function prepareDatabase(): void
    {
        $this->databaseTool->loadFixtures([
            UserFixtures::class
        ]);
    }

    public function testGetSessionWithNotAuthenticateClientAccessDeniedExceptionResponse(): void
    {
        $this->baseClient();
        $this->prepareDatabase();
        self::$baseClient->request(
            Request::METHOD_GET,
            self::END_POINT
        );

        $response = self::$baseClient->getResponse();
        self::assertEquals(Response::HTTP_FORBIDDEN, $response->getStatusCode());

    }

    public function testGetSessionSuccessResponse(): void
    {
        $this->authenticatedRootClient();
        $this->prepareDatabase();
        self::$authenticatedRootClient->request(
            Request::METHOD_GET,
            self::END_POINT
        );

        $response = self::$authenticatedRootClient->getResponse();


        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $responseData = \json_decode($response->getContent(), true);

    }




}