<?php

namespace App\Http\Controllers;

use App\positions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class positionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions=Positions::All();
        return view('positions/index',['positions'=>$positions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("DUNIA MANJAY");
        return view('/positions/create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $positions=$this->validate($request, [
            'name'=>'required',
            'code'=>'required|max:5',
            'description'=>'required']);
        DB::table('positions')->insert($positions);
        return redirect('/positions');
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
        $positions=DB::table('positions')->where('id',$id)->first();
        return view('/positions/edit',['positions'=>$positions]);
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
        //dd("Kilatan cahaya adalah petualangan");

        $positions=$this->validate($request, [
            'name'=>'required',
            'code'=>'required|max:5',
            'description'=>'required']);
        DB::table('positions')->where('id',$id)->update($positions);
        return redirect('/positions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $positions=Positions::onlyTrashed()->where('id',$id);
        $positions->forcedelete();
        return redirect('/positions/bin');
    }
    public function delete($id){
        //dd("Majulah indonesia");
        $positions = Positions::find($id);
        $positions->delete();
        return redirect('/positions');
    }
    public function bin(){
        //dd("Ksatria Baja Hitam");
         $positions=Positions::onlyTrashed()->get();
         return view('positions/bin', ['positions' => $positions]);
    }
    public function rollback($id){
        $positions=Positions::onlyTrashed()->where('id',$id);
        $positions->restore();
        return redirect('/positions/bin');
    }
}
