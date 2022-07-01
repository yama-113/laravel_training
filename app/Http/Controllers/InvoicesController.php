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
        return view('invoices.index', compact('invoices','company'));
    }
    public function create($id){
        $company = Company::find($id);
        return view('invoices.create',compact('company'));
    }
    public function store(Request $request, $id){
        // 請求番号（prefix-i-00000000）の数値算出
        $invoicesCnt = Invoice::withTrashed()->count();
        $prefix = Company::find($id)->prefix;
        $invoiceNo = $prefix.'-i-'.sprintf('%08d',(int)$invoicesCnt+1);
        // 新規請求保存
        $invoice = new Invoice();
        $invoice->no = $invoiceNo;
        $invoice->company_id = $id;
        $invoice->fill($request->all())->save();
        return redirect()->action([InvoicesController::class,'index'],['id'=>$id]);
    }
    public function edit($id,$iid){
        $invoice = Invoice::find($iid);
        $company = Company::find($id);
        return view('invoices.edit',['id'=>$id, 'iid'=>$iid],compact('invoice','company'));
    }
}
