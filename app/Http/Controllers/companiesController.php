<?php

namespace App\Http\Controllers;

use App\Companies;
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
        //
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
}
