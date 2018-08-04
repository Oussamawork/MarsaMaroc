<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fournisseur;
use App\Materiel;
use App\Type;
use App\Utilisateur;
use App\Reforme;
use Carbon;

class MaterielController extends Controller
{
    public function getMaterial()
    {
        $materiels=Materiel::all();
        $types=Type::all();
        $fournisseurs=Fournisseur::all();
        return view('admin.getMaterial',compact('materiels','types','fournisseurs'));
    }

    public function getMataddview()
    {
        $types = Type::all();
        $fournisseurs = Fournisseur::all();
        return view('admin.addMaterial', compact('types','fournisseurs'));
    }

    public function storeMateriel(Request $request)
    {   
        $type = Type::find($request['type']);

        $materiel = new Materiel;

        $four = Fournisseur::find($request['fournisseur']);
        
        $materiel->serial = $request['serial'];
        $materiel->description = $request['description'];
        $materiel->duree_guarantie = $request['duree_guarantie'];
        $materiel->date_acquisition = $request['date_acquisition'];
        $materiel->fournisseur_id = 0;
        
        $type->materiels()->save($materiel);

        $four->materiels()->save($materiel);        

        return redirect()->route('getMate');
    }

    // AJAX WORK
    public function getMaterielEdit($id)
   {
        $materiel=Materiel::find($id);
        return json_encode($materiel);
   }

    public function getMaterialDelete($id)
    {
        $materiel=Materiel::find($id);
        $materiel->delete();
        return back()->with('info','Materiel supprimé avec succès');
    }

    public function updateMateriel(Request $request)
    {
         $materiel=Materiel::find($request['id']);
         $materiel->serial=$request->input('serial');
         $materiel->type_id=$request->input('type');
         $materiel->description=$request->input('description');
         $materiel->fournisseur_id=$request->input('fournisseur');
         $materiel->duree_guarantie=$request->input('duree_guarantie');
         $materiel->date_acquisition=$request->input('date_acquisition');
         $materiel->save();
         return back()->with('info','modification avec succes');
   }


   //Affecter un materiel

   public function addMatAffectation(Request $request)
   {
        $utilisateur = Utilisateur::find($request['id_utilisateur']);

        
   }
   
   public function reformMateriel(Request $request)
   {
        $mytime = Carbon\Carbon::now();

        $reforme = new Reforme;  
        $reforme->date_reforme = $mytime->toDateString() ;
        $reforme->save();

        $mat = Materiel::find($request['id']);

        $reforme->materiels()->save($mat);

        return back()->with('info','Matériel reformé');
   }

   
}
