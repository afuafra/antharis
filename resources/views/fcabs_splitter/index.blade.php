@extends("layout")
@section("fidpsInterface")



    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">FCAB Splitter</h4>
                </div>


                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">FCAB Splitter Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal" data-target="#exampleModal">
                            +Add FCAB Splitter
                        </button>
                    </form>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add FCAB Splitter</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="splitterCreate" method="POST"
                                          action="{{route("fcabs_splitter.store")}}" oninput="fcab_splitter_device_id.value = 'SPLITTER' +'|'+ fcab_splitter_no.value +'|'+ fcab_id.selectedOptions[0].text">


                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">fcab splitter no</label>
                                                <input type="text" class="form-control" name="fcab_splitter_no"
                                                       id="fcab_splitter_no">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">FCAB Device Name </label>
                                                <select class="form-control" id="fcab_id" name="fcab_id"  >
                                                    <option disabled selected>Select FCAB...</option>
                                                    @foreach($fcab_list as $fcab_li)
                                                        <option value="{{ $fcab_li->id }}">{{ $fcab_li->fcab_device_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">fcab_splitter_device_id</label>
                                                <input type="text" class="form-control" name="fcab_splitter_device_id"
                                                       id="fcab_splitter_device_id">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("fcabs_splitter.index")}}" class="btn btn-secondary"
                                               data-bs-dismiss="modal">back</a>
                                            <input name="submit" type="submit" class="btn btn-primary">
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
                            <tr>
                                <th>
                                    <strong>Splitter No</strong>
                                </th>
                                <th>
                                    <strong>FCAB Splitter Device Name</strong>
                                </th>
                                <th>
                                    <strong>FCAB Device Name</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($splitters as $splitter)
                                {{--                            @include('services.service_item',['service'=>$service])--}}
                                <tr>

                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                           data-bs-target="#routeView">

                                        {{$splitter->fcab_splitter_no}}
                                    </td>
                                    <td>
                                        {{$splitter->fcab_splitter_device_id}}
                                    </td>
                                    <td>
                                        {{$splitter->fcab->fcab_device_id}}

                                    </td>
                                </tr>
                            @endforeach()
                            </tbody>
                        </table>

                        <div class="card-footer">
                            <div class="stats">
                                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                            </div>
                        </div>



                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {!! $splitters->links() !!}
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>


    </div>








@endsection
@push('scripts')
    <script>

        var form = $("#splitterCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'fcab_splitter_no': $("#fcab_splitter_no").val(),
                'fcab_id': $("#fcab_id").val(),
                'fcab_splitter_device_id': $("#fcab_splitter_device_id").val(),
                '_token': $("#csrf").val()

            }

            $.post(url, formData, function (data) {


                $("#success").text('Yey!! Service Created')
                setTimeout(() => {

                    location.reload()

                }, 150)


            }).fail(function (error) {
                console.error('ERROR', error.responseJSON.errors)

            })


            e.preventDefault();


        });



    </script>
@endpush


