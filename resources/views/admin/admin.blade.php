@extends('layouts.app')

@section('content')
    <div class="container dashboard_admin h-100 p-0">
        <div class="menu_admin">
            <h4 class="text-center">Gestion</h4>
            <ul class="text-center list-unstyled">
                <li class=""><a href="{{route('admin.gestion.utilisateurs')}}">Utilisateurs</a></li>
                <li class=""><a href="{{route('admin.gestion.categories')}}">Catégories</a></li>
                <li class=""><a href="{{route('admin.gestion.recettes')}}">Recettes</a></li>
                <li class=""><a href="{{route('admin.gestion.ingredients')}}">Ingrédients</a></li>
                <li class=""><hr></li>
                <li class=""><a href="{{route('admin.statistiques')}}">Statistiques</a></li>
            </ul>
        </div>
        <div>
            @yield('admin_content')
        </div>
    </div>
@endsection