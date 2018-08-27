@extends('layouts.master') @section('title') add Type & Entity @endsection @section('content')

@if(Session::has('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    <strong>
        Bien !
    </strong>
    {{Session::get('info')}}
</div>
@endif

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
                          L'ajout d'un type
                      </h3>
                  </div>
              </div>
          </div>
          <!--begin::Form-->
          <form class="m-form m-form--fit m-form--state m-form--label-align-right m-form--group-seperator-dashed " action="{{route('storeType')}}" method="get"> 
              
              <div class="m-portlet__body">

                  <div class="form-group m-form__group row">
                      <div class="col-lg-6 {{ $errors->has('label') ? 'has-danger' : '' }}">
                          <label>
                            Nom:
                          </label>
                          <input type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="inputDanger1" name="label"  value="{{ Session('label') ? Session('label') : old('label') }}">
                          @if ($errors->has('label'))label
                                <div class="form-control-feedback">
                                    {{ $errors->first('label') }}
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
      <br><br>
        <div class="m-portlet">
          <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                      <span class="m-portlet__head-icon m--hide">
                          <i class="la la-gear"></i>
                      </span>
                      <h3 class="m-portlet__head-text">
                          L'ajout d'une entité
                      </h3>
                  </div>
              </div>
          </div>
          <!--begin::Form-->
            <form class="m-form m-form--fit m-form--state m-form--label-align-right m-form--group-seperator-dashed " action="{{route('storeEntity')}}" method="get"> 
              <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6 {{ $errors->has('label') ? 'has-danger' : '' }}">
                            <label>
                                Nom:
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="inputDanger1" name="label"  value="{{ Session('label') ? Session('label') : old('label') }}">
                            @if ($errors->has('label'))label
                                <div class="form-control-feedback">
                                    {{ $errors->first('label') }}
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
  </div>
</div>

@endsection
