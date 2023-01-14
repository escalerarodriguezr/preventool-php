<?php
declare(strict_types=1);

namespace PHPUnit\Tests\Functional\Http\Admin;

use PHPUnit\Tests\Functional\Http\FunctionalHttpTestBase;
use Preventool\Domain\Admin\Model\Value\AdminRole;
use Preventool\Infrastructure\Persistence\Doctrine\DataFixtures\AdminFixtures;
use Preventool\Infrastructure\Persistence\Doctrine\DataFixtures\UserFixtures;
use Preventool\Infrastructure\Ui\Http\Listener\Shared\JsonTransformerExceptionListener;
use Preventool\Infrastructure\Ui\Http\Request\DTO\Admin\CreateAdminRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateAdminControllerTest extends FunctionalHttpTestBase
{
    const END_POINT = 'api/v1/admin';
    public function setUp(): void
    {
        parent::setUp();
    }

    private function prepareDatabase(): void
    {
        $this->databaseTool->loadFixtures([
            UserFixtures::class,
            AdminFixtures::class
        ]);
    }

    public function testSuccessResponse(): void
    {
        $this->prepareDatabase();
        $this->authenticatedRootClient();

        $payload = [
            'email' => 'leoanar@api.com',
            'password' => 'password123',
            'role' => AdminRole::ADMIN_ROLE_ROOT,
            'name' => 'Kawhi',
            'lastName' => 'Leonard'
        ];

        self::$authenticatedRootClient->request(Request::METHOD_POST,
            self::END_POINT,
            [],
            [],
            [],
            \json_encode($payload)
        );

        $response = self::$authenticatedRootClient->getResponse();
        self::assertSame(Response::HTTP_CREATED,$response->getStatusCode());
    }

    public function testUnprocessableEntityHttpExceptionResponse(): void
    {
        $this->prepareDatabase();
        $this->authenticatedRootClient();

        $payload = [
            'email' => '',
            'password' => '',
            'role' => '',
            'name' => '',
            'lastName' => ''
        ];

        self::$authenticatedRootClient->request(Request::METHOD_POST,
            self::END_POINT,
            [],
            [],
            [],
            \json_encode($payload)
        );

        $response = self::$authenticatedRootClient->getResponse();
        self::assertSame(Response::HTTP_UNPROCESSABLE_ENTITY,$response->getStatusCode());
        $response = json_decode($response->getContent(),true);
        self::assertArrayHasKey(JsonTransformerExceptionListener::ERRORS_KEY,$response);
        $errors = $response[JsonTransformerExceptionListener::ERRORS_KEY];
        self::assertArrayHasKey(CreateAdminRequest::NAME,$errors);
        self::assertArrayHasKey(CreateAdminRequest::LAST_NAME,$errors);
        self::assertArrayHasKey(CreateAdminRequest::EMAIL,$errors);
        self::assertArrayHasKey(CreateAdminRequest::PASSWORD,$errors);
        self::assertArrayHasKey(CreateAdminRequest::ROLE,$errors);
    }


}