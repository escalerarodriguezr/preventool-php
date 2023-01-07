<?php

namespace Preventool\Infrastructure\Ui\Console\User;

use Preventool\Domain\Shared\Model\IdentityGenerator;
use Preventool\Domain\Shared\Model\Value\Email;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\User\Model\User;
use Preventool\Domain\User\Model\Value\UserRole;
use Preventool\Domain\User\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateRootUserCommand extends Command
{

    protected static $defaultName = 'app:create-root-user';

    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly IdentityGenerator $identityGenerator,
        private readonly UserPasswordHasherInterface $passwordHasher,
    )
    {
        parent::__construct();
    }


    protected function configure(): void
    {
        $this->setDescription('Create Root User');

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'Root User Creator',
            '============',
            '',
        ]);

        $helper = $this->getHelper('question');

        $question = new Question('Please enter the email ', 'root@root.com');
        $email = $helper->ask($input, $output, $question);

        $passwordQuestion = new Question('Please enter the password ', 'qwertyuiop');
        $password = $helper->ask($input, $output, $passwordQuestion);
        if( strlen($password)<6 ){
            throw new \DomainException('The password must have at least 6 characters');
        }


        $rootUser = new User(
            new Uuid($this->identityGenerator->generateId()),
            new Email($email),
            new UserRole(UserRole::USER_ROLE_ADMIN)
        );

        $hashedPassword = $this->passwordHasher->hashPassword(
            $rootUser,
            $password
        );

        $rootUser->setPassword($hashedPassword);
        $this->userRepository->save($rootUser);

        $output->writeln([
            'Root User Created: '. $rootUser->getId()->value,
            '============',
            '',
        ]);

        return Command::SUCCESS;
    }


}