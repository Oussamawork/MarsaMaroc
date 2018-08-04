@extends('layouts.master') @section('title') add Subcontractor @endsection @section('content')

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
                          L'ajout d'un sous-traitant
                      </h3>
                  </div>
              </div>
          </div>
          <!--begin::Form-->
          <form class="m-form m-form--fit m-form--state m-form--label-align-right m-form--group-seperator-dashed " action="{{route('storeSubcontractor')}}" method="get"> 
              
              <div class="m-portlet__body">

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
