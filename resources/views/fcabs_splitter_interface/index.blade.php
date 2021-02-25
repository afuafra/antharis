@extends("layout")
@section("fidpsInterface")



    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">FCAB Splitter Interface</h4>
                </div>


                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">FCAB Splitter Interface Search</button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal" data-target="#exampleModal">
                            +Add FCAB Splitter Interface
                        </button>
                    </form>
                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add FCAB Splitter Interface</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="splitterCreate" method="POST"
                                          action="{{route("fcab_splitter_interface.store")}}" oninput="fcab_splitter_device_id.value = 'SPLITTER' +'|'+ fcab_splitter_no.value +'|'+ fcab_id.selectedOptions[0].text">
                                        <div class="modal-body">
                                            <div id="success"></div>

                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">port</label>
                                                <input type="text" class="form-control" name="port"
                                                       id="port">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">fcab_splitter_device_id </label>
                                                <select class="form-control" id="fcab_splitter_id" name="fcab_splitter_id" >
                                                    @foreach($fcabsplitters as $fcabsplitter)
                                                        <option value="{{ $fcabsplitter->id }}">{{ $fcabsplitter->fcab_splitter_device_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">fcab_interface_id </label>
                                                <select class="form-control" id="fcab_interface_id" name="fcab_interface_id">
                                                    <option disabled selected>Select FCAB...</option>
                                                    @foreach($fcabinterfaces as $fcabinterface)
                                                        <option value="{{ $fcabinterface->id }}">{{ $fcabinterface->fcabs->fcab_device_id}}#PORT-{{ $fcabinterface->port}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("fcab_splitter_interface.index")}}" class="btn btn-secondary"
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
                                    <strong>Device Site</strong>
                                </th>
                                <th>
                                    <strong>FCAB Name</strong>
                                </th>
                                <th>
                                    <strong>Splitter Name</strong>
                                </th>
                                <th>
                                    <strong>Port</strong>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($splitterinterfaces as $splitterinterface)
                                <tr>
                                    <td>
                                        @if(isset($splitterinterface->splitter->fcab->devicesites->atollislandsite))
                                            {{$splitterinterface->splitter->fcab->devicesites->atollislandsite}}
                                        @else

                                        @endif

                                    </td>
                                    <td>
                                        {{$splitterinterface->splitter->fcab->fcab_no}}
                                    </td>
                                    <td>
{{--                                        <a href="" class="text-primary" data-bs-toggle="modal"--}}
{{--                                           data-bs-target="#routeView">--}}

                                        {{$splitterinterface->splitter->fcab_splitter_no}}
                                    </td>
                                    <td>
                                        {{$splitterinterface->port}}
                                    </td>
                                    <td>

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
                                {!! $splitterinterfaces->links() !!}
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

                'port': $("#port").val(),
                'fcab_splitter_id': $("#fcab_splitter_id").val(),
                'fcab_interface_id': $("#fcab_interface_id").val(),
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


