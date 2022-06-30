<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;

class QuotationsController extends Controller
{
    public function index($id){
        $quotations = Quotation::where('id', $id)->all();
        return view('quotations.index', compact('quotations'));
    }
}
