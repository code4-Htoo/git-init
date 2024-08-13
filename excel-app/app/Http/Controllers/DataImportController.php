<?php

namespace App\Http\Controllers;
use App\Imports\DataImport;
use App\Models\Data;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DataImportController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new DataImport, $request->file('file'));
        return response()->json(['message' => 'Data Imported Successfully']);
    }

    public function index(Request $request)
    {
        $query = Data::query();

        if ($request->has('search')) {
            $query->where('first_name', 'LIKE', '%' . $request->search . '%')
              ->orWhere('id_number', 'LIKE', '%' . $request->search . '%');
        }

        $query->orderBy('first_name', 'asc');

        return response()->json($query->get());
    }
}
