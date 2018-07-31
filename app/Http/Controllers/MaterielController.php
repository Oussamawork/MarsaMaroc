<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fournisseur;

use App\Materiel;

use App\Type;

class MaterielController extends Controller
{
    public function getMaterial()
    {
        $materiels=Materiel::all();
        return view('admin.getMaterial',compact('materiels'));
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

    // AJAX WORK NOT USED YET
    public function getMaterielEdit($id)
   {
        $materiel=Materiel::find($id);
        return json_encode($materiel);
   }

    public function updateMateriel($id)
    {
        // $materiel=Materiel::find($request['id']);
        // $materiel->serial=$request->input('serial');
        // $materiel->label=$request->input('label');
        // $materiel->description=$request->input('description');
        // $materiel->duree_guarantie=$request->input('duree_guarantie');
        // $materiel->date_acquisition=$request->input('date_acquisition');
        // $materiel->save();
        // return back()->with('info','modification avec succes');
   }
}
