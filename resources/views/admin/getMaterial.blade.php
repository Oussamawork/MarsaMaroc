@extends('layouts.master')
@section('title')
liste materiels
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
                        Liste des utilisteurs
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label>
                                            Status:
                                        </label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="m_form_status">
                                            <option value="">
                                                All
                                            </option>
                                            <option value="4">
                                                User
                                            </option>
                                            <option value="6">
                                                Admin
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <a href="addUser" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="flaticon-list-3"></i>
                                <span>
                                    Nouveau Utilisateur
                                </span>
                            </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->
    
            <!--begin: Datatable -->
            <table class="m-datatable" id="html_table" width="100%">
                <thead>
                    <tr>
                        <th title="ID">
                            ID
                        </th>
                        <th title="Field #2">
                            Référence
                        </th>
                        <th title="">
                            Type
                        </th>
                        <th title="Field #4">
                            Description
                        </th>
                        <th title="Field #5">
                            Fournisseur
                        </th>
                        <th title="Field #6">
                            Date d'acquisition
                        </th>
                        <th>
                            Durée de guarantie
                        </th>
                        <th title="">
                            Status
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materiels as $mat)
                        <tr>
                            <td>
                                cscsdcsdc
                            </td>
                            <td>
                                cscssdc
                            </td>
                            <td>
                               dscsdsdc
                            </td>
                            <td>
                               csdcsdc}
                            </td>
                            <td>
                               dfsddf
                            </td>
                            <td>
                                csdsdc
                            </td>
                            <td>
                                sdfsdfsdf
                            </td>
                            <td>
                                dcsdcsdc 
                            </td>
                            <td>
                                <span style="overflow: visible; position: relative; width: 110px;">
                                <a href="#" type="bouton" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#yourModalId " data-id=""
                                        title="Edit details">
                                        <i class="la la-edit"></i>
                                    </a>
                                    
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
    

@endsection('content')




@section('customJS')
<script src="{{asset('assets/demo/default/custom/crud/metronic-datatable/base/html-table.js')}}" type="text/javascript"></script>

@endsection