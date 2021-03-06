@extends('layouts.master')

@section('title')
liste matériels
@endsection

@section('customCSS')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .isDisabled {
        color: currentColor;
        cursor: not-allowed;
        opacity: 0.5;
        text-decoration: none;
        pointer-events: none;
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
                    Liste des Matériels
                </h3>
            </div>
        </div>

        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{route('getMat')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span>
                            <i class="flaticon-add-circular-button"></i>
                            <span>
                                Nouveau Matériel
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
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
                        Référence
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Fournisseur
                    </th>
                    <th style="width: 50px;">
                        Date d&apos;acquisition
                    </th>
                    <th style="width: 50px;">
                        Durée de guarantie
                    </th>
                    <th style="width: 50px;">
                        État
                    </th>
                    <th  style="width: 10px;">
                        Affectations
                    </th>
                    <th style="width: 70px;">
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
                        <td style="text-align:  center;">{{$mat->duree_guarantie}} </td>
                        <td style="text-align:  center;">
                            {{ $mat->isReformed() ? 7 : ($mat->isBroken() ? 6 : ($mat->isDisponible() ? 5 : ($mat->isAffected() ? 5 : 4))) }}
                        </td>
                        <td style="text-align:center;">
                            <button class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill btn-edit" data-id="{{ $mat->serial }}" onclick="myFunction(this);" title="Affecter" {{ $mat->isReformed() ? 'Disabled' : ($mat->isBroken() ? 'Disabled' : ($mat->isDisponible() ? '' : ($mat->isAffected() ? '' : 'Disabled'))) }}>
                                <i class="flaticon-reply"></i>
                            </button>
                            
                            <a href="{{route('MatDesaffect',['id'=>$mat->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill {{ $mat->isReformed() ? 'isDisabled' : ($mat->isBroken() ? 'isDisabled' : ($mat->isDisponible() ? 'isDisabled' : ($mat->isAffected() ? 'isDisabled' : ''))) }} " title="Désaffecter">
                                <i class="flaticon-circle"></i>                                                                                             
                            </a>
                        </td>
                        <td style="text-align:center;">
                            <span style="overflow: visible; position: relative; width: 110px;">
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill btn-edit"  data-toggle="modal" data-target="#Edit" data-id="{{ $mat->id }}" title="Edite" >
                                    <i class="la la-edit"></i>
                                </button>
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill btn-edit"  data-toggle="modal" data-target="#Panne" data-id="{{ $mat->id }}" title="En Panne" {{ $mat->isReformed() ? 'Disabled' : ($mat->isBroken() ? 'Disabled' : ($mat->isDisponible() ? '' : ($mat->isAffected() ? '' : 'Disabled'))) }}>         
                                    <i class="flaticon-danger"></i>
                                </button>
                                
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="modal" data-target="#Reforme" data-id="{{ $mat->id }}" data-serial="{{ $mat->serial }}" title="Reforme" {{ $mat->isReformed() ? 'Disabled' : ($mat->isBroken() ? 'Disabled' : ($mat->isDisponible() ? '' : ($mat->isAffected() ? '' : 'Disabled'))) }} >
                                    <img style="width: 15px;" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMjU3IDUxMi4yNTciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4yNTcgNTEyLjI1NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDEgMSkiPgoJPGc+CgkJPHBhdGggZD0iTTQ4Mi4wNTksMzg1LjgxN2MtMTAuNjM5LTcuNDg3LTIyLjkxNy0xMS41MDktMzUuMzE5LTEyLjE2NWMtNDYuNzQ0LTMwLjYxLTc3LjM2NC01My41ODUtOTUuMjQxLTcxLjQ2MmwtNTQuOTE1LTU0LjkxNSAgICBsMzMuMzI0LTM3LjMwMmM2LjMxNiwzLjU2NSwxMy4wOTksNS45MTQsMTkuODg0LDYuODgzYzUuMTIsMC44NTMsOC41MzMsMC44NTMsMTEuOTQ3LDAuODUzYzYuODI3LDAsOC41MzMsMCwxNS4zNiw1Ljk3MyAgICBjLTMuNDEzLDIuNTYtNS4xMiw2LjgyNy01LjEyLDExLjA5M3MxLjcwNyw5LjM4Nyw1LjEyLDEyLjhsMjkuODY3LDI5Ljg2N2M0LjI2Nyw1LjEyLDExLjA5Myw3LjY4LDE3LjkyLDcuNjggICAgczEzLjY1My0yLjU2LDE3LjkyLTguNTMzbDYwLjU4Ny02MC41ODdjNS4xMi00LjI2Nyw3LjY4LTExLjA5Myw3LjY4LTE3Ljkycy0yLjU2LTEyLjgtNy42OC0xNy45MmwtMjkuODY3LTI5Ljg2NyAgICBjLTMuNDEzLTMuNDEzLTcuNjgtNS4xMi0xMS45NDctNS4xMnMtOC41MzMsMi41Ni0xMS45NDcsNS4xMmMtNi44MjctNS45NzMtNi44MjctNy42OC02LjgyNy0xNC41MDdjMC0zLjQxMywwLTcuNjgtMS43MDctMTIuOCAgICBjLTEuNzA3LTExLjk0Ny03LjY4LTIzLjg5My0xNy4wNjctMzMuMjhsLTMwLjcyLTMwLjcyYy0xNy45Mi0xNy45Mi0yNi40NTMtMjYuNDUzLTQ5LjQ5My0zNi42OTMgICAgYy00OS40OTMtMjMuMDQtOTkuODQtMTguNzczLTE3My4yMjcsMTQuNTA3Yy00LjI2NywxLjcwNy01Ljk3Myw1LjEyLTUuMTIsOS4zODdzNC4yNjcsNi44MjcsOC41MzMsNi44MjdoMTEuMDkzICAgIGMzNy41NDcsMCw1Ny4xNzMsMCw5MS4zMDcsMzQuMTMzYzE0Ljk0NiwxNC45NDYsMTUuMzc3LDM3Ljg2MywxLjk4Niw1NC43MjRjLTEuODA1LDAuMjcyLTMuMTc5LDEuMDgyLTQuNTQ2LDIuNDQ5bC0zNy45MDYsNDIuMzA4ICAgIGwtMjguNjU0LTI4LjY1NGMtMzEuNDk0LTMxLjQ5NC01My42NDYtNjEuMjkxLTcwLjY5NS05NC40N2MtMC44OTUtMTYuNzg5LTcuNjMyLTMyLjQ5Ny0xOS43NTgtNDQuNjIzICAgIEMxMDIuMzI1LDQuMzc3LDgxLjg0NS0yLjQ1LDYxLjM2NS0wLjc0M2MtMi41NiwwLjg1My01LjEyLDIuNTYtNS45NzMsNC4yNjdjLTEuNzA3LDIuNTYtMS43MDcsNS45NzMsMCw4LjUzM2wyMy44OTMsNDIuNjY3ICAgIGMtNS4xMiwxMS4wOTMtMTcuMDY3LDE3LjkyLTI5LjAxMywxNy4wNjdMMjUuNTI1LDMwLjgzYy0wLjg1My0yLjU2LTQuMjY3LTQuMjY3LTYuODI3LTQuMjY3Yy0yLjU2LTAuODUzLTUuMTIsMC44NTMtNi44MjcsMy40MTMgICAgYy0yMC40OCwzMC43Mi0xMi44LDcxLjY4LDE3LjkyLDkzLjAxM2MxMC41ODQsNy41NiwyMi41MDgsMTEuNzY0LDM0LjU4NCwxMi42MjZjMC4xMzUsMC4wNTcsMC4yNjIsMC4xMjcsMC40MDIsMC4xNzQgICAgYzMzLjI4LDE3LjA2Nyw2My4xNDcsMzkuMjUzLDk0LjcyLDcwLjgyN2wzMS4yMDksMzAuNDk5TDkuMzEyLDQzOS41NzdjLTYuODI3LDYuODI3LTEwLjI0LDE2LjIxMy0xMC4yNCwyNS42ICAgIGMwLDkuMzg3LDMuNDEzLDE3LjkyLDEwLjI0LDI0Ljc0N2wxMS45NDcsMTEuOTQ3YzYuODI3LDUuOTczLDE1LjM2LDkuMzg3LDIzLjg5Myw5LjM4N3MxNy45Mi0zLjQxMywyNC43NDctMTAuMjRsMTgxLjE4Ny0yMDIuODEzICAgIGw1Mi42MjYsNTIuNjI2YzE3LjkwMywxNy45MDMsNDAuOTE3LDQ5LjQzNSw3MS41OTQsOTUuNDQ0YzEuMSwxNi40MjMsNy44MjEsMzEuNzU3LDE5LjcxMyw0My42NDkgICAgYzEyLjgsMTIuOCwyOS44NjcsMTkuNjI3LDQ3Ljc4NywxOS42MjdjMi41NiwwLDUuMTIsMCw2LjgyNywwYzIuNTYsMCw1LjEyLTEuNzA3LDYuODI3LTQuMjY3czEuNzA3LTUuOTczLDAtOC41MzNsLTI0Ljc0Ny00MS44MTMgICAgYzUuOTczLTExLjA5MywxNy4wNjctMTcuOTIsMjkuODY3LTE3LjA2N2wyMy44OTMsNDAuOTZjMC44NTMsMi41Niw0LjI2Nyw0LjI2Nyw2LjgyNyw0LjI2N2MzLjQxMy0wLjg1Myw1Ljk3My0xLjcwNyw3LjY4LTQuMjY3ICAgIEM1MjAuNDU5LDQ0OC4xMSw1MTEuOTI1LDQwNy4xNSw0ODIuMDU5LDM4NS44MTd6IE0yODcuNDk5LDczLjQ5N2MtMjcuMzA3LTI2LjQ1My00Ny43ODctMzQuOTg3LTcwLjgyNy0zNy41NDcgICAgYzQ4LjY0LTE1LjM2LDg0LjQ4LTE0LjUwNywxMjAuMzIsMS43MDdjMjAuNDgsOC41MzMsMjcuMzA3LDE1LjM2LDQ1LjIyNywzMy4yOGwzMC43MiwzMC43MiAgICBjNi44MjcsNi44MjcsMTEuMDkzLDE1LjM2LDExLjk0NywyMy44OTNjMC44NTMsNC4yNjcsMC44NTMsNy42OCwwLjg1MywxMC4yNGMwLDkuMzg3LDAuODUzLDE2LjIxMywxMS4wOTMsMjYuNDUzICAgIGMzLjQxMywzLjQxMyw4LjUzMyw1LjEyLDEyLjgsNS4xMmM1LjEyLDAsOS4zODctMS43MDcsMTEuOTQ3LTUuMTJsMjkuODY3LDI5Ljg2N2MxLjcwNywxLjcwNywyLjU2LDMuNDEzLDIuNTYsNS45NzMgICAgcy0wLjg1Myw0LjI2Ny0yLjU2LDUuOTczbC02MC41ODcsNjAuNTg3Yy0zLjQxMywzLjQxMy04LjUzMywzLjQxMy0xMS45NDcsMGwtMjkuODY3LTI5Ljg2N2MzLjQxMy0yLjU2LDUuMTItNi44MjcsNC4yNjctMTEuOTQ3ICAgIGMwLTQuMjY3LTEuNzA3LTkuMzg3LTUuMTItMTIuOGMtMTAuMjQtMTAuMjQtMTcuMDY3LTExLjA5My0yNi40NTMtMTEuMDkzYy0yLjU2LDAtNS45NzMsMC0xMC4yNC0wLjg1MyAgICBjLTkuMzg3LTAuODUzLTE3LjA2Ny01LjEyLTIzLjg5My0xMS45NDdsLTM2LjY5My0zNi42OTNDMzA5LjY4NSwxMjYuNDA0LDMwNy45NzksOTMuOTc3LDI4Ny40OTksNzMuNDk3eiBNMTkuNTUyLDUzLjAxNyAgICBsMTcuOTIsMzAuNzJjMS43MDcsMi41Niw0LjI2Nyw0LjI2Nyw2LjgyNyw0LjI2N2g0LjI2N2MxOS42MjcsMC44NTMsMzcuNTQ3LTkuMzg3LDQ2LjA4LTI2LjQ1M2wxLjcwNy00LjI2NyAgICBjMS43MDctMi41NiwxLjcwNy01LjEyLDAtNy42OEw3Ny41NzksMTcuMTc3YzEwLjI0LDEuNzA3LDE5LjYyNyw2LjgyNywyNy4zMDcsMTQuNTA3YzguNzk4LDkuNTMxLDE0LjQzMSwyMS41ODUsMTQuNzY0LDM0LjUzMyAgICBjLTAuMTY1LDAuNjU3LTAuMjU4LDEuMzY0LTAuMjU4LDIuMTYxYzAsMy45NTItMC40NzcsNy44MDctMS4zNiwxMS41MjNjLTMuMjE5LDEyLjM1Ni0xMC45MzgsMjMuMTI5LTIxLjY4LDMwLjI5MSAgICBjLTE3LjA2NywxMS4wOTMtNDAuMTA3LDExLjA5My01Ny4xNzMtMC44NTNDMjEuMjU5LDk2LjUzNywxMy41NzksNzMuNDk3LDE5LjU1Miw1My4wMTd6IE0xNzEuNDQ1LDE5NC42NyAgICBjLTI1LjYtMjYuNDUzLTUxLjItNDYuOTMzLTc4LjUwNy02My4xNDdjNC4yNjctMS43MDcsOS4zODctNC4yNjcsMTMuNjUzLTYuODI3YzEyLjgtOC41MzMsMjEuMzMzLTE5LjYyNywyNi40NTMtMzMuMjggICAgYzE2LjIxMywyNy4zMDcsMzYuNjkzLDUyLjkwNyw2Mi4yOTMsNzguNTA3bDI5LjMxLDI5LjMxbC0yMi45ODUsMjUuNjU1TDE3MS40NDUsMTk0LjY3eiBNNTcuOTUyLDQ4OC4yMTcgICAgYy02LjgyNyw2LjgyNy0xNy45Miw3LjY4LTI0Ljc0NywwLjg1M2wtMTEuOTQ3LTExLjA5M2MtMy40MTMtMy40MTMtNS4xMi03LjY4LTUuMTItMTEuOTQ3YzAtNS4xMiwxLjcwNy05LjM4Nyw1Ljk3My0xMy42NTMgICAgbDQuODMzLTUuNDA3bDEyLjIzNCwxMi4yMzRjMS43MDcsMS43MDcsMy40MTMsMi41Niw1Ljk3MywyLjU2czQuMjY3LTAuODUzLDUuOTczLTIuNTZjMy40MTMtMy40MTMsMy40MTMtOC41MzMsMC0xMS45NDcgICAgbC0xMi45MDQtMTIuOTA0bDExLjI3Ny0xMi42MTdsMTMuNTc0LDEzLjU3NGMxLjcwNywxLjcwNywzLjQxMywyLjU2LDUuOTczLDIuNTZzNC4yNjctMC44NTMsNS45NzMtMi41NiAgICBjMy40MTMtMy40MTMsMy40MTMtOC41MzMsMC0xMS45NDdMNjAuNzc1LDQwOS4xMmwyMTkuNDk0LTI0NS41NzNsMzUuODQsMzUuODRsLTM1LjIxNSwzOS4zOTkgICAgYy0xLjAwNiwwLjQyNi0xLjg5NiwxLjA3Ny0yLjc4MiwxLjk2NGwtMzQuMTMzLDM4LjRjLTAuOTc1LDAuOTc1LTEuNjYxLDIuMDkxLTIuMDc5LDMuMjY0TDU3Ljk1Miw0ODguMjE3eiBNMjYyLjc2MiwyODUuMTM0ICAgIGwyMy4zNTMtMjYuMTRsNTUuMTQzLDU1LjE0M2MxNS4zNiwxNi4yMTMsNDEuODEzLDM2LjY5Myw4MC4yMTMsNjIuMjkzYy01LjEyLDEuNzA3LTEwLjI0LDQuMjY3LTE1LjM2LDcuNjggICAgYy0xMC41ODcsNi42MTctMTguMDg1LDE1LjgwNC0yMy4zMSwyNS45NmMtMC4wNzcsMC4xNDUtMC4xNDgsMC4yOTMtMC4yMjQsMC40MzljLTAuMzEsMC42MTEtMC42MTIsMS4yMjUtMC45MDYsMS44NDMgICAgYy0wLjQyMSwwLjg3NS0wLjgyMSwxLjc2LTEuMjA0LDIuNjU0Yy0wLjI2MiwwLjYwNS0wLjUyMywxLjIxLTAuNzcsMS44MTljLTAuMDM1LDAuMDg4LTAuMDY5LDAuMTc2LTAuMTA0LDAuMjY0ICAgIGMtMC4yNjksMC42NjgtMC41MzYsMS4zMzYtMC43ODgsMi4wMDhjLTQuODQ3LTcuMTA5LTkuNTEtMTMuODE4LTEzLjk5NS0yMC4xMzhsMTEuNDM1LTExLjQzNWMzLjQxMy0zLjQxMywzLjQxMy04LjUzMywwLTExLjk0NyAgICBjLTMuNDEzLTMuNDEzLTguNTMzLTMuNDEzLTExLjk0NywwbC05LjUxMyw5LjUxM2MtMy41NDYtNC44MTItNi45NzEtOS4zNTEtMTAuMjc1LTEzLjYxOGw3Ljg0Mi03Ljg0MiAgICBjMy40MTMtMy40MTMsMy40MTMtOC41MzMsMC0xMS45NDdjLTMuNDEzLTMuNDEzLTguNTMzLTMuNDEzLTExLjk0NywwbC02LjUxNCw2LjUxNGMtNi4yNzItNy41NTktMTIuMDU3LTEzLjk5Mi0xNy4zNzktMTkuMzE0ICAgIEwyNjIuNzYyLDI4NS4xMzR6IE00OTEuNDQ1LDQ1NS43OWwtMTcuOTItMzAuNzJjLTEuNzA3LTIuNTYtNC4yNjctNC4yNjctNi44MjctNC4yNjdoLTQuMjY3ICAgIGMtMTkuNjI3LTEuNzA3LTM3LjU0Nyw5LjM4Ny00Ni4wOCwyNi40NTNsLTEuNzA3LDQuMjY3Yy0xLjcwNywyLjU2LTEuNzA3LDUuMTIsMCw3LjY4bDE4Ljc3MywzMi40MjcgICAgYy0xMC4yNC0xLjcwNy0xOS42MjctNi44MjctMjcuMzA3LTE0LjUwN2MtOC42MzEtOS4zNTEtMTQuMjEtMjEuMTMtMTQuNzM1LTMzLjc5N2MwLjE0Ni0wLjYyNCwwLjIyOC0xLjI5NCwwLjIyOC0yLjA0MyAgICBjMC0xMC44MSwzLjQzMi0yMC45MzEsOS40MTMtMjkuNTA0YzMuNjc1LTUuMTE0LDguMjcxLTkuNTkxLDEzLjYyNy0xMy4xNjJjOC41MzMtNS45NzMsMTcuOTItOC41MzMsMjguMTYtOC41MzMgICAgYzEwLjI0LDAsMjAuNDgsMy40MTMsMjkuMDEzLDkuMzg3QzQ4OS43MzksNDEyLjI3LDQ5Ny40MTksNDM1LjMxLDQ5MS40NDUsNDU1Ljc5eiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                                </button>
                                
                                <a href="{{route('deleteMaterial',['id'=>$mat->id])}}" class="m-portlet__nav-link btn m-btn   m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill {{ $mat->isReformed() ? '' : ($mat->isBroken() ? '' : ($mat->isDisponible() ? '' : ($mat->isAffected() ? '' : 'isDisabled'))) }}" title="Delete">
                                        <i class="la la-trash"></i>
                                </a>
                            </span>
                        </td>                                           
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th title="ID"> 
                        ID
                    </th>
                    <th>
                        Référence
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Fournisseur
                    </th>
                    <th>
                        Date d&apos;acquisition
                    </th>
                    <th>
                        Durée de guarantie
                    </th>
                    <th>
                        État
                    </th>
                    <th>
                        Affectations
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </tfoot>
        </table>
        <!--end: Datatable -->
    </div>
</div>

<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-top:100px;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal1" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Modifer le matériel
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateMateriel') }}" method="get">
                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4">
                            <label>ID:</label>
                            <input type="text" id="ide" name="id" class="form-control m-input m-input--air m-input--pill m-form--state" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4 {{ $errors->has('serial') ? 'has-danger' : '' }}">
                            <label>
                                Reference:
                            </label>
                            <input id="serial" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="serial" name="serial" value="{{ Session('serial') ? Session('serial') : old('serial') }}">
                            @if ($errors->has('serial'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('serial') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 {{ $errors->has('type') ? 'has-danger' : '' }}">
                            <label>
                                Type : 
                            </label>
                            <select class="form-control m-input m-input--air m-input--pill" id="type" name="type">
                                @foreach($types as $t)
                                    <option value="{{ $t->id }}">
                                        {{ $t->label }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('type'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('description') ? 'has-danger' : '' }}">
                            <label>
                                Description :
                            </label>
                            <input type="text" id="description" class="form-control m-input m-input--air m-input--pill" name="description" value="{{ Session('description') ? Session('description') : old('description') }}">
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
                            <select class="form-control m-input m-input--air m-input--pill" id="fournisseur" name="fournisseur">
                                @foreach($fournisseurs as $f)
                                    <option value="{{ $f->id }}">
                                        {{ $f->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('fournisseur'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('fournisseur') }}
                                </div>
                            @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('date_acquisition') ? 'has-danger' : '' }}">
                            <label>
                                Date d&apos;acquisition :
                            </label>
                            <input type="text" id="acquisition_date" class="form-control m-input m-input--air m-input--pill" name="date_acquisition" value="{{ Session('date_acquisition') ? Session('date_acquisition') : old('date_acquisition') }}">
                            @if ($errors->has('date_acquisition'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('date_acquisition') }}
                                </div>
                            @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('duree_guarantie') ? 'has-danger' : '' }}">
                            <label>
                                Durée de guarantie :
                            </label>
                            <input type="text" id="duree_guarantie" class="form-control m-input m-input--air m-input--pill" name="duree_guarantie" value="{{ Session('duree_guarantie') ? Session('duree_guarantie') : old('duree_guarantie') }}">
                            @if ($errors->has('duree_guarantie'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('duree_guarantie') }}
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

<div class="modal fade" id="Reforme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-top:100px;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal1" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Confirmer la réformation
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('reformMateriel') }}" method="get">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>ID:</label>
                            <input type="text" id="idd" name="id" class="form-control m-input m-input--air m-input--pill m-form--state" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label>Reference:</label>
                            <input id="seriall" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="serial" name="serial" value="{{ Session('serial') ? Session('serial') : old('serial') }}" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-gray"> Non </button>
                        <button type="submit" class="btn btn-primary"> Oui </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
