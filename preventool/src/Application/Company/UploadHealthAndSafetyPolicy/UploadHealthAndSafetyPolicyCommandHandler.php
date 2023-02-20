<?php
declare(strict_types=1);

namespace Preventool\Application\Company\UploadHealthAndSafetyPolicy;

use Preventool\Domain\Admin\Repository\AdminRepository;
use Preventool\Domain\Company\Exception\HealthAndSafetyPolicyOfCompanyNotFoundException;
use Preventool\Domain\Company\Repository\CompanyRepository;
use Preventool\Domain\Company\Repository\HealthAndSafetyPolicyRepository;
use Preventool\Domain\Shared\Bus\Command\CommandHandler;
use Preventool\Domain\Shared\Model\Value\DocumentStatus;
use Preventool\Domain\Shared\Model\Value\Uuid;

class UploadHealthAndSafetyPolicyCommandHandler implements CommandHandler
{


    public function __construct(
        private readonly AdminRepository $adminRepository,
        private readonly CompanyRepository $companyRepository,
        private readonly HealthAndSafetyPolicyRepository $healthAndSafetyPolicyRepository
    )
    {
    }

    public function __invoke(
        UploadHealthAndSafetyPolicyCommand $command
    ): void
    {
        $actionAdminId = new Uuid($command->actionAdminId);
        $actionAdmin = $this->adminRepository->findById(
            $actionAdminId
        );

        $companyId = new Uuid($command->companyId);

        $company = $this->companyRepository->findById(
            $companyId
        );

        $policy = $this->healthAndSafetyPolicyRepository->findByCompanyOrNull(
            $company
        );

        if( empty($policy) ){
            throw HealthAndSafetyPolicyOfCompanyNotFoundException::withCompanyId($companyId);
        }

        $policy->setDocumentResource(
            $command->documentResource
        );

        $policy->setStatus(
            new DocumentStatus(
                DocumentStatus::DRAFT
            )
        );

        $this->healthAndSafetyPolicyRepository->save(
            $policy
        );
    }

}