@extends('layouts.app')

@section('content')
    <div class="container elegant-color p-5 h-100">
        <!-- Card -->
        <h2 class="white-text"> Résultat de la recherche </h2>
        <hr class="white">
        <div id="resultat_recherche">
            <div class="card pr-2 my-3">
                <div class="align-items-center row">
                    <div class="col-12">
                        <!-- Card content -->
                        <div class="card-body p-2 text-center">
                            <div class="card-text">
                                <h2><i class="fa fa-spinner fa-pulse pr-1"></i> Chargement des résultats en cours</h2>
                                <form id="formSearchAjax" action="{{ route("recettes.rechercher.ajax") }}" method="GET">
                                    <input type="hidden" name="search" value="{{$search}}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection