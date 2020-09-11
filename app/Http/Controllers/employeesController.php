<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Divisions;
use App\Companies;
use App\Positions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class employeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("Ini Index");
        $employees=Employees::All();
        return view('/employees/index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("Saya");
         $divisions=Divisions::get();
         $positions=Positions::get();
         $companies=Companies::get();
         //dd($comp,$div,$pos);
        return view('/employees/create',['divisions'=>$divisions,'positions'=>$positions,'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd("Ini Store");
        $employees=$this->validate($request,[
            'nip'=>'required|max:5',
            'name'=>'required',
            'division_id'=>'required',
            'company_id'=>'required',
            'position_id'=>'required',
            'address'=>'required',
            'date_of_birth'=>'required',
            'join_date'=>'required',
            'status'=>'required',
            'npwp'=>'required',
            'ktp'=>'required',
            'marital_status'=> 'required',
            'phone_number'=>'required',
            'profile_img'=>'required'
        ]);

        $fileModel = new Employees;

        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $req->file('profile_img')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
        DB::table('employees')->insert($employees,$fileModel);
        return redirect('/employees');
        }
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
        $employees=DB::table('employees')->where('id',$id)->first();
        $divisions=Divisions::get();
        $positions=Positions::get();
        $companies=Companies::get();
        //dd($employees,$divisions,$positions,$companies);
        return view('employees/edit',['employees'=>$employees,'divisions'=>$divisions,'companies'=>$companies,'positions'=>$positions]);
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
       $employees=$this->validate($request,[
            'nip'=>'required|max:5',
            'name'=>'required',
            'division_id'=>'required',
            'company_id'=>'required',
            'position_id'=>'required',
            'address'=>'required',
            'date_of_birth'=>'required',
            'join_date'=>'required',
            'status'=>'required',
            'npwp'=>'required',
            'ktp'=>'required',
            'marital_status'=> 'required',
            'phone_number'=>'required',
            'profile_img'=>'required'
        ]);
        DB::table('employees')->where('id',$id)->update($employees);
        return redirect('/employees');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees=Employees::onlyTrashed()->where('id',$id);
        $employees->forcedelete();
        return redirect('/employees');
    }
    public function delete($id){
        $employees = Employees::find($id);
        $employees->delete();
        return redirect('/employees');
    }
    public function bin(){
        $employees=Employees::onlyTrashed()->get();
        return view('/employees/bin',['employees'=>$employees]);
    }
    public function rollback($id){
        $employees=Employees::onlyTrashed()->where('id',$id);
        $employees->restore();
        return redirect('/employees/bin');
    }
}
