@extends("layout")
@section("olts")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">OLT</h4>
                </div>

                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round" type="submit">OLT Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal" data-target="#exampleModal">
                            +Add olts
                        </button>
                    </form>


                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add OLT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="oltsCreate" method="POST"
                                          action="{{route("olts.store")}}" oninput="olt_device_id.value = 'OLT' +'|'+ olt_name.value +'|'+ devicesites_id.selectedOptions[0].text">


                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">olt_name</label>
                                                <input type="text" class="form-control" name="olt_name"
                                                       id="olt_name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Device Address</label>
                                                <input type="text" class="form-control" name="device_address"
                                                       id="device_address">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Device Status</label>
                                                <input type="text" class="form-control" name="device_status"
                                                       id="device_status">
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">Device Site </label>
                                                <select  class="form-control" name="devicesites_id" list="list" id="devicesites_id">
                                                    @foreach($devicesites_list as $devicesite)
                                                    <option value="{{ $devicesite->id }}">{{ $devicesite->atollislandsite}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">olt_device_id</label>
                                                <input type="text" class="form-control" name="olt_device_id"
                                                       id="olt_device_id" readonly>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("olts.index")}}" class="btn btn-secondary"
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
                            <tr>
                                <th>
                                    <strong>OLT Name</strong>
                                </th>
                                <th>
                                    <strong>olt_device_id</strong>
                                </th>
                                <th>
                                    <strong>device_address</strong>
                                </th>
                                <th>
                                    <strong>device_status</strong>
                                </th>
                                <th>
                                    <strong>devicesites_id</strong>
                                </th>
                                <th>
                                    <strong>Action</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($olt_list as $olt)
                                {{--                            @include('services.service_item',['service'=>$service])--}}
                                <tr>

                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                           data-bs-target="#routeView">

                                        {{$olt->olt_name}}
                                    </td>
                                    <td>
                                        {{$olt->olt_device_id}}
                                    </td>
                                    <td>
                                        {{$olt->device_address}}
                                    </td>
                                    <td>
                                        {{$olt->device_status}}
                                    </td>
                                    <td>
                                        {{$olt->devicesites->atollislandsite}}
                                    </td>
                                    <td>
                                        {{--        <button type="button" rel="tooltsip" class="btn btn-success"--}}
                                        {{--                data-toggle="modal" data-target="#updateService{{$service->id}}">--}}
                                        {{--            <i class="now-ui-icons ui-2_settings-90"></i>--}}
                                        {{--        </button>--}}

                                        <button type="button" rel="tooltsip" class="btn btn-round btn-round-xs mr4" onclick="editService({{$olt}})">
                                            <i class="now-ui-icons ui-2_settings-90"></i></button>

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
                                {!! $olt_list->links() !!}
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

        var form = $("#oltsCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'olt_name': $("#olt_name").val(),
                'olt_device_id': $("#olt_device_id").val(),
                'device_address': $("#device_address").val(),
                'device_status': $("#device_status").val(),
                'devicesites_id': $("#devicesites_id").val(),
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


