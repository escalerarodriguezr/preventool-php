<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\Admin;

use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Preventool\Domain\Admin\Model\Admin;
use Preventool\Domain\Admin\Repository\AdminRepository;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;

class DoctrineAdminRepository extends DoctrineBaseRepository implements AdminRepository
{
    protected static function entityClass(): string
    {
        return Admin::class;
    }

    public function save(Admin $admin): void
    {
        $this->saveEntity($admin);
    }


}