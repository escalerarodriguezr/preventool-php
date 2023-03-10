<?php
declare(strict_types=1);

namespace Preventool\Domain\BaselineStudy\Service;

use Preventool\Domain\BaselineStudy\Model\BaselineStudy;

class GetBaselineStudyIndicatorsService
{
    /**
     * @var BaselineStudy[]
     */
    private array $indicators;

    public function __construct()
    {
        $this->setIndiators();
    }

    /**
     * @return BaselineStudy[]
     */
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

           'politica' => [
               'id' => 'politica',
               'name' => 'Política de seguridad y salud ocupacional',
               'indicators' => [
                   'politica-1' => [
                       'id' => 'politica-1',
                       'name' => 'Política',
                       'category' => 'politica',
                       'description' => 'Existe una política documentada en materia de seguridad y salud en el trabajo, específica y apropiada para la empresa, entidad pública o privada.'
                   ],
                   'politica-2' => [
                       'id' => 'politica-2',
                       'name' => 'Política',
                       'category' => 'politica',
                       'description' => 'La política de seguridad y salud en el trabajo está firmada por la máxima autoridad de la empresa, entidad pública o privada.'
                   ],
                   'direccion-1' => [
                       'id' => 'direccion-1',
                       'name' => 'Dirección',
                       'category' => 'politica',
                       'description' => 'Se toman decisiones en base al análisis de inspecciones, auditorias,informes de investigación de accidentes, informe de estadísticas, avances de programas de seguridad y salud en el trabajo y opiniones de trabajadores, dando el seguimiento de las mismas.'
                   ],

               ]
           ],

           'planeamiento' => [
               'id' => 'planeamiento',
               'name' => 'Planeamiento y aplicación',
               'indicators' => [
                   'diagnostico-1' => [
                       'id' => 'diagnostico-1',
                       'name' => 'Diagnóstico',
                       'category' => 'planeamiento',
                       'description' => 'Se ha realizado una evaluación inicial o estudio de línea base como diagnóstico participativo del estado de la salud y seguridad en el trabajo.'
                   ],
               ]
           ],

           'implementacion' => [
               'id' => 'implementacion',
               'name' => 'Implementación y operación',
               'indicators' => [
                   'estructura-1' => [
                       'id' => 'estructura-1',
                       'name' => 'Estructura y responsabilidades',
                       'category' => 'implementacion',
                       'description' => 'El Comité de Seguridad y Salud en el Trabajo está constituido de forma paritaria. (Para el caso de empleadores con 20 o más trabajadores).'
                   ],
               ]
           ],

           'evaluacion' => [
               'id' => 'evaluacion',
               'name' => 'Evaluación normativa',
               'indicators' => [
                   'requisitos-1' => [
                       'id' => 'requisitos-1',
                       'name' => 'Requisitos legales y de otro tipo',
                       'category' => 'evaluacion',
                       'description' => 'La empresa, entidad pública o privada tiene un procedimiento para identificar, acceder y monitorear el cumplimiento de la normatividad aplicable al sistema de gestión de seguridad y salud en el trabajo y se mantiene actualizada.'
                   ],
               ]
           ],

           'verificacion' => [
               'id' => 'verificacion',
               'name' => 'Verificación',
               'indicators' => [
                   'supervision-1' => [
                       'id' => 'supervision-1',
                       'name' => 'Supervisión monitoreo y seguimiento de desempeño',
                       'category' => 'verificacion',
                       'description' => 'La vigilancia y control de la seguridad y salud en el trabajo permite evaluar con regularidad los resultados logrados en materia de seguridad y salud en el trabajo.'
                   ],
               ]
           ],

           'control' => [
               'id' => 'control',
               'name' => 'Control de información y documentos',
               'indicators' => [
                   'documentos-1' => [
                       'id' => 'documentos-1',
                       'name' => 'Documentos',
                       'category' => 'control',
                       'description' => 'La empresa, entidad pública o privada establece y mantiene información en medios apropiados para describir los componentes del sistema de gestión y su relación entre ellos.'
                   ],
               ]
           ],

           'revision' => [
               'id' => 'revision',
               'name' => 'Revisión por la dirección',
               'indicators' => [
                   'mejora-1' => [
                       'id' => 'mejora-1',
                       'name' => 'Gestión de la mejoracontinua',
                       'category' => 'revision',
                       'description' => 'La alta dirección: Revisa y analiza periódicamente el sistema de gestión para asegurar que es apropiada y efectiva.'
                   ],
               ]
           ],

       ];
    }


}