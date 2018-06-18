@extends('admin.admin')

@section('admin_content')
    <h2 class="col-12 titre_dashboard_admin p-2">Gestion des utilisateurs</h2>
    <div class="m-3">
        <table class="table my-datatable table-sm text-center">
            <thead class="elegant-color white-text">
            <th>Pseudo</th>
            <th>Email</th>
            <th>Actif</th>
            <th>Nombre de recettes</th>
            <th>Inscrit depuis</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->pseudo}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->actif ? "Oui" : "Non"}}</td>
                    <td>{{$user->recettes()->count()}}</td>
                    <td>{{$user->created_at->format("d/m/Y")}}</td>
                    <td>
                        <ul class="list-unstyled">
                            @if($user->actif)
                                <li>
                                    <form method="POST" action="{{route('admin.gestion.utilisateurs.desactiver.post',[
                                        "user" => $user->id
                                    ])}}">
                                        @csrf
                                        <button class="btn btn-sm btn-block btn-outline-grey hoverable my-2" type="submit" title="Désactiver">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <form method="POST" action="{{route('admin.gestion.utilisateurs.activer.post', [
                                        "user" => $user->id
                                    ])}}">
                                        @csrf
                                        <button class="btn btn-sm btn-block btn-outline-grey hoverable my-2" type="submit" title="Activer">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>
                                </li>
                            @endif
                            <li>
                                <form method="POST" action="{{route('admin.gestion.utilisateurs.supprimer.post', [
                                        "user" => $user
                                    ])}}">
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