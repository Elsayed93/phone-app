<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Phone;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PhoneController extends Controller
{
    public function index()
    {
        $countries = Country::select('id', 'name')->get();
        return view('welcome', compact('countries'));
    }

    public function data()
    {

        $model = Phone::with('country');
        return DataTables::of($model)

            ->addIndexColumn()

            ->filter(function ($query) {
                if (request()->has('country') && request('country') != null) {
                    $query->where('country_id',  request('country'));
                }

                if (request()->has('state') && request('state') != null) {
                    $query->where('state',  request('state'));
                }
            }, true)
            ->addColumn('country', function ($row) {
                return ['country_name' => $row->country->name, 'country_code' => $row->country->code_number];
            })
            ->toJson();
    }
}
