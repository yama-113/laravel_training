<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;

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
    public function store(StoreCompanyRequest $request){
        $validated = $request->validated();
        $company = new Company;
        $company->fill($request->all())->save();
        return redirect('companies');
    }
    // 会社情報更新
    public function edit($id){
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }
    public function update(StoreCompanyRequest $request, $id){
        $validated = $request->validated();
        $company = Company::find($id);
        $company->name=$request->input('name');
        $company->manager_name=$request->input('manager_name');
        $company->phone_number=$request->input('phone_number');
        $company->postal_code=$request->input('postal_code');
        $company->prefecture_code=$request->input('prefecture_code');
        $company->address=$request->input('address');
        $company->mail_address=$request->input('mail_address');
        $company->prefix=$request->input('prefix');
        // $update = [
        //     'name' => $request->name,
        //     'manager_name' => $request->manager_name,
        //     'phone_number' => $request->phone_number,
        //     'postal_code' => $request->postal_code,
        //     'prefectire_code' => $request->prefecture_code,
        //     'address' => $request->address,
        //     'mail_address' => $request->mail_address,
        //     'prefix' => $request->prefix
        // ];
        // Company::where('id', $id)->update($update);
        $company->save();
        return redirect('companies');
    }
    // 会社情報論理削除
    public function destory($id){
        Company::where('id', $id)->delete();
        return redirect('companies');
    }
}

