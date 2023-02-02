<?php
declare(strict_types=1);

namespace Preventool\Domain\Company\Repository;

use Preventool\Domain\Company\Model\Company;
use Preventool\Domain\Company\Model\Value\LegalDocument;

interface CompanyRepository
{
    public function save(Company $company): void;
    public function findByLegalDocumentOrNull(LegalDocument $legalDocument): ?Company;

}