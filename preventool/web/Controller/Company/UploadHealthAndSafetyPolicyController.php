<?php
declare(strict_types=1);

namespace App\Controller\Company;

use Preventool\Domain\Shared\Model\IdentityValidator;
use Preventool\Domain\Shared\Service\FileStorageManager\FileStorageManager;
use Preventool\Infrastructure\Ui\Http\Request\DTO\Company\UploadHealthAndSafetyPolicyRequest;
use Preventool\Infrastructure\Ui\Http\Service\HttpRequestService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UploadHealthAndSafetyPolicyController
{


    public function __construct(
        private readonly HttpRequestService $httpRequestService,
        private readonly IdentityValidator $identityValidator,
        private readonly FileStorageManager $digitalOceanFileStorageManager
    )
    {
    }

    public function __invoke(
        string $id,
        UploadHealthAndSafetyPolicyRequest $request
    ): Response
    {
        $this->identityValidator->validate($id);

        $resource = $this->digitalOceanFileStorageManager->uploadFile(
            $request->getPolicy(),
            sprintf('%s/%s','company_health_saftey_policy',$id),
            FileStorageManager::VISIBILITY_PRIVATE
        );

        return new JsonResponse(
            $resource,
            Response::HTTP_OK
        );

    }


}