<?php

namespace App\Services\Export;

use ExporterInterface;

class CSVExporter implements ExporterInterface
{
    public function export(array $data): string
    {
        $handle = fopen('php://temp', 'r+');
        foreach ($data as $row) {
            fputcsv($handle, $row);
        }
        rewind($handle);
        return stream_get_contents($handle);
    }
}
