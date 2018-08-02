<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fournisseur;

use App\Materiel;

use App\Type;
use DB;
use PDF;

class FournisseurController extends Controller
{
    //

     public function storeFournisseur(Request $request)
    {
        

        $fournisseur = new Fournisseur;

        
        
        $fournisseur->name = $request['name'];
        $fournisseur->phone = $request['phone'];
        $fournisseur->address = $request['address'];
        $fournisseur->fax = $request['fax'];

        $fournisseur->save();
                

        return redirect()->route('getFournisseur');
    }


     public function getFouraddview()
    {

        return view('admin.addFournisseur');
    }


    public function getFournisseur()
    {
    	$fournisseurs=Fournisseur::all();
    	return view('admin.getFournisseur',compact('fournisseurs'));
    }

    public function getFournisseurDelete($id)
    {
       $fournisseur=Fournisseur::find($id);
       $fournisseur->delete();
       return back()->with('info','Materiel supprimé avec succès');

    }

        public function updateFournisseur(Request $request)
    {
         $fournisseur=Fournisseur::find($request['id']);
         $fournisseur->name=$request->input('name');
         $fournisseur->phone=$request->input('phone');
         $fournisseur->address=$request->input('address');
         $fournisseur->fax=$request->input('fax');
         $fournisseur->save();
         return back()->with('info','modification avec succes');
   }

    public function getFournisseurEdit($id)
   {
        $fournisseur=Fournisseur::find($id);
        return json_encode($fournisseur);
   }

}