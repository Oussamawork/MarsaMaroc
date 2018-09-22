@extends('layouts.master') @section('title') liste Utilisateurs @endsection 


@section('customCSS')
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
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
                    Liste des Utilisateurs
                </h3>
            </div>
        </div>

        <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="addUser" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="flaticon-add-circular-button"></i>
                                <span>
                                    Nouveau Utilisateur
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
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
                    <th width="5%">
                        Historique Matériels
                    </th>
                    <th title="Field #9">
                        Status
                    </th>
                    <th width="10%">
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
                            <span>
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only"  data-toggle="modal" data-target="#Historique"
                                    data-id="{{ $u->id }}" title="Historique">
                                    
                                    <i class="flaticon-list-1"></i>
                                </button>
                            </span>
                        </td>
                        <td>
                            {{ $u->user_id === 0 ? 4 : 6 }} 
                        </td>
                        <td>
                            <span style="overflow: visible; position: relative; width: 110px;">
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill btn-edit"  data-toggle="modal" data-target="#Edit"
                                    data-id="{{ $u->id }}" title="Edit">
                                    <i class="la la-edit"></i>
                                </button>
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill btn-role"  data-toggle="modal" data-target="#Role"
                                    data-id="{{ $u->id }}" title="Status" {{ $u->user_id == 0 ? : "disabled"}}>
                                    <i class="flaticon-user-settings"></i>
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
            <tfoot>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Prenom
                    </th>
                    <th>
                        Nom
                    </th>
                    <th>
                        Date de recrutement
                    </th>
                    <th>
                        Matricule
                    </th>
                    <th>
                        Entité
                    </th>
                    <th>
                        Historique Matériels
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
    
    

<!--begin::Modal Edit-->
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-top:100px;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal1" >

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Modifer l&apos;utilisateur
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('updateUtilisateur')}}" method="get">
                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4">
                            <label>ID:</label>
                            <input type="text" id="id" name="id" class="form-control m-input m-input--air m-input--pill m-form--state" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4 {{ $errors->has('firstname') ? 'has-danger' : '' }}">
                            <label>
                                Prenom:
                            </label>
                            <input id="firstname" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="firstname" name="firstname" value="{{ Session('firstname') ? Session('firstname') : old('firstname') }}">
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
                            <input type="text" id="lastname" class="form-control m-input m-input--air m-input--pill m-form--state" name="lastname" value="{{ Session('lastname') ? Session('lastname') : old('lastname') }}">
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
                            <input type="text" id="recrutment_date" class="form-control m-input m-input--air m-input--pill" name="recrutment_date" value="{{ Session('recrutment_date') ? Session('recrutment_date') : old('recrutment_date') }}">
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
                            <input type="text" id="matricule" class="form-control m-input m-input--air m-input--pill" name="matricule" value="{{ Session('matricule') ? Session('matricule') : old('matricule') }}">
                            @if ($errors->has('matricule'))
                                    <div class="form-control-feedback">
                                        {{ $errors->first('matricule') }}
                                    </div>
                                @endif
                            </div>

                        <div class="col-lg-6 {{ $errors->has('entite') ? 'has-danger' : '' }}">
                                <label>
                                    Entité : 
                                </label>
                                <select class="form-control m-input m-input--air m-input--pill" id="entite" name="entite">
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
<!--end::Modal-->


<!--begin::Modal Role-->
<div class="modal fade" id="Role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-top:100px;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal1" >

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Modifer le status utilisateur
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('roleUtilisateur')}}" method="get">
                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4">
                            <label>ID:</label>
                            <input type="text" id="IDR" name="id" class="form-control m-input m-input--air m-input--pill m-form--state" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4 {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label>
                                Email:
                            </label>
                            <input id="email" type="email" class="form-control m-input m-input--air m-input--pill m-form--state{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('password') ? 'has-danger' : '' }}">
                            <label>
                                Mot De Passe:
                            </label>
                            <input id="password" type="password" class="form-control m-input m-input--air m-input--pill m-form--state{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('password-confirm') ? 'has-danger' : '' }}">
                            <label>
                                Confirmer Mot De Passe :
                            </label>
                            <input id="password-confirm" type="password" class="form-control m-input m-input--air m-input--pill m-form--state" name="password_confirmation" required>
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
<!--end::Modal-->


<!--begin::Modal Historique-->
<div class="modal fade" id="Historique" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-top:100px;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal1" >

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Historique Matériels
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                        <tr>
                            <th title="ID">
                                Id matériel
                            </th>
                            <th title="Field #2">
                                Déscription
                            </th>
                            <th title="Field #3">
                                Date debut d&apos;affectation
                            </th>
                            <th title="Field #4">
                                Date fin d&apos;affectation
                            </th>
                        </tr>
                    </thead>
                    <tbody name="ici">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                Id matériel
                            </th>
                            <th>
                                Déscription
                            </th>
                            <th>
                                Date debut d&apos;affectation
                            </th>
                            <th>
                                Date fin d&apos;affectation
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->



@endsection 

@section('customJS')

<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/crud/datatables/extensions/buttonsUtilisateur.js')}}" type="text/javascript"></script>


<script>
/* Getting infos from the table to the modal */
    $("#Edit").on('show.bs.modal',function(e){
        var id = $(e.relatedTarget).data('id');
        
        $.ajax({

          url : '/Utilisateur/editUtilisateur/'+id, //Here you will fetch records 
          type : 'get',
          dataType: "json" ,
            
          success : function(data){
              console.log(data);
            $('#id').val(data['id']);
            $('#firstname').val(data['firstname']);
            $('#lastname').val(data['lastname']);
            $('#recrutment_date').val(data['recrutment_date']);
            $('#matricule').val(data['matricule']);
            $('#entite').val(data['entity_id']);
          }
        });
    });

    $("#Role").on('show.bs.modal',function(e){
        var id = $(e.relatedTarget).data('id');
        
        $('#IDR').val(id); 

    });
    
    $("#Historique").on('show.bs.modal',function(e){
        var id = $(e.relatedTarget).data('id');
        $.ajax({

            url : '/Utilisateur/historique/'+id, //Here you will fetch records 
            type : 'get',
            dataType: "json" ,
            
            success : function(data){

                $('tbody[name="ici"]').empty();

                $.each(data, function(key, value){
                    $('tbody[name="ici"]').append('<tr><td>'+value.id+'</td> <td>'+value.description+'</td> <td>'+value.pivot.start_affectation+'</td> <td>'+value.pivot.end_affectation+'</td> </tr>');
                });
            
                
            },
        });

    });


</script>

@endsection
