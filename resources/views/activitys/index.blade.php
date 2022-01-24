@extends('layouts.master')
@section('content')
    <style>
        th {
            font-size: 11px;
        }

        td {
            font-size: 13px;
        }

        .btnAction {
            font-size: 8px;
        }

    </style>
    <!------------------------------------------------------------------------->

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card" style="background-color: rgb(255, 255, 255)">
        <div class="card-header">{{ __('La liste des Menus') }}
            <input id="searchInput" type="text" class="ml-3 d-inline  form-control form-control-sm col-2">
        </div>
        <div class="card-body">
            <div class="table-responsive-sm ">
                <table class="table table-striped table-sm ">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">log_name</th>
                            <th class="text-center">description</th>
                            <th class="text-center">subject_type</th>
                            <th class="text-center">causer_type</th>
                            <th class="text-center">causer_id</th>
                            <th class="text-center">Couser Name</th>
                            <th class="text-center">created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Activitys as $activity)
                            <tr>
                                <td class="text-center">{{ $activity->id }}</td>
                                <td class="text-center"><span
                                        class="badge badge-success">{{ $activity->log_name }}</span></td>
                                <td class="text-center">{{ $activity->description }}</td>
                                <td class="text-center">{{ $activity->subject_type }}</td>
                                <td class="text-center">{{ $activity->causer_type }}</td>
                                <td class="text-center">{{ $activity->causer_id }}</td>
                                <td class="text-center">{{ $activity->name }} {{ $activity->last_name }}</td>
                                <td class="text-center">{{ $activity->created_at }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @if ($Activitys instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="d-flex justify-content-center mt-2">
                    {!! $Activitys->links('pagination::bootstrap-4') !!}
                </div>
            @endif
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        //_method:PATCH
        /*$(".editBtn").click(function(){
            idMenu = $(this).parent().parent().parent().children("#id").html();
            matrice = $(this).parent().parent().parent().children("#matrice").children("span").html();
            name = $(this).parent().parent().parent().children("#name").html();
            prix_ht = $(this).parent().parent().parent().children("#prix_ht").html();
            prix_supv = $(this).parent().parent().parent().children("#prix_supv").html();
            $("#modalModal")[0].reset();
            $("#ModalTitle").text("Modifier");
            $('#modalModal').append("<input id='method' type='hidden' name='_method' value='PATCH'/>");
            $('#modalModal').attr('action', '{{ url('/menus') }}'+"/"+idMenu);
            $("#matrice option:contains("+matrice+")").attr('selected', 'selected');

            $("#name").val(name);
            $("#prix_ht").val(prix_ht);
            $("#prix_supv").val(prix_supv);        
            btnSaveRole = "PATCH";
            $('#modalEditMenu').modal('show');
          });*/
        /*
        function addMenuBlade(){
            $("#method").remove();
            $("#modalModal")[0].reset();
            $("#ModalTitle").text("Ajouter ");
            $('#modalModal').attr('action', '{{ url('/menus') }}');
            $('#modalEditMenu').modal('show');

        }
        function openEditMenuModal(id){
            $("#modalModal")[0].reset();
            $("#ModalTitle").text("Modifier");
            $('#modalModal').append("<input id='method' type='hidden' name='_method' value='PATCH'/>"); 
            var user_id = id;
            $.get('/menus/' + user_id +'/edit', function (data) {
                data = JSON.parse(data);
                $('#modalModal').attr('action', '{{ url('/menus') }}'+"/"+data.id);
                $("#name").val(data.name);
                $("#matrice").val(data.matrice_id);
                $("#prix_ht").val(data.prix_ht);
                $("#prix_supv").val(data.prix_supv);
                
            })
            $('#modalEditMenu').modal('show');
        }
        document.getElementById("searchInput").addEventListener("keyup", e => {
          $('table').preloader({text:'Loading'})
          $.ajax({
              url: "{{ url('/menus/search') }}",
              type:"POST",
              data:{
                  "_token": "{{ csrf_token() }}",
                  buffer : $("#searchInput").val(),
              },
              success:function(response){
                 
                  $(".card-body").html($(response).find( ".card-body" ).html())
                  $('table').preloader('remove')
              },
          });
          })*/
    </script>
@endsection
