@extends('layouts.master') @section('title') add Fournisseur @endsection @section('content')

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
                            L&apos;ajout d&apos;un fournisseur
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--state m-form--label-align-right m-form--group-seperator-dashed "
                action="{{route('storeFournisseur')}}" method="get">

                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6 {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label>
                                Nom:
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="inputDanger1"
                                name="name" value="{{ Session('name') ? Session('name') : old('name') }}">
                            @if ($errors->has('name'))name
                            <div class="form-control-feedback">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label>
                                Telephone :
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="phone" name="phone"
                                value="{{ Session('phone') ? Session('phone') : old('phone') }}">
                            @if ($errors->has('phone'))
                            <div class="form-control-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6 {{ $errors->has('address') ? 'has-danger' : '' }}">
                            <label>
                                Adresse:
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="inputDanger1"
                                name="address" value="{{ Session('address') ? Session('address') : old('address') }}">
                            @if ($errors->has('address'))address
                            <div class="form-control-feedback">
                                {{ $errors->first('address') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6 {{ $errors->has('fax') ? 'has-danger' : '' }}">
                            <label>
                                Fax :
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="fax" name="fax"
                                value="{{ Session('fax') ? Session('fax') : old('fax') }}">
                            @if ($errors->has('fax'))
                            <div class="form-control-feedback">
                                {{ $errors->first('fax') }}
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
