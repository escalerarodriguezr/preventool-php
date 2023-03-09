<?php
declare(strict_types=1);

namespace Preventool\Domain\BaselineStudy\Service;

class GetBaselineStudyIndicatorsService
{

    private array $indicators;

    public function __construct()
    {
        $this->setIndiators();
    }

    public function __invoke(): array
    {
        return $this->indicators;
    }



    private function setIndiators(): void
    {
       $this->indicators = [
           'compromiso' => [
               'id' => 'compromiso',
               'name' => 'Compromiso e Involucramiento',
               'indicators' => [
                   'principios-1' => [
                       'id' => 'principios-1',
                       'name' => 'Principios',
                       'category' => 'compromiso',
                       'description' => 'El empleador proporciona los recursos necesarios paraque se implemente un sistema de gestión de seguridad y salud en el trabajo.'
                   ],
                   'principios-2' => [
                       'id' => 'principios-2',
                       'name' => 'Principios',
                       'category' => 'compromiso',
                       'description' => 'Se ha cumplido lo planificado en los diferentes programas de seguridad y salud en el trabajo.'
                   ]
               ]
           ],

           'politica-sst' => [
               'id' => 'politica-sst',
               'name' => 'Política de seguridad y salud ocupacional',
               'indicators' => [
                   'politica-1' => [
                       'id' => 'politica-1',
                       'name' => 'Política',
                       'category' => 'politica-sst',
                       'description' => 'Existe una política documentada en materia de seguridad y salud en el trabajo, específica y apropiada para la empresa, entidad pública o privada.'
                   ],
                   'politica-2' => [
                       'id' => 'politica-2',
                       'name' => 'Política',
                       'category' => 'politica-sst',
                       'description' => 'La política de seguridad y salud en el trabajo está firmada por la máxima autoridad de la empresa, entidad pública o privada.'
                   ],
                   'direccion-1' => [
                       'id' => 'direccion-1',
                       'name' => 'Dirección',
                       'category' => 'politica-sst',
                       'description' => 'Se toman decisiones en base al análisis de inspecciones, auditorias,informes de investigación de accidentes, informe de estadísticas, avances de programas de seguridad y salud en el trabajo y opiniones de trabajadores, dando el seguimiento de las mismas.'
                   ],


               ]
           ],

       ];
    }


}