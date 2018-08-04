<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fournisseur;

use App\Materiel;

use App\Type;

use App\Soustraitant;


class SubcontractorController extends Controller
{
    //

     public function getSubcontractor()
    {
        $soustraitants=Soustraitant::all();
       
        return view('admin.getSubcontractor',compact('soustraitants'));
    }

      public function storeSubcontractor(Request $request)
    {
        

        $soustraitant = new Soustraitant;

        
        
        $soustraitant->nom = $request['nom'];
        $soustraitant->prenom = $request['prenom'];
        $soustraitant->date_debut = $request['date_debut'];
        $soustraitant->date_fin = $request['date_fin'];
        $soustraitant->service = $request['service'];
        $soustraitant->save();
        
        
                

        return redirect()->route('getSubcontractor');
    }


     public function getSubaddview()
    {

        return view('admin.addSubcontractor');
    }
     

      public function getSubcontractorDelete($id)
    {
       $soustraitant=Soustraitant::find($id);
       $soustraitant->delete();
       return back()->with('info','sous-traitant supprimé avec succès');

    }

        public function updateSubcontractor(Request $request)
    {
         $soustraitant=Soustraitant::find($request['id']);
         $soustraitant->nom=$request->input('nom');
         $soustraitant->prenom=$request->input('prenom');
         $soustraitant->date_debut=$request->input('date_debut');
         $soustraitant->date_fin=$request->input('date_fin');
         $soustraitant->service=$request->input('service');
         $soustraitant->save();
         return back()->with('info','modification avec succes');
   }

    public function getSubcontractorEdit($id)
   {
        $soustraitant=Soustraitant::find($id);
        return json_encode($soustraitant);
   }


}
