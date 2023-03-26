<?php
declare(strict_types=1);

namespace PHPUnit\Tests\Functional\Http\Process;

use PHPUnit\Tests\Functional\Http\FunctionalHttpTestBase;
use Preventool\Infrastructure\Persistence\Doctrine\DataFixtures\AdminFixtures;
use Preventool\Infrastructure\Persistence\Doctrine\DataFixtures\CompanyFixtures;
use Preventool\Infrastructure\Persistence\Doctrine\DataFixtures\UserFixtures;
use Preventool\Infrastructure\Persistence\Doctrine\DataFixtures\WorkplaceFixtures;
use Preventool\Infrastructure\Ui\Http\Listener\Shared\JsonTransformerExceptionListener;
use Preventool\Infrastructure\Ui\Http\Request\DTO\Process\CreateProcessRequest;
use Preventool\Infrastructure\Ui\Http\Service\HttpRequestService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProcessControllerTest extends FunctionalHttpTestBase
{
    const END_POINT = 'api/v1/workplace/%s/process';

    public function setUp(): void
    {
        parent::setUp();
    }

    private function prepareDatabase(): void
    {
        $this->databaseTool->loadFixtures([
            UserFixtures::class,
            AdminFixtures::class,
            CompanyFixtures::class,
            WorkplaceFixtures::class
        ]);
    }

    public function testCreateProcessSuccessResponse(): void
    {
        $this->prepareDatabase();;
        $this->authenticatedRootClient();

        $payload = [
            'name' => 'Cortar planchas'
        ];
        self::$authenticatedRootClient->request(
            Request::METHOD_POST,
            sprintf(self::END_POINT,WorkplaceFixtures::RIVENDEL_WORKPLACE_1_UUID),
            [],
            [],
            [],
            json_encode($payload)
        );

        $response = self::$authenticatedRootClient->getResponse();

        self::assertSame(Response::HTTP_CREATED,$response->getStatusCode());
        $responseData = json_decode($response->getContent(),true);
        self::assertArrayHasKey(HttpRequestService::ID,$responseData);
        self::assertIsValidUuid($responseData[HttpRequestService::ID]);

    }

    public function testCreateProcessUnprocessableEntityHttpExceptio(): void
    {
        $this->prepareDatabase();
        $this->authenticatedRootClient();

        $payload = [
            'name' => ''
        ];
        self::$authenticatedRootClient->request(
            Request::METHOD_POST,
            sprintf(self::END_POINT,WorkplaceFixtures::RIVENDEL_WORKPLACE_1_UUID),
            [],
            [],
            [],
            json_encode($payload)
        );

        $response = self::$authenticatedRootClient->getResponse();

        self::assertSame(Response::HTTP_UNPROCESSABLE_ENTITY,$response->getStatusCode());
        $response = json_decode($response->getContent(),true);
        self::assertArrayHasKey(JsonTransformerExceptionListener::ERRORS_KEY,$response);
        $errors = $response[JsonTransformerExceptionListener::ERRORS_KEY];
        self::assertArrayHasKey(CreateProcessRequest::NAME,$errors);
        
    }


}