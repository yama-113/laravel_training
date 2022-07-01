<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Quotation;

class QuotationsController extends Controller
{
    // 見積一覧
    public function index($id){
        // Quotation::find($id) でできなかったのは？
        $quotations = Quotation::where('company_id', $id)->get();
        $company = Company::where('id', $id)->first();
        return view('quotations.index', compact('quotations','company'));
    }

    // 見積作成
    public function create($id){
        $company = Company::where('id', $id)->first();
        return view('quotations.create', compact('company'));
    }
    public function store(Request $reqest){
        $quotation = new Quotation;
        $quotations = 1+(int)Quotation::count();
        $quotation->no = 'prefix-q-'.sprintf('%08d',$quotations);
        $quotation->fill($reqest->all())->save();
        // return view('quotations.index', [$quotation->company_id]);では出来ない。
        // indexクラスの処理を行って戻るようにしている↓
        return redirect()->action([QuotationsController::class, 'index'],['id'=>$quotation->company_id]);
    }
}
