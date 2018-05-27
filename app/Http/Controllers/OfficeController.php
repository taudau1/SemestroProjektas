<?php

namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;
use function view;

class OfficeController extends Controller
{
    public function create(Request $req)
    {
        $input = $req->all();
        $validatedData = $req->validate([
            'name' => 'required|string|max:191',
            'district' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'workers' => 'required|integer|min:0',
            'heating' => 'required|numeric|min:0',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);
        
        $office = new Office($validatedData);
        $office->save();
        
        return $this->renderSidebar();
    }
    
    public function renderSidebar()
    {
        $offices = Office::all();
        return view('offices', ['offices' => $offices]);
    }
}
