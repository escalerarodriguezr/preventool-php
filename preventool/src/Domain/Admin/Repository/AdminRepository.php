<?php
declare(strict_types=1);

namespace Preventool\Domain\Admin\Repository;

use Preventool\Domain\Admin\Model\Admin;

interface AdminRepository
{
    public function save(Admin $admin):void;

}