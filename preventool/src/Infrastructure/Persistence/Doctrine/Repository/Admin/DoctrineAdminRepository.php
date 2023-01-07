<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\Admin;

use Cassandra\Exception\AlreadyExistsException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Preventool\Domain\Admin\Exception\AdminAlreadyExistsException;
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
        try {
            $this->saveEntity($admin);
        }catch (UniqueConstraintViolationException $exception){
            AdminAlreadyExistsException::withEmail($admin->getEmail());
        }
    }

}