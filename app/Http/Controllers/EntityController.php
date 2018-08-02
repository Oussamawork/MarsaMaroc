<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fournisseur;

use App\Materiel;

use App\Type;

use App\Entity;
use DB;
use PDF;

class EntityController extends Controller
{
    //

        public function getaddview()
    {
    	return view('admin.addType&Entity');
    }

      public function storeEntity(Request $request)
    {
        
        
        
        
       

        $entite = new Entity;

        
        
        $entite->label = $request['label'];
        $entite->save();        

      return back()->with('info','entité ajouté  avec succès');
    }
}
