<?php
declare(strict_types=1);

namespace Preventool\Application\Admin\UpdateAdminById;

use Preventool\Domain\Admin\Model\Value\AdminRole;
use Preventool\Domain\Admin\Repository\AdminRepository;
use Preventool\Domain\Shared\Bus\Command\CommandHandler;
use Preventool\Domain\Shared\Exception\ActionNotAllowedException;
use Preventool\Domain\Shared\Model\Value\Email;
use Preventool\Domain\Shared\Model\Value\LastName;
use Preventool\Domain\Shared\Model\Value\Name;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\User\Repository\UserRepository;

class UpdateAdminCommandHandler implements CommandHandler
{

    public function __construct(
        private readonly AdminRepository $adminRepository,
        private readonly UserRepository $userRepository
    )
    {
    }

    public function __invoke(
        UpdateAdminCommand $command
    ): void
    {
        $actionAdminId = new Uuid($command->actionAdminId);
        $actionAdmin = $this->adminRepository->findById(
            $actionAdminId
        );

        $adminId = new Uuid($command->id);
        $admin = $this->adminRepository->findById(
            $adminId
        );

        if( ($actionAdmin->getRole()->value != AdminRole::ADMIN_ROLE_ROOT)
            && ($actionAdminId->value != $command->id)
        ){
            throw ActionNotAllowedException::fromApplicationUseCase($actionAdminId);
        }


        if( !empty($command->name) ){
            $admin->setName(
                new Name($command->name)
            );
        }

        if(!empty($command->lastName)){
            $admin->setLastName(
                new LastName($command->lastName)
            );
        }

        if(!empty($command->role)){
            $admin->setRole(
                new AdminRole(
                    $command->role
                )
            );
        }

        if(!empty($command->email)){
            $admin->setEmail(
                new Email(
                    $command->email
                )
            );

            $user = $this->userRepository->findById(
                new Uuid($admin->getId()->value)
            );

            $user->setEmail(
                new Email($command->email)
            );

            $this->userRepository->save(
                $user
            );

        }

        $admin->setUpdaterAdmin(
            $actionAdmin
        );

        $this->adminRepository->save(
            $admin
        );
    }


}