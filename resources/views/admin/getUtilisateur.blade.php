@extends('layouts.master') @section('title') liste materiels @endsection 


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
                        Prenom
                    </th>
                    <th title="Field #3">
                        Nom
                    </th>
                    <th title="Field #4">
                        Date de recrutement
                    </th>
                    <th title="Field #5">
                        Matricule
                    </th>
                    <th title="Field #6">
                        Entité
                    </th>
                    <th>
                        Historique Matériels
                    </th>
                    <th title="Field #9">
                        Status
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($utilisateurs as $u)
                    <tr>
                        <td>
                            {{ $u->id }}
                        </td>
                        <td>
                            {{ $u->firstname }}
                        </td>
                        <td>
                            {{ $u->lastname }}
                        </td>
                        <td>
                           {{ $u->recrutment_date }}
                        </td>
                        <td>
                           {{ $u->matricule }}
                        </td>
                        <td>
                            {{ $u->entity->label }}
                        </td>
                        <td>
                                ICONE
                        </td>
                        <td>
                            {{ $u->user_id === 0 ? 4 : 6 }}   
                        </td>
                        <td>
                            <span style="overflow: visible; position: relative; width: 110px;">
                            <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill btn-edit" data-id="{{ $u->id }}"
                                    title="Edit details">
                                    <i class="la la-edit"></i>
                                </button>
                                <a href="{{route('deleteUser',['id'=>$u->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"
                                    title="Delete">
                                    <i class="la la-trash"></i>
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




<!--begin::Modal-->
<div class="modal fade" id="yourModalId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Modifer l'utilisateur
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4 {{ $errors->has('firstname') ? 'has-danger' : '' }}">
                            <label>
                                Prenom:
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="inputDanger1" name="firstname" placeholder="Entrer votre prenom" value="{{ Session('firstname') ? Session('firstname') : old('firstname') }}">
                            @if ($errors->has('firstname'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('firstname') }}
                                </div>
                            @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('lastname') ? 'has-danger' : '' }}">
                            <label>
                                Nom:
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="inputDanger1" name="lastname" placeholder="Entrer votre nom" value="{{ Session('lastname') ? Session('lastname') : old('lastname') }}">
                            @if ($errors->has('lastname'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('lastname') }}
                                </div>
                            @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('recrutment_date') ? 'has-danger' : '' }}">
                            <label>
                                Date recrutement :
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="recrutment_date" name="recrutment_date" placeholder="Entrer votre date de recrutement" value="{{ Session('recrutment_date') ? Session('recrutment_date') : old('recrutment_date') }}">
                            @if ($errors->has('recrutment_date'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('recrutment_date') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6 {{ $errors->has('matricule') ? 'has-danger' : '' }}">
                            <label>
                                Matricule:
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" name="matricule" placeholder="Entrer votre matricule" value="{{ Session('matricule') ? Session('matricule') : old('matricule') }}">
                            @if ($errors->has('matricule'))
                                    <div class="form-control-feedback">
                                        {{ $errors->first('matricule') }}
                                    </div>
                                @endif
                            </div>

                        <div class="col-lg-6{{ $errors->has('entite') ? 'has-danger' : '' }}">
                                <label>
                                    Entité : 
                                </label>
                                <select class="form-control m-input m-input--air m-input--pill" id="exampleSelect1" name="entite">
                                        @foreach($entities as $entity)
                                            <option value="{{ $entity->id }}">
                                                {{ $entity->label }}
                                            </option>
                                        @endforeach
                                </select>
                                @if ($errors->has('entite'))
                                    <div class="form-control-feedback">
                                        {{ $errors->first('entite') }}
                                    </div>
                                @endif
                        </div>

                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-gray" data-dismiss="modal">
                    Annuler
                </button>
                <button type="button" class="btn btn-primary">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->



@endsection 

@section('customJS')
<script src="{{asset('assets/demo/default/custom/crud/metronic-datatable/base/html-table.js')}}" type="text/javascript"></script>

<script>
    $('.btn-edit').on('click', function(e) {
        $('#yourModalId').modal('show');
        $('#inputDanger1').val(this.dataset.id);
    });
</script>

@endsection
