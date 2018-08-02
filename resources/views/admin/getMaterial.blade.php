@extends('layouts.master')
@section('title')
liste materiels
@endsection
@section('customCSS')
<link href="../../../assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')



@if(Session::has('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    <strong>
        Bien !
    </strong>
    {{Session::get('info')}}
</div>
@endif


<div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Liste des Materiels
                    </h3>
                </div>
            </div>


 <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{route('getMat')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-cart-plus"></i>
                                <span>
                                    Nouveau Materiel
                                </span>
                            </span>
                        </a>
                    </li>
                    
                  
                </ul>
            
        </div>



        </div>
        <div class="m-portlet__body">
            


           
    
            <!--begin: Datatable -->
             <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
           <thead>
              <tr>
                      <th title="ID"> 
                            ID
                        </th>
                        <th>
                            Référence
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Fournisseur
                        </th>
                        <th>
                            Date d'acquisition
                        </th>
                        <th>
                           Type1
                        </th>
                        <th>
                           Type2
                        </th>
                        <th>
                            Durée de guarantie
                        </th>
                        <th>
                            Actions
                        </th>
                       
             </tr>
          </thead>
                                    <tbody>
                                        @foreach($materiels as $mat)
                                        <tr>
                                            <td>{{$mat->id}}</td>
                                             <td>{{$mat->serial}}</td>
                                              <td>{{$mat->type->label}}</td>
                                               <td>{{$mat->description}}</td>
                                            
                                               
                                                <td>{{$mat->fournisseur->name}}</td>
                                               
                                                 <td>{{$mat->date_acquisition}}</td>
                                                 <td>3</td>
                                                 <td>3</td>
                                                  <td>{{$mat->duree_guarantie}}</td>
                                                    <td>
                                                   
                                                      <span style="overflow: visible; position: relative; width: 110px;">
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill btn-edit"  data-toggle="modal" data-target="#Edit"
                                    data-id="{{ $mat->id }}"
                                   >
                                    
                                    <i class="la la-edit"></i>
                                </button>
                                <a href="{{route('deleteMaterial',['id'=>$mat->id])}}" class="m-portlet__nav-link btn m-btn   m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                             title="Delete">
                                            <i class="la la-trash"></i>
                                           </a>
                                                    </span>

                                                    </td>
                                                    
                                         </tr>

                                    @endforeach
                                    </tbody>


<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-top:100px;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal1" >

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Modifer le materiel
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
            <form action="updateMateriel" method="get">
                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4">
                            <label>ID:</label>
                            <input type="text" id="id" name="id" class="form-control m-input m-input--air m-input--pill m-form--state" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4 {{ $errors->has('serial') ? 'has-danger' : '' }}">
                            <label>
                                Reference:
                            </label>
                            <input id="serial" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="serial" name="serial" value="{{ Session('serial') ? Session('serial') : old('serial') }}">
                            @if ($errors->has('serial'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('serial') }}
                                </div>
                            @endif
                        </div>
                       <div class="col-lg-4 {{ $errors->has('type') ? 'has-danger' : '' }}">
                                <label>
                                    Type : 
                                </label>
                                <select class="form-control m-input m-input--air m-input--pill" id="type" name="type">
                                    @foreach($types as $t)
                                        <option value="{{ $t->id }}">
                                            {{ $t->label }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type'))
                                    <div class="form-control-feedback">
                                        {{ $errors->first('type') }}
                                    </div>
                                @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('description') ? 'has-danger' : '' }}">
                            <label>
                                Description :
                            </label>
                            <input type="text" id="description" class="form-control m-input m-input--air m-input--pill" name="description" value="{{ Session('description') ? Session('description') : old('description') }}">
                            @if ($errors->has('description'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group m-form__group row">

                        <div class="col-lg-4 {{ $errors->has('fournisseur') ? 'has-danger' : '' }}">
                                <label>
                                    Fournisseur : 
                                </label>
                                <select class="form-control m-input m-input--air m-input--pill" id="fournisseur" name="fournisseur">
                                    @foreach($fournisseurs as $f)
                                        <option value="{{ $f->id }}">
                                            {{ $f->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('fournisseur'))
                                    <div class="form-control-feedback">
                                        {{ $errors->first('fournisseur') }}
                                    </div>
                                @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('date_acquisition') ? 'has-danger' : '' }}">
                            <label>
                                Date d'acquisition :
                            </label>
                            <input type="text" id="date_acquisition" class="form-control m-input m-input--air m-input--pill" name="date_acquisition" value="{{ Session('date_acquisition') ? Session('date_acquisition') : old('date_acquisition') }}">
                            @if ($errors->has('date_acquisition'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('date_acquisition') }}
                                </div>
                            @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('duree_guarantie') ? 'has-danger' : '' }}">
                            <label>
                                Durée de guarantie :
                            </label>
                            <input type="text" id="duree_guarantie" class="form-control m-input m-input--air m-input--pill" name="duree_guarantie" value="{{ Session('duree_guarantie') ? Session('duree_guarantie') : old('duree_guarantie') }}">
                            @if ($errors->has('duree_guarantie'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('duree_guarantie') }}
                                </div>
                            @endif
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-gray" data-dismiss="modal">
                            Annuler
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


                                    <tfoot>
                                        <tr>
                                              <th title="ID"> 
                            ID
                        </th>
                        <th>
                            Référence
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Fournisseur
                        </th>
                        <th>
                            Date d'acquisition
                        </th>
                        <th>
                           Type1
                        </th>
                        <th>
                           Type2
                        </th>
                        <th>
                            Durée de guarantie
                        </th>
                        <th>
                            Actions
                        </th>
                                        </tr>
                                    </tfoot>
                                </table>
            <!--end: Datatable -->
        
    </div>
    </div>




     
           

@endsection('content')




@section('customJS')


<script src="../../../assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="../../../assets/demo/default/custom/crud/datatables/extensions/buttons.js" type="text/javascript"></script>

<script>
/* Getting infos from the table to the modal */
    $("#Edit").on('show.bs.modal',function(e){
        var id = $(e.relatedTarget).data('id');
        
        $.ajax({

          url : '/Material/editMaterial/'+id, //Here you will fetch records 
          type : 'get',
          dataType: "json" ,
            
          success : function(data){
              console.log(data);
            $('#id').val(data['id']);
            $('#serial').val(data['serial']);
            $('#type').val(data['type_id']);
            $('#description').val(data['description']);
            $('#fournisseur').val(data['fournisseur_id']);
            $('#date_acquisition').val(data['date_acquisition']);
            $('#duree_guarantie').val(data['duree_guarantie']);

          }
        });
    });


</script>

@endsection