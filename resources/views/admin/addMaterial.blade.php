@extends('layouts.master') @section('title') add material @endsection @section('content')

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
                          L'ajout d'un matériel
                      </h3>
                  </div>
              </div>
          </div>
          <!--begin::Form-->
          <form class="m-form m-form--fit m-form--state m-form--label-align-right m-form--group-seperator-dashed " action="{{route('store')}}" method="POST"> 
              @CSRF
              <div class="m-portlet__body">

                  <div class="form-group m-form__group row">
                      <div class="col-lg-4 {{ $errors->has('serial') ? 'has-danger' : '' }}">
                          <label>
                            Référence:
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="inputDanger1" name="serial" placeholder="Entrer la référence du matériel" value="{{ Session('serial') ? Session('serial') : old('serial') }}">
                          @if ($errors->has('serial'))serial
                                <div class="form-control-feedback">
                                    {{ $errors->first('serial') }}
                                </div>
                            @endif
                      </div>

                      <div class="col-lg-4 {{ $errors->has('type') ? 'has-danger' : '' }}">
                          <label>
                            Type :
                          </label>
                          <select class="form-control m-input m-input--air m-input--pill" id="exampleSelect1" name="type">
                                <option value="">
                                    Veuillez choisir le type du matériel
                                </option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">
                                        {{ $type->label }}
                                    </option>
                                @endforeach
                          </select>
                          @if ($errors->has('type'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                        </div>

                      <div class="col-lg-4 {{ $errors->has('description') ? 'has-danger' : '' }}">
                          <label>
                             Description :
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill" id="description" name="description" placeholder="Entrer une description" value="{{ Session('description') ? Session('description') : old('description') }}">
                          @if ($errors->has('description'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                  </div>

                  <div class="form-group m-form__group row">
                        <div class="col-lg-4 {{ $errors->has('fournisseur') ? 'has-danger' : '' }}">
                            <label>
                                Fournisseur :
                            </label>
                            <select class="form-control m-input m-input--air m-input--pill" id="exampleSelect1" name="fournisseur">
                                <option value="">
                                    Veuillez choisir le fournisseur
                                </option>
                                @foreach($fournisseurs as $fournisseur)
                                    <option value="{{ $fournisseur->id }}">
                                        {{ $fournisseur->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('fournisseur'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('fournisseur') }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="col-lg-4 {{ $errors->has('date_acquisition') ? 'has-danger' : '' }}">
                            <label>
                                Date d'acquisition :
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="acquisition_date" name="date_acquisition" placeholder="Entrer la date d'acquisition" value="{{ Session('date_acquisition') ? Session('date_acquisition') : old('date_acquisition') }}">
                            @if ($errors->has('date_acquisition'))
                            <div class="form-control-feedback">
                                {{ $errors->first('date_acquisition') }}
                            </div>
                            @endif
                        </div>
                            
                        <div class="col-lg-4 {{ $errors->has('duree_guarantie') ? 'has-danger' : '' }}">
                            <label>
                                Durée de guarantie:
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" name="duree_guarantie" placeholder="Entrer la durée de guarantie" value="{{ Session('duree_guarantie') ? Session('duree_guarantie') : old('duree_guarantie') }}">
                            @if ($errors->has('duree_guarantie'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('duree_guarantie') }}
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
