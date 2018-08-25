@extends('layouts.master') 
@section('title') 
liste pannes 
@endsection 

@section('customCSS')
<link href="../../../assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
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
                    Liste des Pannes
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
                        Type
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Date de panne
                    </th>
                    <th width="150px">
                        Réference materiel
                    </th>
                    <th>
                        Sous-traitant
                    </th>

                    <th width="100px">
                        Actions
                    </th>
                    <th class="col1">

                    </th>
                    <th class="col1">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($pannes as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->type}}</td>
                        <td>{{$p->description}}</td>
                        <td>{{$p->brokendown_date}}</td>
                        <td>{{$p->materiel->serial}}</td>
                        <td>{{$p->soustraitant->nom}}_{{$p->soustraitant->prenom}}</td>
                        <td>
                            <a href="{{route('deletePanne',['id'=>$p->id])}}" class="m-portlet__nav-link btn m-btn   m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="panne fixée!">
                                <i class="fa fa-check"></i>
                            </a>
                            <a href="{{route('getPDFPanne',['id'=>$p->id])}}" class="m-portlet__nav-link btn m-btn   m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Bon sortie">
                                <i class="flaticon-interface-9"></i>
                            </a>
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
                        Type
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Date de panne
                    </th>
                    <th width="150px">
                        Réference materiel
                    </th>
                    <th>
                        Sous-traitant
                    </th>

                    <th width="100px">
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







@endsection('content') 

@section('customJS')


<script src="../../../assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

<script src="../../../assets/demo/default/custom/crud/datatables/extensions/buttons.js" type="text/javascript"></script>





@endsection
