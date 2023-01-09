<?php
declare(strict_types=1);

namespace Preventool\Domain\Admin\Repository;

use Preventool\Domain\Admin\Model\Admin;
use Preventool\Domain\Shared\Model\Value\Uuid;

interface AdminRepository
{
    public function save(Admin $admin): void;
    public function findById(Uuid $i): Admin;

}