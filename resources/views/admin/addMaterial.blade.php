@extends('layouts.master')
@section('title')
add material
@endsection
@section('content')



 <section id="form-repeater">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">L'ajout d'un materiel</h4>
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
                          <form class="form row" action="store" method="POST">
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="serial">Serial</label>
                              <br>
                              <input type="text" class="form-control" id="serial"  name="serial">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="label">libelle</label>
                              <br>
                              <input type="text" class="form-control" id="label" " name="label">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="description" class="cursor-pointer">description</label>
                              <br>
                              <input type="text" class="form-control" id="description"  name="description">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="tel-input">durée de guarantie</label>
                              <br>
                              <input class="form-control" type="text"  id="duree_guarantie" name="duree_guarantie">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="date_acquisition">date d'acquisition</label>
                              <br>
                              <input class="form-control" type="text"  id="date_acquisition" name="date_acquisition">
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
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




 