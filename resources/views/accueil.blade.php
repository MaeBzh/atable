@extends('layouts.app')
@section('content')

    <section class="container elegant-color h-100">
        <a href="" class="recette_jour col-9 view overlay zoom z-depth-2">
            <img src="{{asset("img/tagliatelles_au_gorgonzola.jpg")}}" class="img-fluid"
                 alt="Sample image with waves effect.">
            <div class="mask flex-center waves-effect waves-light">
            </div>
            <div class="texte_recette_jour">
                <h2>Recette du jour</h2>
                <p>Tagliatelles au gorgonzola</p>
            </div>
        </a>
    </section>
@endsection