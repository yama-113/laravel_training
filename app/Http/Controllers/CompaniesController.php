<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{
    // 会社情報一覧表示
    public function index(){
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }
    // 会社情報新規作成
    public function create(){
        return view('companies.create');
    }
    public function store(Request $request){
        $company = new Company;
        $company->fill($request->all())->save();
        return redirect('companies');
    }
    // 会社情報更新
    public function edit($id){
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }
    public function update(Request $request, $id){
        $company = Company::find($id);
        $company->name=$request->input('name');
        $company->manager_name=$request->input('manager_name');
        $company->phone_number=$request->input('phone_number');
        $company->postal_code=$request->input('postal_code');
        $company->prefecture_code=$request->input('prefecture_code');
        $company->address=$request->input('address');
        $company->mail_address=$request->input('mail_address');
        $company->prefix=$request->input('prefix');
        $company->save();
        return redirect('companies');
    }
    // 会社情報論理削除
    public function destory($id){
        Company::where('id', $id)->delete();
        return redirect('companies');
    }
}

