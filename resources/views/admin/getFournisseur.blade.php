@extends('layouts.master')
@section('title')
liste fournisseurs
@endsection
@section('customCSS')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
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
                    Liste des fournisseurs
                </h3>
            </div>
        </div>

        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{route('addFournisseur')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span>
                            <i class="la la-cart-plus"></i>
                            <span>
                                Nouveau Fournisseur
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
                        Telephone
                    </th>
                    <th>
                        Adresse
                    </th>
                    <th>
                        Fax
                    </th>
                    <th width="5%">
                        Actions
                    </th>
                    <th class="col1">
                        
                    </th>
                    <th class="col1">
                    
                    </th>
                    <th class="col1">
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($fournisseurs as $f)
                    <tr>
                        <td>{{$f->id}}</td>
                        <td>{{$f->name}}</td>
                        <td>{{$f->phone}}</td>
                        <td>{{$f->address}}</td>
                        <td>{{$f->fax}}</td>
                        <td>
                            <span style="overflow: visible; position: relative; width: 110px;">
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill btn-edit"  data-toggle="modal" data-target="#Edit" data-id="{{ $f->id }}">
                                    <i class="la la-edit"></i>
                                </button>
                            </span>
                        </td>
                        <td class="col1"></td>
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
                        Telephone
                    </th>
                    <th>
                        Adresse
                    </th>
                    <th>
                        Fax
                    </th>
                    <th>
                        Actions
                    </th>    
                    <th class="col1">
                            
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
            <form action="updateFournisseur" method="get">
                <div class="form-group m-form__group row">
                    <div class="div col-lg-4">
                        <label>ID:</label>
                        <input type="text" id="id" name="id" class="form-control m-input m-input--air m-input--pill m-form--state" readonly>
                    </div>
                </div>

                    <div class="form-group m-form__group row">
                        <div class="div col-lg-6 {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label>
                                Nom:
                            </label>
                            <input id="name" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="name" name="name" value="{{ Session('name') ? Session('name') : old('name') }}">
                            @if ($errors->has('name'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="div col-lg-6 {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label>
                                Telephone:
                            </label>
                            <input id="phone" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="phone" name="phone" value="{{ Session('phone') ? Session('phone') : old('phone') }}">
                            @if ($errors->has('phone'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                        
                    </div>
                    
                    <div class="form-group m-form__group row">
                        <div class="div col-lg-6 {{ $errors->has('address') ? 'has-danger' : '' }}">
                            <label>
                                Adresse:
                            </label>
                            <input id="address" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="address" name="address" value="{{ Session('address') ? Session('address') : old('address') }}">
                            @if ($errors->has('address'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="div col-lg-6 {{ $errors->has('fax') ? 'has-danger' : '' }}">
                            <label>
                                Fax:
                            </label>
                            <input id="fax" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="fax" name="fax" value="{{ Session('fax') ? Session('fax') : old('fax') }}">
                            @if ($errors->has('fax'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('fax') }}
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

<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/crud/datatables/extensions/buttons.js')}}" type="text/javascript"></script>
<script>
/* Getting infos from the table to the modal */
    $("#Edit").on('show.bs.modal',function(e){
        var id = $(e.relatedTarget).data('id');
        
        $.ajax({

          url : '/Fournisseur/editFournisseur/'+id, //Here you will fetch records 
          type : 'get',
          dataType: "json" ,
            
          success : function(data){
              console.log(data);
            $('#id').val(data['id']);
            $('#name').val(data['name']);
            $('#phone').val(data['phone']);
            $('#address').val(data['address']);
            $('#fax').val(data['fax']);
           
          }
        });
    });


</script>

@endsection