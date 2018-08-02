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
                      <th> 
                            ID
                        </th>
                        <th >
                            Référence
                        </th>
                        <th >
                            Type
                        </th>
                        <th >
                            Description
                        </th>
                        <th >
                            Fournisseur
                        </th>
                        <th >
                            Date d'acquisition
                        </th>
                        <th>
                            Durée de guarantie
                        </th>
                        <th >
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
                                            <td>{{$mat->id}}</td>
                                             <td>{{$mat->serial}}</td>
                                              <td>{{$mat->type->label}}</td>
                                               <td>{{$mat->description}}</td>
                                                <td>{{$mat->fournisseur->name}}</td>
                                                 <td>{{$mat->date_acquisition}}</td>
                                                  <td>{{$mat->duree_guarantie}}</td>
                                                   <td>pass</td>
                                                    <td>pass</td>
                                         </tr>
                                    @endforeach
                                    </tbody>
                                 
            </table>
            <!--end: Datatable -->
        </div>
    </div>
    



@endsection('content')




@section('customJS')


<script src="../../../assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="../../../assets/demo/default/custom/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
@endsection