@extends("layout")
@section("fidpsInterface")



    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">FIDP Splitter Interface</h4>
                </div>

                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">FIDP Splitter Interface</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal" data-target="#exampleModal">
                            +Add FIDP Splitter Interface
                        </button>
                    </form>
                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add FIDP Splitter Interface</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="splitterCreate" method="POST"
                                          action="{{route("fidp_splitter_interfaces.store")}}" oninput="fcab_splitter_device_id.value = 'SPLITTER' +'|'+ fcab_splitter_no.value +'|'+ fcab_id.selectedOptions[0].text">


                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">
                                            <div class="mb-3">
                                                <label class="form-label">fidp_splitter_id</label>
                                                <select class="form-control" id="fidp_splitter_id" name="fidp_splitter_id"  >
                                                    <option disabled selected>Select FIDP Splitter Device...</option>
                                                    @foreach($splitters as $splitter)
                                                        <option value="{{ $splitter->id }}">{{ $splitter->fidp_splitter_device_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">port</label>
                                                <input type="text" class="form-control" name="port"
                                                       id="port">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">fidps_interface_id</label>
                                                <select class="form-control" id="fidps_interface_id" name="fidps_interface_id" >
                                                    <option disabled selected>Select FIDP Interface...</option>
                                                    @foreach($fidpinterfaces as $fidpinterface)
                                                        <option value="{{ $fidpinterface->id }}">{{ $fidpinterface->fidps->fidp_device_id}}#{{ $fidpinterface->terminal_side}}/{{ $fidpinterface->port}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("fidp_splitter_interfaces.index")}}" class="btn btn-secondary"
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
                                    <strong>FIDP Name</strong>
                                </th>
                                <th>
                                    <strong>Splitter Name</strong>
                                </th>
                                <th>
                                    <strong>Terminal Side</strong>
                                </th>
                                <th>
                                    <strong>Port</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($splittersinterfaces as $splittersinterface)
                                {{--                            @include('services.service_item',['service'=>$service])--}}
                                <tr>
                                    <td>
                                        @if(isset($splittersinterface->splitter->fidp->devicesites->atollislandsite))
                                            {{$splittersinterface->splitter->fidp->devicesites->atollislandsite}}
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($splittersinterface->splitter->fidp->fidp_no))
                                            {{$splittersinterface->splitter->fidp->fidp_no}}
                                        @else
                                        @endif
                                    </td>
                                    <td>
{{--                                        <a href="" class="text-primary" data-bs-toggle="modal"--}}
{{--                                           data-bs-target="#routeView">--}}

                                        {{$splittersinterface->splitter->fidp_splitter_no}}
                                    </td>
                                    <td>
                                        {{$splittersinterface->port}}
                                    </td>
                                    <td>
                                        @if(isset($splittersinterface->fidpsinterfaces->terminal_side))
                                            {{$splittersinterface->fidpsinterfaces->terminal_side}}
                                        @else
                                        @endif

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
                                {!! $splittersinterfaces->links() !!}
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

                'fidp_splitter_id': $("#fidp_splitter_id").val(),
                'port': $("#port").val(),
                'fidps_interface_id': $("#fidps_interface_id").val(),
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


