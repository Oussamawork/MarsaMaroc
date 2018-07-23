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
    public function store(Request $request)
    {
        $user = new Materiel;
        $user->serial=Input::get("serial");
        $user->label=Input::get("label");
        $user->description=Input::get("description");
        $user->duree_guarantie=Input::get("duree_guarantie");
        $user->date_acquisition=Input::get("date_acquisition");
        $user->save();

        return redirect('/add');
    }

    public function storeUser(Request $request)
    {
        $user = new Utilisateur;
        $user->firstname=Input::get("firstname");
        $user->lastname=Input::get("lastname");
        $user->recrutment_date=Input::get("recrutment_date");
        $user->retirment_date=Input::get("retirment_date");
        $user->matricule=Input::get("matricule");
        $user->entite=Input::get("entite");
        $user->admin_id=Input::get("admin_id");
        $user->save();

        return redirect('/add');
    }

    public function storeAffectation(Request $request)
    {
        
        $start_affectation=$request->input("start_affectation");
        $end_affectation=$request->input("end_affectation");
        $utilisateur_id=$request->input("utilisateur_id");
        $material_id=$request->input("material_id");
        
        
        $data=array('start_affectation'=>$start_affectation,"end_affectation"=>$end_affectation,'utilisateur_id'=>$utilisateur_id,"material_id"=>$material_id);

        DB::table('utilisateur_materiel')->insert($data);

        return redirect('/add');
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
