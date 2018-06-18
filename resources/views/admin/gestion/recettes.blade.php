@extends('admin.admin')

@section('admin_content')
    <h2 class="col-12 titre_dashboard_admin p-2">Gestion des recettes</h2>
    <div class="m-5">
        <table class="table my-datatable table-sm text-center" id="recettes_table">
            <thead class="elegant-color white-text">
            <tr>
                <th>Photo</th>
                <th>Titre</th>
                <th>Difficulté</th>
                <th>Prix</th>
                <th>Nombre d'étapes</th>
                <th>Catégorie</th>
                <th>Auteur</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Recette::all() as $recette)
                <tr>
                    <td width="10%"><img src="{{url("storage/$recette->photo")}}" class="img-fluid"></td>
                    <td>{{ucfirst($recette->titre)}}</td>
                    <td>{{ucfirst($recette->difficulte)}}</td>
                    <td>{{ucfirst($recette->prix)}}</td>
                    <td>{{$recette->etapes()->count()}}</td>
                    <td>{{ucfirst($recette->categorie()->first()->libelle_categorie)}}</td>
                    <td>{{ucfirst($recette->auteur()->first()->pseudo)}}</td>
                    <td>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{route('recettes.consulter', ['recette' => $recette ])}}" class="btn btn-sm btn-block btn-outline-grey hoverable my-2"
                                title="Consulter">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route("admin.gestion.recettes.supprimer.post", [
                                    "recette" => $recette
                                ]) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-block btn-outline-grey hoverable my-2" type="submit" title="Supprimer">
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
@endsection
