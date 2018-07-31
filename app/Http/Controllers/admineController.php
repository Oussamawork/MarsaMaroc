<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Materiel;
use App\Utilisateur;
use Illuminate\Support\Facades\Input;
use DB;

class admineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    

    public function storeAffectation(Request $request)
    {
        
        $start_affectation=$request->input("start_affectation");
        $end_affectation=$request->input("end_affectation");
        $utilisateur_id=$request->input("utilisateur_id");
        $materiel_id=$request->input("materiel_id");
        
        
        $data=array('start_affectation'=>$start_affectation,"end_affectation"=>$end_affectation,'utilisateur_id'=>$utilisateur_id,"materiel_id"=>$materiel_id);

        DB::table('utilisateur_materiel')->insert($data);

        return redirect('getAffectation');
    }
    

    public function getAffectation()
    {
        $affectations=Utilisateur::all();
        return view('admin.getAffectation',['affectations'=>$affectations]);
    }
    
   
   
   
   

   public function getMaterialDelete($id)
   {
    $materiel=Materiel::find($id);
    $materiel->delete();
    return redirect()->route('getMate');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
