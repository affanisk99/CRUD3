<?php

namespace App\Http\Controllers;
use App\Divisions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class divisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions=Divisions::All();
        return view('/divisions/index',['divisions'=>$divisions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/divisions/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $divisions=$this->validate($request, [
            'name'=>'required',
            'code'=>'required|max:5',
            'description'=>'required']);
        DB::table('divisions')->insert($divisions);
        return redirect('/divisions');
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
        $divisions=DB::table('divisions')->where('id',$id)->first();
        return view('divisions/edit', ['divisions'=>$divisions]);
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
        $divisions=$this->validate($request, [
            'name'=>'required',
            'code'=>'required|max:5',
            'description'=>'required']);
        DB::table('divisions')->where('id',$id)->update($divisions);
        return redirect('/divisions');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $divisions=Divisions::onlyTrashed()->where('id',$id);
        $divisions->forcedelete();
        return redirect('/divisions');
    }
    public function delete($id)
    {

        $divisions = Divisions::find($id);
        $divisions->delete();
        return redirect('/divisions');
    }
    public function bin()
    {
      $divisions=Divisions::onlyTrashed()->get();
      //dd("Satria");
      return view('/divisions/bin', ['divisions' => $divisions]);
    }
    public function rollback($id){
        $divisions=Divisions::onlyTrashed()->where('id',$id);
        $divisions->restore();
        return redirect('/divisions/bin');
    }
}
