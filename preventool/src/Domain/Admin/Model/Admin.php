<?php
declare(strict_types=1);

namespace Preventool\Domain\Admin\Model;

use Preventool\Domain\Admin\Model\Value\AdminRole;
use Preventool\Domain\Admin\Model\Value\AdminType;
use Preventool\Domain\Shared\Model\AggregateRoot;
use Preventool\Domain\Shared\Model\Value\Email;
use Preventool\Domain\Shared\Model\Value\LastName;
use Preventool\Domain\Shared\Model\Value\Name;
use Preventool\Domain\Shared\Model\Value\Uuid;

class Admin extends AggregateRoot
{

    private string $id;
    private string $email;
    private string $type;
    private string $role;
    private string $name;
    private string $lastName;


    public function __construct(
        Uuid $id,
        Email $email,
        AdminType $type,
        AdminRole $role,
        Name $name,
        LastName $lastName
    )
    {
        parent::__construct();
        $this->id = $id->value;
        $this->email = $email->value;
        $this->type = $type->value;
        $this->role = $role->value;
        $this->name = $name->value;
        $this->lastName = $lastName->value;
    }

    public function getId(): Uuid
    {
        return new Uuid($this->id);
    }

    public function getEmail(): Email
    {
        return new Email($this->email);
    }

    public function getType(): AdminType
    {
        return new AdminType($this->type);
    }

    public function getRole(): AdminRole
    {
        return new AdminRole($this->role);
    }

    public function getName(): Name
    {
        return new Name($this->name);
    }

    public function getLastName(): LastName
    {
        return new LastName($this->lastName);
    }

}