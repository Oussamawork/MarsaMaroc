<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use App\Soustraitant;
use App\Materiel;
use App\Panne;
use App\Bonsortie;

class PanneController extends Controller
{

    public function getPanne()
    {
        $pannes=Panne::all();
        return view('admin.getPanne',compact('pannes'));
    }

    public function storePanne(Request $request)
    {   
        $this->validate($request, [
            'type' => 'required|string',
            'description' => 'required|string',
            'soustraitant_id' => 'required|numeric|exists:soustraitants,id',
          
        ]);

        $mytime = Carbon\Carbon::now();

        $soustraitant = Soustraitant::find($request['soustraitant_id']);
        $materiel = Materiel::find($request['id']);
            
        $panne = new Panne;
        $panne->type = $request['type'];
        $panne->description = $request['description'];
        $panne->brokendown_date = $mytime->toDateString();
        $panne->bonsortie_id = 0;
        $panne->materiel_id=0;
        $soustraitant->pannes()->save($panne);
        $materiel->pannes()->save($panne);
        
        return back()->with('info','Panne enregistrée avec succès');;
    }

    public function PanneDelete($id)
    {
        
        $panne=Panne::find($id);

        if($panne->bonsortie_id != 0) {
            
            $bonsortie=Bonsortie::find($panne->bonsortie_id);
            $bonsortie->pannes()->delete();
            $bonsortie->delete();

        } else {
            $panne->delete();
        }
        return back()->with('info','Panne supprimée avec succès');
    }

}
