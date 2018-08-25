<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use App\Materiel;
use App\Reforme;

class ReformeController extends Controller
{
    public function getReforme()
    {
        $materiels=Materiel::whereNotNull('reforme_id')->get();
        return view('admin.getReforme',compact('materiels'));
    }

    public function CancelReforme($id)
    {
        $mat = Materiel::find($id);
        $reforme = Reforme::find($mat->reforme_id);
        $reforme->delete();
        $mat->reforme_id = null;
        $mat->save();

        return back()->with('info','Reformation Annuler!');
    }
}
