<?php
declare(strict_types=1);

namespace Preventool\Application\BaselineStudy\Event;

use Preventool\Domain\Shared\Bus\DomainEvent\DomainEventHandler;

class BaselineStudyWasUpdatedEventHandler implements DomainEventHandler
{


    public function __construct()
    {
    }

    public function __invoke(
        BaselineStudyWasUpdatedEvent $event
    ): void
    {
        //Lo haremos sincrono
        //Crear un servivio de domino especifico para esto
        //El servivio tiene como param de entrada el workplace
        //Lo que hara es para cada categoría
            //Treer los indicadores por workplace y categoria
            //Sumpatorio de los % de todos para esa categoria
            //actualizar el base studyCompliance para esa categoria
            //acumular el total
            //cuando acabe con todad las categorias actualizamos el total
            //en todos los casos se hace rendondeo hacia abajo
        // TODO: Implement __invoke() method.
    }


}