<div class="modal fade" id="Affecter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-top:100px;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal1" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Affecter le matériel
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addMatAffectation') }}" method="get">
                    <div class="form-group m-form__group row">
                        <h6 class="modal-title" id="exampleModalLabel" >Matériel : </h6>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4">
                            <label>Référence:</label>
                            <input type="text" id="ida" name="serial" class="form-control m-input m-input--air m-input--pill m-form--state" readonly>
                        </div>
                    </div>
                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                    <div class="form-group m-form__group row">
                        <h6 class="modal-title" id="exampleModalLabel" >Utilisateur :</h6>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-4 {{ $errors->has('utilisateur_id') ? 'has-danger' : '' }}">
                            <label>
                                Matricule : 
                            </label>
                            <select class="form-control m-input m-input--air m-input--pill" id="utilisateur_id" name="utilisateur_id">
                                <option selected disabled>---Veuillez choisir le Matricule Utilisateur---</option>
                                @foreach($utilisateurs as $t)
                                    <option value="{{ $t->id }}">
                                        {{ $t->matricule }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('utilisateur_id'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('utilisateur_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('lastname') ? 'has-danger' : '' }}">
                            <label>
                                Nom:
                            </label>
                            <input id="lastnameI" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="lastname" placeholder="Veuillez choisir le matricule" readonly>
                            @if ($errors->has('lastname'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('lastname') }}
                                </div>
                            @endif
                        </div>
                        <div class="div col-lg-4 {{ $errors->has('firstname') ? 'has-danger' : '' }}">
                            <label>
                                Prenom:
                            </label>
                            <input id="firstnameI" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="firstname"  placeholder="Veuillez choisir le matricule" readonly>
                            @if ($errors->has('firstname'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('firstname') }}
                                </div>
                            @endif
                        </div>
                    </div>    
                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                    <div class="form-group m-form__group row">
                        <h6 class="modal-title" id="exampleModalLabel" >Affectation :</h6>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-4 {{ $errors->has('start_affectation') ? 'has-danger' : '' }}">
                            <label>
                                Date d&apos;affectation :
                            </label>
                            <input type="text" class="form-control m-input m-input--air m-input--pill" id="start_affectation" name="start_affectation" readonly placeholder="Entrer la date d'affectation">
                            @if ($errors->has('start_affectation'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('start_affectation') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-gray" data-dismiss="modal">
                            Annuler
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Affecter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  
<div class="modal fade" id="Panne" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-top:100px;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal1" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    L'ajout d'une panne
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <form action="{{ route('storePanne') }}" method="get">
                <div class="modal-body">
                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4">
                            <label>ID du Matériel:</label>
                            <input type="text" id="iD" name="id"  class="form-control m-input m-input--air m-input--pill m-form--state" readonly>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="div col-lg-4 {{ $errors->has('type') ? 'has-danger' : '' }}">
                            <label>
                                Type de panne:
                            </label>
                            <input id="type" type="text" class="form-control m-input m-input--air m-input--pill m-form--state" id="type" name="type" value="{{ Session('type') ? Session('type') : old('type') }}">
                            @if ($errors->has('type'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="div col-lg-4 {{ $errors->has('description') ? 'has-danger' : '' }}">
                            <label>
                                Description :
                            </label>
                            <input type="text" id="description" class="form-control m-input m-input--air m-input--pill" name="description" value="{{ Session('description') ? Session('description') : old('description') }}" >
                            @if ($errors->has('description'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 {{ $errors->has('soustraitant_id') ? 'has-danger' : '' }}">
                            <label>
                                Sous-traitant : 
                            </label>
                            <select class="form-control m-input m-input--air m-input--pill" id="soustraitant_id" name="soustraitant_id" id="exampleSelect1">
                                <option value="" selected disabled>
                                    Veuillez choisir le soustraitant
                                </option>
                                @foreach($soustraitants as $s)
                                    <option value="{{ $s->id }}">
                                        {{ $s->nom  }}&nbsp{{ $s->prenom }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('soustraitant_id'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('soustraitant_id') }}
                                </div>
                            @endif
                        </div>
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

           

@endsection('content')




@section('customJS')


<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/crud/datatables/extensions/buttons.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>

<script>
/* Getting infos from the table to the modal */
    $("#Edit").on('show.bs.modal',function(e){
        var id = $(e.relatedTarget).data('id');
        
        $.ajax({

          url : '/Material/editMaterial/'+id, //Here you will fetch records 
          type : 'get',
          dataType: "json" ,
            
          success : function(data){
              console.log(data);
            $('#ide').val(data['id']);
            $('#serial').val(data['serial']);
            $('#type').val(data['type_id']);
            $('#description').val(data['description']);
            $('#fournisseur').val(data['fournisseur_id']);
            $('#acquisition_date').val(data['date_acquisition']);
            $('#duree_guarantie').val(data['duree_guarantie']);

          }
        });
    });

    $("#Reforme").on('show.bs.modal',function(e){
        var id = $(e.relatedTarget).data('id');
        var serial = $(e.relatedTarget).data('serial');

        $('#idd').val(id);
        $('#seriall').val(serial);
    });
    
    // mochkil maaha hint kant katmchi :/ 
    // $("#Affecter").on('show.bs.modal',function(e){
    //     var id = $(e.relatedTarget).data('id');
    //     $('#ida').val(id);
    //     console.log('hello');
    // });

    function myFunction(identifier) { 
        $('#Affecter').modal('toggle'); 
            var id = $(identifier).data('id');
            $('#ida').val(id);
    }
    
    $('select[name="utilisateur_id"]').on('change', function(){
        var id = $(this).val();
        // var ref = $("#ida").val();
        // console.log(ref);
            $.ajax({
                url: '/Utilisateur/getInfos/'+id,
                type:"GET",
                dataType:"json",

                success:function(data) {
                    console.log(data);
                    $('#lastnameI').val(data['lastname']);
                    $('#firstnameI').val(data['firstname']);
                    // $('#ida').val(ref);
                }
                
            });
    });
        
    function Desaffecter(identifier) { 
        var id = $(identifier).data('id');
        console.log(id);
        $.ajax({
                url: '/Desaffectation/materiel/'+id,
                type:"GET",
                dataType:"json",

                success:function(data) {
                    console.log(data);
                }
                
            });
    }

    $("#Panne").on('show.bs.modal',function(e){
        var id = $(e.relatedTarget).data('id');
        
        $('#iD').val(id); 

    });

</script>


@endsection