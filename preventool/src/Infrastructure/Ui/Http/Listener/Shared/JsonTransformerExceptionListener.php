<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Ui\Http\Listener\Shared;

use Preventool\Domain\Admin\Exception\AdminAlreadyExistsException;
use Preventool\Domain\Admin\Exception\AdminNotFoundException;
use Preventool\Domain\User\Exception\UserAlreadyExistsException;
use Preventool\Domain\User\Exception\UserNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class JsonTransformerExceptionListener
{
    const ERRORS_KEY = 'errors';

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if ($exception instanceof HandlerFailedException) {
            $exception = $exception->getPrevious();
        }
        
        $data = [
            'class' => \get_class($exception),
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $exception->getMessage(),
        ];

        if (\in_array($data['class'], $this->getNotFoundExceptions(), true)) {
            $data['code'] = Response::HTTP_NOT_FOUND;
        }

        if (\in_array($data['class'], $this->getDeniedExceptions(), true)) {
            $data['code'] = Response::HTTP_FORBIDDEN;
        }

        if (\in_array($data['class'], $this->getConflictExceptions(), true)) {
            $data['code'] = Response::HTTP_CONFLICT;
        }

        if ($exception instanceof UnprocessableEntityHttpException) {
            $data[self::ERRORS_KEY] = [];
            foreach ( json_decode($exception->getMessage()) as $key => $error ){
                $data[self::ERRORS_KEY][$key] = $error;
            }
        }

        if ($exception instanceof HttpExceptionInterface) {
            $data['code'] = $exception->getStatusCode();
        }


        $event->setResponse($this->prepareResponse($data));

    }

    private function prepareResponse(array $data): JsonResponse
    {
        $response = new JsonResponse($data, $data['code']);
        $response->headers->set('X-Error-Code', (string) $data['code']);
        $response->headers->set('X-Server-Time', (string) \time());

        return $response;
    }

    private function getNotFoundExceptions(): array
    {
        return [
            UserNotFoundException::class,
            AdminNotFoundException::class
        ];
    }

    private function getConflictExceptions(): array
    {
        return [
            UserAlreadyExistsException::class,
            AdminAlreadyExistsException::class
        ];
    }

    private function getDeniedExceptions(): array
    {
        return [
            AccessDeniedException::class,
//            ActionUserAccessDeniedException::class
        ];
    }

}