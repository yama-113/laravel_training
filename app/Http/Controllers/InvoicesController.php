<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Quotation;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index($id){
        $invoices = Invoice::where('company_id', $id)->get();
        $company = Company::find($id);
        $quotation = Quotation::where('company_id', $id)->get();
        return view('invoices.index', compact('invoices','company','quotation'));
    }
}
