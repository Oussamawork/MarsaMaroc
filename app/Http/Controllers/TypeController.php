<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fournisseur;

use App\Materiel;

use App\Type;

use App\Entity;
use DB;
use PDF;

class TypeController extends Controller
{
    //

    public function getaddview()
    {
    	return view('admin.addType&Entity');
    }


    public function storeType(Request $request)
    {
        
        
        
        
       

        $type = new Type;

        
        
        $type->label = $request['label'];
        $type->save();

      return back()->with('info','type ajouté  avec succès');
    }
}
