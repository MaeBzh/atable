@extends('admin.admin')

@section('admin_content')
    <h2 class="col-12 titre_dashboard_admin p-2">Liste des utilisateurs</h2>
    <div class="m-3">
        <table class="table my-datatable">
            <thead class="elegant-color white-text">
            <th>Pseudo</th>
            <th>Email</th>
            <th>Actif</th>
            <th>Inscrit depuis</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->pseudo}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->actif ? "Oui" : "Non"}}</td>
                    <td>{{$user->created_at->format("d/m/Y")}}</td>
                    <td>
                        <ul class="list-unstyled">
                            @if($user->actif)
                                <li>
                                    <form method="POST" action="{{route('admin.gestion.utilisateurs.desactiver.post',[
                                        "user" => $user->id
                                    ])}}">
                                        @csrf
                                        <button class="btn-sm btn-block btn-outline-grey hoverable my-2" type="submit"><i class="fa fa-times pr-1"></i>Désactiver</button>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <form method="POST" action="{{route('admin.gestion.utilisateurs.activer.post', [
                                        "user" => $user->id
                                    ])}}">
                                        @csrf
                                        <button class="btn-sm btn-block btn-outline-grey hoverable my-2" type="submit"><i class="fa fa-check pr-1"></i>Activer</button>
                                    </form>
                                </li>
                            @endif
                            <li>
                                <form method="POST" action="{{route('admin.gestion.utilisateurs.supprimer.post', [
                                        "user" => $user
                                    ])}}">
                                    @csrf
                                    <button class="btn-sm btn-block btn-outline-grey hoverable my-2" type="submit"><i class="fa fa-trash pr-1"></i>Supprimer</button>
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