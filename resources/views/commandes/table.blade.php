<table class="table table-striped table-sm ">
    <thead class="thead-light">
        <tr>
            <th class="text-center text-nowrap">#</th>
            <th class="text-center text-nowrap">Code commande</th>
            <th class="text-center text-nowrap">Date réception</th>
            <th class="text-center text-nowrap">Client</th>
            <th class="text-center text-nowrap">Réf client</th>
            <th class="text-center pr-4 text-nowrap">Commercial</th>
            <th class="text-center pr-4 text-nowrap">Menu</th>
            <th class="text-center pr-4 text-nowrap">Nature</th>
            <th class="text-center pr-4 text-nowrap">Culture</th>
            <th class="text-center pr-4 text-nowrap">Varite</th>
            <th class="text-center pr-4 text-nowrap">GPS1</th>
            <th class="text-center pr-4 text-nowrap">GPS2</th>
            <th class="text-center pr-4 text-nowrap">Horizon</th>
            <th class="text-center pr-4 text-nowrap">Temperature</th>
            <th class="text-center pr-4 text-nowrap">Date prélevement</th>
            <th class="text-center pr-4 text-nowrap">Quantité</th>
            <th class="text-center pr-4">Etat</th>
            <th class="text-center pr-4">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listCommandes as $commande)
            <tr>
                <td id="id" class="text-center text-nowrap">{{ $commande->id }}</td>
                <td class="text-center"><span class="badge badge-success">{{ $commande->code_commande }}</span></td>
                <td class="text-center text-nowrap">{{ $commande->date_reception }}</td>
                <td class="text-center text-nowrap">{{ $commande->client }}</td>
                <td class="text-center text-nowrap">{{ $commande->ref_client }}</td>
                <td class="text-center text-nowrap">{{ $commande->commercial }}</td>
                <td class="text-center text-nowrap">{{ $commande->menu }}</td>
                <td class="text-center text-nowrap">{{ $commande->nature }}</td>
                <td class="text-center text-nowrap">{{ $commande->culture }}</td>
                <td class="text-center text-nowrap">{{ $commande->varite }}</td>
                <td class="text-center text-nowrap">{{ $commande->gps_1 }}</td>
                <td class="text-center text-nowrap">{{ $commande->gps_2 }}</td>
                <td class="text-center text-nowrap">
                    @if (!empty($commande->horizon_2))
                        {{ $commande->horizon_1 }} --> {{ $commande->horizon_2 }}
                    @else
                        _
                    @endif
                </td>
                <td class="text-center text-nowrap">{{ $commande->temperature }}</td>
                <td class="text-center text-nowrap">{{ $commande->date_prelevement }}</td>
                <td class="text-center text-nowrap">{{ $commande->quantite }}</td>
                @if ($commande->state == 'Valid')
                    <td class="text-center text-nowrap"> <span
                            class="badge badge-success">{{ $commande->state }}</td>
                @endif
                @if ($commande->state == 'Rejete')
                    <td class="text-center text-nowrap"> <span
                            class="badge badge-danger">{{ $commande->state }}</td>
                @endif
                @if ($commande->state == 'En cours')
                    <td class="text-center text-nowrap"> <span
                            class="badge badge-warning">{{ $commande->state }}</td>
                @endif
                <td class="text-right text-nowrap">
                    @if (Auth::user()->role_id <= 2)
                        @if ($commande->state != 'Valid')
                            <div class="d-inline p-0">
                                <button class="btn btn-success btn-sm btnAction"
                                    onclick="validerCommande({{ $commande->id }})"><i
                                        class="fa fa-check" aria-hidden="true"></i></button>
                            </div>
                        @endif
                        @if ($commande->state != 'Rejete')
                            <div class="d-inline p-0">
                                <button class="btn btn-warning btn-sm btnAction"
                                    onclick="openModalRejeterCommande({{ $commande->id }})"><i
                                        class="fa fa-undo" aria-hidden="true"></i></button>
                            </div>
                        @endif
                        @if ($commande->state == 'Rejete')
                            <div class="d-inline p-0">
                                <button class="btn btn-warning btn-sm btnAction"
                                    onclick="showCommantaire({{ $commande->id }})"><i
                                        class="fa fa-exclamation-triangle" aria-hidden="true"></i></button>
                            </div>
                        @endif
                    @endif
                    <div class="d-inline p-0">
                        <button class="btn btn-primary btn-sm btnAction"
                            onclick="openEditCommandeModal({{ $commande->id }})"><i
                                class="fa fa-edit"></i></button>
                    </div>
                    @if (Auth::user()->role_id == 1)
                    <div class="d-inline p-2">
                        <button  class="btn btn-danger btn-sm btnAction" onclick="remove(this)">
                            <i class="fa fa-trash" aria-hidden="true">
                        </i></button>
                    </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($listCommandes instanceof \Illuminate\Pagination\LengthAwarePaginator)
<div class="d-flex justify-content-center mt-2">
    
    {!! $listCommandes->links('pagination::bootstrap-4') !!}
</div>
@endif