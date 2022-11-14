<?php
declare(strict_types=1);

namespace Preventool\Domain\User\Model;

use Preventool\Domain\Shared\Model\AggregateRoot;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class User extends AggregateRoot implements UserInterface, PasswordAuthenticatedUserInterface
{

    const ROLE_ROOT = 'ROOT';

    public function __construct(
        private string $id,
        private string $email,
        private string $role,
        private ?string $password=null
    )
    {
        parent::__construct();
    }

    public function getRoles(): array
    {
        $roles[]= $this->role;;
        return array_unique($roles);
    }

    public function eraseCredentials():void
    {

    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }


    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }



}