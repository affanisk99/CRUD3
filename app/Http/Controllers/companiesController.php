<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Branches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class companiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("Ini Index");
        $companies = Companies::All();
        return view('companies/index',['companies'=>$companies]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("Ini create");
        return view('companies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd("Store");
        $companies=$this->validate($request,[  
            'name'=>'required',
            'code'=>'required|max:5',
            'description'=>'required']);
        DB::table('companies')->insert($companies);
        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies=Companies::where('id',$id)->first();
        $branches=Branches::get();
        //dd($employees->families);
        //dd($employees,$divisions,$positions,$companies);
        return view('companies/show',['companies'=>$companies,'Branches'=>$branches]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies=DB::table('companies')->where('id',$id)->first();
        return view('/companies/edit',['companies'=>$companies]);
        //dd("heytayo");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $companies=$this->validate($request,[  
            'name'=>'required',
            'code'=>'required|max:5',
            'description'=>'required']);
        DB::table('companies')->where('id',$id)->update($companies);
        //dd($companies);
        return redirect('/companies');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies=Companies::onlyTrashed()->where('id',$id);
        $companies->forcedelete();
        return redirect('/companies');
    }
    public function delete($id)
    {
        $companies=Companies::find($id);
        $companies->delete();
        return redirect('/companies');
        
    }
    public function bin()
    {
        $companies=Companies::onlyTrashed()->get();
        return view('/companies/bin',['companies'=>$companies]);
    }
    public function rollback($id)
    {
        $companies=Companies::onlyTrashed()->where('id',$id);
        $companies->restore();
        return redirect('/companies/bin');
    }
    public function createBranches($id){
        $data ['company_id']=$id;
        // dd($data);
        return view('/branches.append',$data);
    }
    public function storeBranches(Request $request){
        $companies=Companies::where('id',$request->company_id)->first();
        $dataDetail = $request->detail;
        // dd($dataDetail);
        $companies->branches()->createMany($dataDetail);
        return redirect('/companies');
    }
    public function deleteBranches($id){
        Branches::find($id)->delete();
        return redirect()->back();
    }
}
