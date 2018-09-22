@extends('layouts.master') 
@section('title') 
liste reformer 
@endsection 

@section('customCSS')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .col1 {
        display: none;
    }

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
                    Liste de Reformations
                </h3>
            </div>
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
                        Descriptions
                    </th>
                    <th width="150px">
                        Fournisseur
                    </th>
                    <th width="150px">
                        Date d&apos;acquisition
                    </th>
                    <th width="90px">
                        Actions
                    </th>
                    <th width="50px">
                        État
                    </th>
                    <th class="col1">

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
                        <td>
                            <a href="{{route('CancelReforme',['id'=>$mat->id])}}" class="m-portlet__nav-link btn m-btn   m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Reformation Annulée!">
                                <i class="fa fa-check"></i>
                            </a>
                            <a href="{{route('getPDFReforme',['id'=>$mat->id])}}" class="m-portlet__nav-link btn m-btn   m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Bon sortie">
                                <i class="flaticon-interface-9"></i>
                            </a>
                            <a href="{{route('deleteMaterial',['id'=>$mat->id])}}" class="m-portlet__nav-link btn m-btn   m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill {{ $mat->isReformed() ? '' : ($mat->isBroken() ? '' : ($mat->isDisponible() ? '' : ($mat->isAffected() ? '' : 'isDisabled'))) }}" title="Delete">
                                <i class="la la-trash"></i>
                            </a>
                        </td>
                        <td>7</td>
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
                        Référence
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Descriptions
                    </th>
                    <th width="150px">
                        Fournisseur
                    </th>
                    <th width="150px">
                        Date d&apos;acquisition
                    </th>
                    <th width="90px">
                        Actions
                    </th>
                    <th width="50px">
                        État
                    </th>
                    <th class="col1">

                    </th>
                </tr>
            </tfoot>
        </table>
        <!--end: Datatable -->
    </div>
</div>







@endsection('content') 

@section('customJS')


<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/demo/default/custom/crud/datatables/extensions/buttons.js')}}" type="text/javascript"></script>





@endsection
