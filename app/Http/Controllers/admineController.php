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
    public function getMaterial()
    {
        $materiels=Materiel::all();
        return view('admin.getMaterial',compact('materiels'));
    }
   
   public function updateMaterial(Request $request)
   {
    $materiel=Materiel::find($request['id']);
    $materiel->serial=$request->input('serial');
    $materiel->label=$request->input('label');
    $materiel->description=$request->input('description');
    $materiel->duree_guarantie=$request->input('duree_guarantie');
    $materiel->date_acquisition=$request->input('date_acquisition');
    $materiel->save();
    return back()->with('info','modification avec succes');
   }
   
   public function getMaterialEdit($id)
   {
    $materiel=Materiel::find($id);
    return view('admin.editMaterial',['materielId'=>$id]);
   }

   public function getMaterialDelete($id)
   {
    $materiel=Materiel::find($id);
    $materiel->delete();
    return redirect()->route('getMate');
   }
   
   public function getUserDelete($id)
   {
    $utilisateur=Utilisateur::find($id);
    $utilisateur->delete();
    return back()->with('info','Utilisateur supprimé avec succès');
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
