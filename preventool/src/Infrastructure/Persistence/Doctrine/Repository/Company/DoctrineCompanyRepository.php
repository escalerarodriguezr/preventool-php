<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\Company;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\Company\Exception\CompanyAlreadyExistsException;
use Preventool\Domain\Company\Model\Company;
use Preventool\Domain\Company\Model\Value\LegalDocument;
use Preventool\Domain\Company\Repository\CompanyRepository;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;

class DoctrineCompanyRepository extends DoctrineBaseRepository implements CompanyRepository
{
    protected static function entityClass(): string
    {
        return Company::class;
    }

    public function save(
        Company $company
    ): void
    {
        try {
            $this->saveEntity($company);
        }catch (UniqueConstraintViolationException $exception){
            throw CompanyAlreadyExistsException::withLegalDocument($company->getLegalDocument());
        }
    }

    public function findByLegalDocumentOrNull(
        LegalDocument $legalDocument
    ): ?Company
    {
        return $this->objectRepository->findOneBy([
            'legalDocument' => $legalDocument->value
        ]);
    }


}