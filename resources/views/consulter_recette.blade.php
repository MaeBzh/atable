@extends('layouts.app')

@section('content')
    <section class="container grey fond_recette lighten-5 h-100">
        <div class="row fiche_recette w-75">
            <div class="col-1"></div>
            <div class="col-2 elegant-color">
                <div>
                    <img src="{{asset("storage/".$recette->photo)}}" class="img-fluid pt-5 pb-3"
                         alt="">
                </div>
                <div class="ingredients">
                    <h2 class="white-text">Ingrédients <br>pour {{$recette->nb_pers}} personnes</h2>
                    <ul class="white-text pl-3 text-left">
                        @foreach( $recette->ingredients()->get() as $ingredient)
                            <div class="ingredient">
                                <h2>{{$ingredient->nom}}</h2>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <h1 class="titre_recette py-3">{{$recette->titre}}</h1>
                <div class="row cuisson_etc white-text px-0">
                    <div class="col-3">
                        <h3>Cuisson</h3>
                        <span>blablabla</span>
                    </div>
                    <div class="col-3">
                        <h3>Préparation</h3>
                        <span>blablabla</span>
                    </div>
                    <div class="col-3">
                        <h3>Coût</h3>
                        <span>blablabla</span>
                    </div>
                    <div class="col-3">
                        <h3>Difficulté</h3>
                        <span>blablabla</span>
                    </div>
                </div>

                @foreach( $recette->etapes()->get() as $etape)
                    <div class="etape">
                        <h2>{{$etape->titre}}</h2>
                        <p>{{$etape->description}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection