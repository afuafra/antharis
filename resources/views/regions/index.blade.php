@extends("layout")
@section("services")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Regions</h4>
                </div>

                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">Region Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal" data-target="#exampleModal">
                            +Add Region
                        </button>
                    </form>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Regions</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="success"></div>

                                    <form class="container-fluid" id="regionCreate" method="POST"
                                          action="{{route("regions.store")}}">

                                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                        <div class="mb-3">
                                            <label class="form-label">region_name</label>
                                            <input type="text" class="form-control" name="region_name" id="region_name">
                                        </div>

                                        <div class="modal-footer">
                                            <a href="{{route("regions.index")}}" class="btn btn-secondary"
                                               data-bs-dismiss="modal">back</a>
                                            <input name="submit" type="submit" class="btn btn-primary"></input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                <strong>ID</strong>
                            </th>
                            <th>
                                <strong>Region</strong>
                            </th>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach ($regions as $region)
                                    <td>
                                        {{$region->id}}
                                    </td>
                                    <td>
                                        {{$region->region_name}}
                                    </td>
                            </tr>
                            @endforeach()


                            </tbody>
                        </table>

                        <nav aria-label="">
                            <ul class="">
                                {!! $regions->links() !!}
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>


        @endsection
        @push('scripts')
            <script>
                var form = $("#regionCreate")
                var method = form.attr('method')
                var url = form.attr('action')


                form.submit(function (e) {


                    var formData = {

                        'region_name': $("#region_name").val(),
                        '_token': $("#csrf").val()

                    }


                    $.post(url, formData, function (data) {



                        $("#success").text('Yey!! Device Site Created')
                        setTimeout(() => {

                            location.reload()

                        }, 300)
                        location.reload()

                    }).fail(function (error) {

                        console.error('ERROR', error.responseJSON.errors)

                    })


                    e.preventDefault();


                });

            </script>
    @endpush


