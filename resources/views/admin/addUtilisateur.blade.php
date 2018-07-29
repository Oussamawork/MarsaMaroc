@extends('layouts.master') 

@section('title') add user @endsection 


@section('content') 

  <div class="row" style="margin-top: 10px;">
      <div class="col-lg-12">
          <!--begin::Portlet-->
          <div class="m-portlet">
              <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                      <div class="m-portlet__head-title">
                          <span class="m-portlet__head-icon m--hide">
                              <i class="la la-gear"></i>
                          </span>
                          <h3 class="m-portlet__head-text">
                              L'ajout d'un utilisateur
                          </h3>
                      </div>
                  </div>
              </div>
              <!--begin::Form-->
              <form class="m-form m-form--fit m-form--state m-form--label-align-right m-form--group-seperator-dashed " action="{{route('storeUser')}}" method="POST"> 
                  @CSRF
                  <div class="m-portlet__body">

                      <div class="form-group m-form__group row">
                          <div class="col-lg-4 {{ $errors->has('firstname') ? 'has-danger' : '' }}">
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

                          <div class="col-lg-4 {{ $errors->has('lastname') ? 'has-danger' : '' }}">
                              <label>
                                  Nom :
                              </label>
                              <input type="text" class="form-control m-input m-input--air m-input--pill" name="lastname" placeholder="Entrer votre nom" value="{{ Session('lastname') ? Session('lastname') : old('lastname') }}">
                              @if ($errors->has('lastname'))
                                    <div class="form-control-feedback">
                                        {{ $errors->first('lastname') }}
                                    </div>
                                @endif
                            </div>

                          <div class="col-lg-4 {{ $errors->has('recrutment_date') ? 'has-danger' : '' }}">
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

                          <div class="col-lg-6 {{ $errors->has('entite') ? 'has-danger' : '' }}">
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

                  </div>

                  <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                      <div class="m-form__actions m-form__actions--solid">
                          <div class="row">
                                <div class="col-lg-6">
                                    <button type="bouton" class="btn btn-primary m-btn m-btn--custom" id="m_sweetalert_demo_3_3">
                                            Enregistrer
                                    </button>
                                </div>
                          </div>
                      </div>
                  </div>

              </form>
              
              <!--end::Form-->
          </div>
          <!--end::Portlet-->
      </div>
  </div>

@endsection

