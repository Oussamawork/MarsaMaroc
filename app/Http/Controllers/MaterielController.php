<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fournisseur;

use App\Materiel;

use App\Type;

class MaterielController extends Controller
{

    public function getMatview()
    {
        $types = Type::all();
        $fournisseurs = Fournisseur::all();
        return view('admin.addMaterial', compact('types','fournisseurs'));
    }

    public function storeMateriel(Request $request)
    {
        
        $materiel = new Materiel;
        
        
        $type = Type::find($request['type']);
        $four = Fournisseur::find($request['fournisseur']);
        
        $materiel->serial = $request['serial'];
        $materiel->description = $request['description'];
        $materiel->duree_guarantie = $request['duree_guarantie'];
        $materiel->date_acquisition = $request['date_acquisition'];
        $materiel->fournisseur_id = 0;
        $type->materiels()->save($materiel);
        $four->materiels()->save($materiel);        

        return redirect('/getMaterial');
    }
}
