 
@extends('layouts.master')
@section('title')
add user
@endsection
@section('content')


  <section id="form-repeater">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">L'ajout d'un utilisateur</h4>
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
                          <form class="form row" action="storeUser" method="POST">
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="firstname">Nom</label>
                              <br>
                              <input type="text" class="form-control" id="firstname"  name="firstname">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="lastname">Prenom</label>
                              <br>
                              <input type="text" class="form-control" id="lastname"  name="lastname">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="recrutment_date" class="cursor-pointer">Date recrutement</label>
                              <br>
                              <input type="text" class="form-control" id="recrutment_date"  name="recrutment_date">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="retirment_date">Date de retraite</label>
                              <br>
                              <input class="form-control" type="text"  id="retirment_date" name="retirment_date">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="matricule">Matricule</label>
                              <br>
                              <input class="form-control" type="text"  id="matricule" name="matricule">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="entite">Entité</label>
                              <br>
                              <input class="form-control" type="text"  id="entite" name="entite">
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
        @endsection