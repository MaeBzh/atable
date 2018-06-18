@extends('admin.admin')

@section('admin_content')
    <div class="container">
        <div class="row titre_dashboard_admin px-2">
            <h2 class="col-10 mt-2">
                Gestion des ingrédients
            </h2>
            <a class="text-center col-2 btn btn-sm btn-block btn-outline-white text-white hoverable my-2 pb-1 pt-2"
               href="{{route("admin.gestion.ingredients.ajout")}}">
                Nouvel ingrédient
            </a>
        </div>
    </div>


    <div class="m-3">
        <table class="table my-datatable table-sm text-center">
            <thead class="elegant-color white-text">
            <th>Ingrédient</th>
            <th>Nombre de recettes</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach(\App\Ingredient::all() as $ingredient)
                <tr>
                    <td>{{ucfirst($ingredient->nom)}}</td>
                    <td>
                        {{ $ingredient->recettes()->count() }}
                    </td>

                    <td>
                        <form method="POST"
                              action="{{route('admin.gestion.ingredients.supprimer.post', ["ingredient" => $ingredient])}}" >
                            @csrf
                            <button class="btn btn-sm btn-block btn-outline-grey hoverable my-2" type="submit"
                            @if($ingredient->recettes()->exists()) disabled @endif title="Supprimer"
                            >
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