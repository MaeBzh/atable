@extends('admin.admin')

@section('admin_content')
    <div class="container">
        <div class="row titre_dashboard_admin px-2">
            <h2 class="col-10 mt-2">
                Gestion des catégories
            </h2>
            <a class="text-center col-2 btn-sm btn-block btn-outline-white text-white hoverable my-2 pb-1 pt-2" href="{{route("admin.gestion.categorie.ajout")}}">
                Nouvelle catégorie
            </a>
        </div>
    </div>


    <div class="m-3">
        <table class="table my-datatable">
            <thead class="elegant-color white-text">
            <th>Catégorie</th>
            <th>catégorie parent</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{$categorie->libelle_categorie}}</td>
                    @if($categorie->categoriePrincipale()->first() != null)
                        <td>{{$categorie->categoriePrincipale()->first()->libelle_categorie}}</td>
                    @else
                        <td></td>
                    @endif
                    <td>
                        <form method="POST" action="{{route('admin.gestion.categories.supprimer.post', [
                                        "categorie" => $categorie
                                    ])}}">
                            @csrf
                            <button class="btn-sm btn-block btn-outline-grey hoverable my-2" type="submit"><i
                                        class="fa fa-trash pr-1"></i>Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection