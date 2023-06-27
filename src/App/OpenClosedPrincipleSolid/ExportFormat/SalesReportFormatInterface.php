<?php
declare(strict_types=1);

namespace App\OpenClosedPrincipleSolid\ExportFormat;

interface SalesReportFormatInterface{
    public function export($format);
}