@extends('layouts.app')

@section('content')
    <div class="container grey lighten-5 h-100">
        <div class="row">
            <h2 class="col-12 red white-text darken-3  p-2">Mes recettes</h2>
            <div class="m-3">
                <table class="table my-datatable table-sm text-center" id="recettes_table">
                    <thead class="elegant-color white-text">
                    <tr>
                        <th>Photo</th>
                        <th>Titre</th>
                        <th>Difficulté</th>
                        <th>Prix</th>
                        <th>Nombre d'étapes</th>
                        <th>Catégorie</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mes_recettes as $recette)
                        <tr>
                            <td width="10%"><img src="{{url("storage/$recette->photo")}}" class="img-fluid"></td>
                            <td>{{ucfirst($recette->titre)}}</td>
                            <td>{{ucfirst($recette->difficulte)}}</td>
                            <td>{{ucfirst($recette->prix)}}</td>
                            <td>{{$recette->etapes()->count()}}</td>
                            <td>{{ucfirst($recette->categorie()->first()->libelle_categorie)}}</td>
                            <td>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('recettes.consulter', ['recette' => $recette ])}}"
                                           class="btn btn-sm btn-block btn-outline-grey hoverable my-2"
                                           title="Consulter">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route("mes_recettes.supprimer.post", [
                                    "recette" => $recette
                                ]) }}">
                                            @csrf
                                            <button class="btn btn-sm btn-block btn-outline-grey hoverable my-2"
                                                    type="submit" title="Supprimer">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
