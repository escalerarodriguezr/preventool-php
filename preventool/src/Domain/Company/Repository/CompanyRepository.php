<?php
declare(strict_types=1);

namespace Preventool\Domain\Company\Repository;

use Preventool\Domain\Company\Model\Company;
use Preventool\Domain\Company\Model\Value\LegalDocument;
use Preventool\Domain\Shared\Model\Value\Uuid;

interface CompanyRepository
{

    public function save(Company $company): void;
    public function findById(Uuid $id): Company;
    public function findByLegalDocumentOrNull(LegalDocument $legalDocument): ?Company;

}