@extends('layouts.master')
@section('title')
add affectation
@endsection
@section('content')


 <section id="form-repeater">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">L'ajout d'une affectation</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="repeater-default">
                      <div data-repeater-list="car">
                        <div data-repeater-item>
                          <form class="form row" action="storeAffectation" method="POST">
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="start_affectation">Debut affectation</label>
                              <br>
                              <input type="text" class="form-control" id="start_affectation"  name="start_affectation">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="end_affectation">Fin affectation</label>
                              <br>
                              <input type="text" class="form-control" id="end_affectation"  name="end_affectation">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="utilisateur_id" class="cursor-pointer">id de l'utilisateur</label>
                              <br>
                              <input type="text" class="form-control" id="utilisateur_id"  name="utilisateur_id">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="material_id">id du materiel</label>
                              <br>
                              <input class="form-control" type="text"  id="material_id" name="material_id">
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                            	<input type="hidden" name="_token" value="{{csrf_token()}}">
                              <input type="submit" class="btn btn-success" data-repeater-delete value="Ajouter"> <i class="ft-x"></i>
                            </div>
                          </form>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection('content')
