<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Quotation;
use App\Http\Requests\StoreQuotationRequest;
use Illuminate\Support\Facades\DB;

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
    public function store(StoreQuotationRequest $reqest, $id){
        // 見積番号（prefix-q-00000000）の数値算出
        $quotationCnt = Quotation::withTrashed()->count();
        $prefix = Company::find($id)->prefix;
        $quotationNo = $prefix.'-q-'.sprintf('%08d',(int)$quotationCnt+1) ;
        // 新規見積保存
        $quotation = new Quotation;
        $quotation->no = $quotationNo;
        $quotation->fill($reqest->all())->save();
        // return view('quotations.index', [$quotation->company_id]);では出来ない。
        // indexクラスの処理を行って戻るようにしている↓
        return redirect()->action([QuotationsController::class, 'index'],['id'=>$quotation->company_id]);
    }
    // 見積更新
    public function edit($id, $qid){
        $quotation = Quotation::where('company_id', $id)->where('id', $qid)->first();
        $company = Company::find($id);
        return view('quotations.edit', compact('quotation', 'company'));
    }
    public function update(StoreQuotationRequest $request, $id, $qid){
        // Quotation::where('id',$id)->update([
        //     'title'=>$request->input('title'),
        //     'total'=>$request->input('total'),
        //     'validity_period'=>$request->input('validity_period'),
        //     'due_date'=>$request->input('due_date'),
        //     'status'=>$request->input('status')
        // ]); updateで出来なかった。
        $quotation = Quotation::find($qid);
        $quotation->title=$request->input('title');
        $quotation->total=$request->input('total');
        $quotation->validity_period=$request->input('validity_period');
        $quotation->due_date=$request->input('due_date');
        $quotation->status=$request->input('status');
        $quotation->save();
        return redirect()->action([QuotationsController::class,'index'],['id'=>$id]);
    }
    // 見積論理削除
    public function destroy($id, $qid){ // ($qid)だと削除できない理由
        Quotation::where('id',$qid)->delete();
        return redirect()->action([QuotationsController::class,'index'],['id'=>$id]);
    }
}
