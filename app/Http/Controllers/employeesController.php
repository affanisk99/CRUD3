<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Divisions;
use App\Companies;
use App\Positions;
use App\Families;
use App\Schools;
use App\Certificates;
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

            $fileName = time().'_'.$request->profile_img->getClientOriginalName();
            $filePath = $request->file('profile_img')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time().'_'.$request->profile_img->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            
            $employees['profile_img'] = $filePath;
        }

        // DB::table('employees')->insert($employees,$fileModel);
        DB::table('employees')->insert($employees);

        return redirect('/employees');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $employees=DB::table('employees')->where('id',$id)->first();
        $employees=Employees::where('id',$id)->first();
        $divisions=Divisions::get();
        $positions=Positions::get();
        $companies=Companies::get();
        //dd($employees->families);
        //dd($employees,$divisions,$positions,$companies);
        return view('employees/show',['employees'=>$employees,'divisions'=>$divisions,'companies'=>$companies,'positions'=>$positions]);
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
           $fileModel = new Employees;

            if($request->file()) {
                $fileName = time().'_'.$request->profile_img->getClientOriginalName();
                $filePath = $request->file('profile_img')->storeAs('uploads', $fileName, 'public');

                $fileModel->name = time().'_'.$request->profile_img->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;
                
                $employees['profile_img'] = $filePath;
            }
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
        return redirect('/employees/bin');
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
    public function createFamily($id){
      $data ['employee_id'] = $id;
        return view ('/families.append',$data);
    }
    public function storeFamily(Request $request){
        $employees=Employees::where('id',$request->employee_id)->first();
        $dataDetail = $request->detail;
        $employees->families()->createMany($dataDetail);
        return redirect('/families');
    }
    public function deleteFamily($id){
        Families::find($id)->delete();
        return redirect()->back();
    }
    public function createCertificates($id){
        $data['employee_id']=$id;
        return view('/certificates.append',$data);
    }
    public function storeCertificates(Request $request){
        $employees=Employees::where('id',$request->employee_id)->first();
        $dataDetail = $request->detail;
        $employees->certificates()->createMany($dataDetail);
        return redirect('/employees');
    }
    public function deleteCertificates($id){
        Certificates::find($id)->delete();
        return redirect()->back();
    }
    public function createSchools($id){
        $data['employee_id']=$id;
        return view ('/schools.append',$data);
    }
    public function storeSchools(Request$request){
        $employees=Employees::where('id',$request->employee_id)->first();
        $dataDetail = $request->detail;
        $employees->schools()->createMany($dataDetail);
        return redirect('/employees');
    }
    public function deleteSchools($id){
        Schools::find($id)->delete();
        return redirect()->back();
    }
}
