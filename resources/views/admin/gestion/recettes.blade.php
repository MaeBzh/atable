@extends('admin.admin')

@section('admin_content')
    <h2 class="col-12 titre_dashboard_admin p-2">Gestion des recettes</h2>
    <div class="m-5">
        <table class="table text-center" id="recettes_table">
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
            @foreach($recettes as $recette)
                <tr>
                    <td width="10%"><img src="{{url("storage/$recette->photo")}}" class="img-fluid"></td>
                    <td>{{ucfirst($recette->titre)}}</td>
                    <td>{{ucfirst($recette->difficulte)}}</td>
                    <td>{{ucfirst($recette->prix)}}</td>
                    <td>{{$recette->etapes()->count()}}</td>
                    <td>{{ucfirst($recette->categorie()->first()->libelle_categorie)}}</td>
                    <td>{{ucfirst($recette->auteur()->first()->pseudo)}}</td>
                    <td>
                        <form action="{{ route("admin.gestion.recettes.supprimer.post", [
                            "recette" => $recette
                        ]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-red btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
