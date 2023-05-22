<?php
declare(strict_types=1);

namespace App\Controller\Process;

use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use Twig\Environment;

class GenerateProcessTaskRiskAssessmentReportController
{


    public function __construct(
        private readonly Pdf $knpSnappyPdf,
        private readonly Environment $engine
    )
    {
    }

    public function __invoke(
        string $processId,

    )
    {
        $template = 'report/process/risk-assessment/report.pdf.twig';
        $header = 'report/process/risk-assessment/header.pdf.twig';
        $footer = 'report/process/risk-assessment/footer.pdf.twig';
        $html = $this->engine->render($template);
        $header = $this->engine->render($header);
        $footer = $this->engine->render($footer);



        $options = [
            'encoding' => 'utf-8',
            'header-html' => $header,
            'margin-top' => '20mm',
            'margin-bottom' => '15mm',
            'footer-html' => $footer,
            'footer-right' => '[page] de [toPage]'
        ];

        return new PdfResponse(
            $this->knpSnappyPdf->getOutputFromHtml($html,$options),
            'file.pdf'
        );
//        dd($html);
//        dd($this->knpSnappyPdf);
//        dd($processId);
    }


}