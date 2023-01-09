<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\Admin;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\Admin\Exception\AdminAlreadyExistsException;
use Preventool\Domain\Admin\Exception\AdminNotFoundException;
use Preventool\Domain\Admin\Model\Admin;
use Preventool\Domain\Admin\Repository\AdminRepository;
use Preventool\Domain\Shared\Model\Value\Uuid;
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
            throw AdminAlreadyExistsException::withEmail($admin->getEmail());
        }
    }

    public function findById(Uuid $id): Admin
    {
        $admin = $this->objectRepository->findOneBy(['id' => $id->value]);
        if(null === $admin) {
            throw AdminNotFoundException::withId($id);
        }

        return $admin;
    }
}