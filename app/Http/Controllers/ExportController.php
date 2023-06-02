<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as FileResponse;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function index()
    {
    return Inertia::render('Export');
    }


    public function export()
    {
        $data = Customer::all();

        $csvData = $this->convertToCSV($data);

        $fileName = 'export.csv';

        Storage::disk('local')->put($fileName, $csvData);

        return FileResponse::download(storage_path('app/' . $fileName))->deleteFileAfterSend(true);   
    }

    private function convertToCSV($data)
    {
        $csv = '';

        if ($data->count()) {
            $keys = array_keys($data[0]->toArray());
            $csv .= implode(',', $keys) . "\n";

            // var_dump($data);

            foreach ($data as $row) {
                // 日本語文字列の処理に文字エンコーディングを指定する
                $rowArray = array_map(function ($value) {
                    return mb_convert_encoding($value, 'SJIS-win', 'UTF-8');
                }, $row->toArray());
                $csv .= implode(',', $rowArray) . "\n";
            }        }

        return $csv;
    }
}
