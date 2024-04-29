<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function show($filename)
    {
        // Construct the full path to the PDF file
        $filePath = storage_path('storge/' . $filename);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Serve the file with the appropriate headers
            return response()->file($filePath, ['Content-Type' => 'application/pdf']);
        } else {
            // File not found, return a 404 response
            abort(404);
        }
    }
}
