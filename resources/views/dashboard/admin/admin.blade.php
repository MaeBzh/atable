@extends('layouts.app')

@section('content')
    <div class="container dashboard_admin h-100 p-0">
        <div class="menu_admin">
            <ul class="pt-4 pl-0">
                <h4 class="pl-3">Gestion</h4>
                <li class="pl-5"><a href="{{route('admin.gestion.utilisateurs.get')}}">Utilisateurs</a></li>
                <li class="pl-5"><a href="{{route('admin.gestion.categories.get')}}">Catégories</a></li>
                <li class="pl-5"><a href="{{route('admin.gestion.recettes.get')}}">Recettes</a></li>
                <li class="pl-5"><a href="{{route('admin.gestion.ingredients.get')}}">Ingrédients</a></li>
            </ul>
            <ul class="pl-0">
                <h4 class="pl-3">Statistiques</h4>
                <li class="pl-5"><a href="{{route('admin.stats.utilisateurs.get')}}">Utilisateurs</a></li>
                <li class="pl-5"><a href="{{route('admin.stats.recettes.get')}}">Recettes</a></li>
            </ul>
        </div>
        <div>
            @yield('admin_content')
        </div>
    </div>
@endsection