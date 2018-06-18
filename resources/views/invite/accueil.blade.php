@extends('layouts.app')
@section('content')

    <section class="container elegant-color h-100">
        <a href="{{route("recettes.consulter", ['id' => $recette_du_jour->recette->id])}}"
           class="recette_jour col-9 view overlay zoom z-depth-2"
           onmouseover="$('#infos_supp').show('slow');" onmouseout="$('#infos_supp').hide('slow')">
            <img src="{{asset("storage/".$recette_du_jour->recette->photo)}}" class="img-fluid"
                 alt="Sample image with waves effect.">
            <div class="mask flex-center waves-effect waves-light">
            </div>
            <div class="texte_recette_jour">
                <h2>Recette du jour</h2>
                <h4>{{ucfirst($recette_du_jour->recette->titre)}}</h4>
                <p id="infos_supp" style="display: none">Ajouté par
                    <span class="red-text">{{ ucfirst($recette_du_jour->recette->auteur()->first()->pseudo) }}</span>
                </p>
            </div>
        </a>
    </section>
@endsection