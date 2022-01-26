<table class="table table-striped table-sm ">
    <thead class="thead-light">
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Lieu</th>

            @if (Auth::user()->role_id <= 2)
                <th class="text-right pr-4">Actions</th>
            @endif

        </tr>
    </thead>
    <tbody>
        @foreach ($listLieus as $lieu)
            <tr>
                <td class="text-center" id="id"><span class="badge badge-success">{{ $lieu->id }}</span>
                </td>
                <td class="text-center" id="name">{{ $lieu->lieu }}</td>
                @if (Auth::user()->role_id <= 2)
                    <td class="text-right">
                        <div class="d-inline p-2">
                            <button class="btn btn-primary btn-sm btnAction" onclick="openEditModale(this)" >
                                <i
                                    class="fa fa-edit">
                                </i>
                            </button>
                        </div>
                        <div class="d-inline p-2">
                            <button  class="btn btn-danger btn-sm btnAction" onclick="remove(this)">
                                <i class="fa fa-trash" aria-hidden="true">
                            </i></button>
                        </div>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center mt-2">
    {!! $listLieus->links('pagination::bootstrap-4') !!}
</div>