<?php
declare(strict_types=1);

namespace App\OpenClosedPrincipleSolid\ExportFormat;

class Pdf implements SalesReportFormatInterface{
    public function export($format){
        return 'PDF';
    }
}