@extends("layout")
@section("odf")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ODF </h4>
                </div>

                <div class="container-fluid">
                    <table class="table">
                        <tbody>
                        <form class="well form-horizontal">
                            <fieldset>
                                <label class="col-md-4 control-label">ODF Search</label>
                                <div class="col-md-8 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="max-width: 100%;"><i
                                                class="glyphicon glyphicon-list"></i></span>
                                        <select class="selectpicker form-control">
                                            <option></option>
                                            <option>Test</option>
                                            <option>Test</option>
                                            <option>Test</option>
                                            <option>Test</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        </tbody>
                    </table>
                </div>

                <div class="container-fluid">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        +Add odfs
                    </button>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add odf</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="odfRackCreate" method="POST"
                                          action="{{route("odf_racks.store")}}" oninput="odf_device_id.value = 'ODF-RACK' +'|'+ odf_rack_name.value +'|'+ devicesites_id.selectedOptions[0].text">


                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">odf_rack_name</label>
                                                <input type="text" class="form-control" name="odf_rack_name"
                                                       id="odf_rack_name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">device_address</label>
                                                <input type="text" class="form-control" name="device_address"
                                                       id="device_address">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">device_status</label>
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
                                                <label class="form-label">odf_device_id</label>
                                                <input type="text" class="form-control" name="odf_device_id"
                                                       id="odf_device_id">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("odf_racks.index")}}" class="btn btn-secondary"
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
                                    <strong>odf_rack_name</strong>
                                </th>
                                <th>
                                    <strong>odf_device_id</strong>
                                </th>
                                <th>
                                    <strong>device_status</strong>
                                </th>
                                <th>
                                    <strong>device_address</strong>
                                </th>
                                <th>
                                    <strong>atollislandsite</strong>
                                </th>
                                <th>
                                    <strong>Action</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($odf_list as $odf)
                                {{--                            @include('services.service_item',['service'=>$service])--}}
                                <tr>

                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                           data-bs-target="#routeView">

                                        {{$odf->odf_rack_name}}
                                    </td>
                                    <td>
                                        {{$odf->odf_device_id}}
                                    </td>
                                    <td>
                                        {{$odf->device_status}}
                                    </td>
                                    <td>
                                        {{$odf->device_address}}
                                    </td>
                                    <td>
                                        {{$odf->devicesites->atollislandsite}}
                                    </td>
                                    <td>
                                        {{--        <button type="button" rel="tooltip" class="btn btn-success"--}}
                                        {{--                data-toggle="modal" data-target="#updateService{{$service->id}}">--}}
                                        {{--            <i class="now-ui-icons ui-2_settings-90"></i>--}}
                                        {{--        </button>--}}

                                        <button type="button" rel="tooltip" class="btn btn-round btn-round-xs mr5" onclick="editService({{$odf}})">
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
                                {!! $odf_list->links() !!}
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

        var form = $("#odfRackCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'odf_rack_name': $("#odf_rack_name").val(),
                'device_status': $("#device_status").val(),
                'odf_device_id': $("#odf_device_id").val(),
                'device_address': $("#device_address").val(),
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


