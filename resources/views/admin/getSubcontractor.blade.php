@extends('layouts.master')
@section('title')
liste sous-traitants
@endsection
@section('customCSS')
<link href="../../../assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    .col1 {display: none; }
</style>
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
                        Liste des sous-traitants
                    </h3>
                </div>
            </div>


 <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{route('addSubcontractor')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-cart-plus"></i>
                                <span>
                                    Nouveau sous-traitant
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
                            Nom
                        </th>
                        <th>
                            Prenom
                        </th>
                        <th>
                            Date de debut
                        </th>
                        <th>
                            Date de fin
                        </th>
                        <th>
                            Service
                        </th>
                       
                        <th>
                            Actions
                        </th>
                        <th class="col1">
                            
                        </th>
                        <th class="col1">
                            
                        </th>
                       
                       
             </tr>
          </thead>
                                    <tbody>
                                        @foreach($soustraitants as $s)
                                        <tr>
                                            <td>{{$s->id}}</td>
                                             <td>{{$s->nom}}</td>
                                              <td>{{$s->prenom}}</td>
                                               <td>{{$s->date_debut}}</td>
                                            
                                               
                                                <td>{{$s->date_fin}}</td>
                                               
                                                 <td>{{$s->service}}</td>
                                                            <td>
                                                   
                                                      <span style="overflow: visible; position: relative; width: 110px;">
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill btn-edit"  data-toggle="modal" data-target="#Edit"
                                    data-id="{{ $s->id }}"
                                   >
                                    
                                    <i class="la la-edit"></i>
                                </button>
                                <a href="{{route('deleteSubcontractor',['id'=>$s->id])}}" class="m-portlet__nav-link btn m-btn   m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                             title="Delete">
                                            <i class="la la-trash"></i>
                                           </a>
                                                    </span>

                                                    </td>
                                                 <td class="col1"></td>
                                                 <td class="col1"></td>
                                                 
                                                 
                                         </tr>

                                    @endforeach
                                    </tbody>




                        
       


                                    <tfoot>
                                        <tr>
                         <th title="ID"> 
                            ID
                        </th>
                        <th>
                            Nom
                        </th>
                        <th>
                            Prenom
                        </th>
                        <th>
                            Date de debut
                        </th>
                        <th>
                            Date de fin
                        </th>
                        <th>
                            Service
                        </th>
                       
                        <th>
                            Actions
                        </th>
                        <th class="col1">
                            
                        </th>
                        <th class="col1">
                            
                        </th>
                       
                                        </tr>
                                    </tfoot>
                                </table>
            <!--end: Datatable -->
        
    </div>
    </div>


<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-top:100px;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal1" >

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Modifer le fournisseur
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
            <form action="updateSubcontractor" method="get">
                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4">
                            <label>ID:</label>
                            <input type="text" id="id" name="id" class="form-control m-input m-input--air m-input--pill m-form--state" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="div col-lg-6 {{ $errors->has('nom') ? 'has-danger' : '' }}">
                            <label>
                                Nom:
                            </label>
                            <input id="nom" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="nom" name="nom" value="{{ Session('nom') ? Session('nom') : old('nom') }}">
                            @if ($errors->has('nom'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('nom') }}
                                </div>
                            @endif
                        </div>

                        <div class="div col-lg-6 {{ $errors->has('prenom') ? 'has-danger' : '' }}">
                            <label>
                                Prenom:
                            </label>
                            <input id="prenom" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="prenom" name="prenom" value="{{ Session('prenom') ? Session('prenom') : old('prenom') }}">
                            @if ($errors->has('prenom'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('prenom') }}
                                </div>
                            @endif
                        </div>
                     
                       </div>
                    
                        <div class="form-group m-form__group row">
                        <div class="div col-lg-4 {{ $errors->has('date_debut') ? 'has-danger' : '' }}">
                            <label>
                                Date debut:
                            </label>
                            <input id="date_debut" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="date_debut" name="date_debut" value="{{ Session('date_debut') ? Session('date_debut') : old('date_debut') }}">
                            @if ($errors->has('date_debut'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('date_debut') }}
                                </div>
                            @endif
                        </div>

                        <div class="div col-lg-4 {{ $errors->has('date_fin') ? 'has-danger' : '' }}">
                            <label>
                                Date fin:
                            </label>
                            <input id="date_fin" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="date_fin" name="date_fin" value="{{ Session('date_fin') ? Session('date_fin') : old('date_fin') }}">
                            @if ($errors->has('date_fin'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('date_fin') }}
                                </div>
                            @endif
                        </div>

                        <div class="div col-lg-4 {{ $errors->has('service') ? 'has-danger' : '' }}">
                            <label>
                                Service:
                            </label>
                            <input id="service" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="service" name="service" value="{{ Session('service') ? Session('service') : old('service') }}">
                            @if ($errors->has('service'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('service') }}
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

     
           

@endsection('content')




@section('customJS')


<script src="../../../assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

<script src="../../../assets/demo/default/custom/crud/datatables/extensions/buttons.js" type="text/javascript"></script>

  <script>

   $("#Edit").on('show.bs.modal',function(e){
        var id = $(e.relatedTarget).data('id');
        
        $.ajax({

          url : '/Subcontractor/editSubcontractor/'+id, //Here you will fetch records 
          type : 'get',
          dataType: "json" ,
            
          success : function(data){
              console.log(data);
            $('#id').val(data['id']);
            $('#nom').val(data['nom']);
            $('#prenom').val(data['prenom']);
            $('#date_debut').val(data['date_debut']);
            $('#date_fin').val(data['date_fin']);
            $('#service').val(data['service']);
           
          }
        });
    });


</script>



@endsection