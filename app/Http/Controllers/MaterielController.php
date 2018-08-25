<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fournisseur;
use App\Materiel;
use App\Type;
use App\Utilisateur;
use App\Reforme;
use Carbon;
use App\Soustraitant;
use PDF;


class MaterielController extends Controller
{
    public function getMaterial()
    {
        $materiels=Materiel::all();
        $types=Type::all();
        $fournisseurs=Fournisseur::all();
        $utilisateurs=Utilisateur::all();
        $soustraitants=Soustraitant::all();
        return view('admin.getMaterial',compact('materiels','types','fournisseurs','utilisateurs','soustraitants'));
    }

    public function getMataddview()
    {
        $types = Type::all();
        $fournisseurs = Fournisseur::all();
        return view('admin.addMaterial', compact('types','fournisseurs'));
    }

    public function storeMateriel(Request $request)
    {   

        $this->validate($request, [
            'serial' => 'required|string',
            'type' => 'required|numeric|exists:types,id',
            'fournisseur' => 'required|numeric|exists:fournisseurs,id',
            'date_acquisition' => 'date_format:Y-m-d|required',
            'duree_guarantie' => 'required|numeric',
        ]);


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
        if ($materiel->reforme_id != null) {
            $reforme = Reforme::find($materiel->reforme_id);
            $reforme->materiels()->delete();
            $reforme->delete();
        } else {
            $materiel->pannes()->delete();
            $materiel->delete();
        }
        return back()->with('info','Materiel supprimé avec succès');
    }



    public function updateMateriel(Request $request)
    {
        $this->validate($request, [
            'serial' => 'required|string',
            'type' => 'required|numeric|exists:types,id',
            'fournisseur' => 'required|numeric|exists:fournisseurs,id',
            'date_acquisition' => 'date_format:Y-m-d|required',
            'duree_guarantie' => 'required|numeric',
        ]);
            
        $materiel=Materiel::find($request['id']);
        $materiel->serial=$request->input('serial');
        $materiel->type_id=$request->input('type');
        $materiel->description=$request->input('description');
        $materiel->fournisseur_id=$request->input('fournisseur');
        $materiel->duree_guarantie=$request->input('duree_guarantie');
        $materiel->date_acquisition=$request->input('date_acquisition');
        $materiel->save();
        return back()->with('info','Modification avec succès');
   }


   //Affecter un materiel

   public function addMatAffectation(Request $request)
   {
        $this->validate($request, [
            'serial' => 'required|string',
            'utilisateur_id' => 'required|numeric|exists:utilisateurs,id',
            'start_affectation' => 'date_format:Y-m-d|required',
        ]);
        
        $utilisateur = Utilisateur::find($request['utilisateur_id']);

        $materiel = Materiel::where('serial',$request['serial'])->first();
        
        $utilisateur->materiels()->attach($materiel, ['start_affectation' => $request['start_affectation']]);

        return back()->with('info','Matériel affecter avec succès');
    }
   
    public function MatDesaffect($id)
    {
        $mytime = Carbon\Carbon::now();

        $materiel = Materiel::find($id);
        
        $u = $materiel->utilisateurs->last()->pivot->utilisateur_id;
        
        $utilisateur = Utilisateur::find($u);
        
        $utilisateur->materiels()->updateExistingPivot($materiel, ['end_affectation' => $mytime->toDateString()]);

        return back()->with('info','Matériel désaffecter avec succès');
    }

   public function reformMateriel(Request $request)
   {
        $mytime = Carbon\Carbon::now();

        
        $mat=Materiel::find($request['id']);

        $reforme = new Reforme;  
        $reforme->date_reforme = $mytime->toDateString() ;
        $reforme->save();

        $materiel = Materiel::find($request['id']);

        $reforme->materiels()->save($materiel);

        return back()->with('info','Matériel reformé');
        
   }

   
}
