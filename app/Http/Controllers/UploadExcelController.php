<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UploadExcelController extends Controller
{
    public function form()
    {
        return view('excel');
    }

    public function upload(Request $request)
    {

        $request->validate([
            'file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('file')->getRealPath();

        // Lê apenas a primeira linha
        if (($handle = fopen($file, 'r')) !== false) {
            $headers = fgetcsv($handle, 1000, ',');
            fclose($handle);
        } else {
            $headers = [];
        }

        dd($headers);

        return view('excel.result', compact('headers'));
    }
}
