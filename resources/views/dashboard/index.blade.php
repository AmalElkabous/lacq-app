@extends('layouts.master')
@section('content')

<style>
    th{
        font-size: 11px;
    }
    td{
        font-size: 13px;
    }
    .btnAction{
        font-size: 8px;
    }
</style>
<!----------------------------------------- modal foem ------------------------------------------------>
@if($message=Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    @if($message=Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{ $message}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="card " style=" background-color: rgb(255, 255, 255)">
        <div class="card-header d-inline ">{{ __('List des analyse en cours') }}
            <select id="stateFilter" class="ml-3 d-none  form-control col-2">
                
            </select>
            <a class="btn btn-success btn-sm float-right d-inline " href="{{url("/analyse")}}">Analyse</a> 
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm ">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center text-nowrap">#</th>
                                <th class="text-center text-nowrap">Code commande</th>
                                <th class="text-center text-nowrap">Matrice</th>
                                <th class="text-center text-nowrap">Menu</th>
                                <th class="text-center text-nowrap">Date réception</th>
                                <th class="text-center text-nowrap">Réf client</th>
                                <th class="text-center text-nowrap">Commercial</th>
                                <th class="text-center text-nowrap">Delai labo</th>
                                @if(Auth::user()->role_id <= 2)
                                    <th class="text-center text-nowrap">Delai client</th>
                                    <th class="text-center text-nowrap">Delai reel</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($listCommandes as $commande)
                        @if($commande->tempLabo == 2)
                            <tr class="table-warning">
                        @endif
                        @if($commande->tempLabo < 2)
                            <tr class="table-danger">
                        @endif
                        @if($commande->tempLabo > 2)
                            <tr class="table-success">
                        @endif
                        
                            <tr class="table-success">
                                <td class="text-center text-nowrap">{{ $commande->id }}</td>
                                <td class="text-center"><span class="badge badge-success">{{ $commande->code_commande }}</span></td>
                                <td class="text-center text-nowrap"><span class="badge badge-primary">{{ $commande->matrice }}</span></td>
                                <td class="text-center text-nowrap">{{ $commande->menu }}</td>
                                <td class="text-center text-nowrap">{{ $commande->date_reception }}</td>
                                <td class="text-center text-nowrap">{{ $commande->ref_client }}</td>
                                <td class="text-center text-nowrap">{{ $commande->commercial }}</td>
                                <td class="text-center text-nowrap">{{ $commande->tempLabo }}</td>
                                @if(Auth::user()->role_id <= 2)
                                    <td class="text-center text-nowrap">{{ $commande->tempClient }}</td>
                                    <td class="text-center text-nowrap">{{ $commande->tempReel }}</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<div class="d-flex justify-content-center mt-2">
    {!! $listCommandes->links("pagination::bootstrap-4") !!}
</div>

  

@endsection