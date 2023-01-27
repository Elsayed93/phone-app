<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PhoneController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function data()
    {

        $model = Phone::with('country');

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->addColumn('country', function ($row) {
                return ['country_name' => $row->country->name, 'country_code' => $row->country->code_number];
            })
            ->toJson();
    }
}
