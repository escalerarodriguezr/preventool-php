<?php
declare(strict_types=1);

namespace App\Controller\Company;

use Preventool\Domain\Shared\Model\IdentityValidator;
use Preventool\Infrastructure\Ui\Http\Request\DTO\Company\UploadHealthAndSafetyPolicyRequest;
use Preventool\Infrastructure\Ui\Http\Service\HttpRequestService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UploadHealthAndSafetyPolicyController
{


    public function __construct(
        private readonly HttpRequestService $httpRequestService,
        private readonly IdentityValidator $identityValidator
    )
    {
    }

    public function __invoke(
        string $id,
        UploadHealthAndSafetyPolicyRequest $request
    ): Response
    {
        $this->identityValidator->validate($id);

        dd($request);

        return new JsonResponse(
            $id,
            Response::HTTP_OK
        );

    }


}