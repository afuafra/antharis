@extends("layout")
@section("olt_interface")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">OLT Interface </h4>
                </div>

                <div class="container-fluid">
                    <table class="table">
                        <tbody>
                        <form class="well form-horizontal">
                            <fieldset>
                                <label class="col-md-4 control-label">OLT Interface Search</label>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addOltInterface">
                        +Add OLT Interface
                    </button>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="addOltInterface" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add fcab</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="oltInterfaceCreate" method="POST"
                                          action="{{route("olt_interfaces.store")}}" oninput="odf_interfaces_id.value = 'FCAB' +'|'+ olt_frame.value +'|'+ atollislandsite.value">


                                        <div class="modal-body">
                                            <div id="success"></div>
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">
                                            <div class="mb-3">
                                                <label class="form-label">olt_frame</label>
                                                <input type="text" class="form-control" name="olt_frame"
                                                       id="olt_frame">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">olt_card</label>
                                                <input type="text" class="form-control" name="olt_card"
                                                       id="olt_card">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">olt_port</label>
                                                <input type="text" class="form-control" name="olt_port"
                                                       id="olt_port">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">odf_interfaces_id</label>
                                                    <select  class="form-control" name="odf_interfaces_id" list="list" id="odf_interfaces_id">
                                                            <option> </option>
                                                        @foreach($odf_interface as $Interface)
                                                            <option value="{{$Interface->id}}">ODF {{$Interface->odf_no}}--> PORT {{$Interface->odf_port}} -->
                                                                RACK {{$Interface}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">olts_id</label>
                                                <select  class="form-control" name="olts_id" list="list" id="olts_id">
                                                    @foreach($olt_list as $olt)
                                                        <option value="{{$olt->id }}">{{ $olt->olt_device_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        <div class="modal-footer">
                                            <a href="{{route("olt_interfaces.index")}}" class="btn btn-secondary"
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
                                    <strong>OLT Name</strong>
                                </th>
                                <th>
                                    <strong>Frame</strong>
                                </th>
                                <th>
                                    <strong>Card</strong>
                                </th>
                                <th>
                                    <strong>Port</strong>
                                </th>
                                <th>
                                    <strong>ODF Rack</strong>
                                </th>
                                <th>
                                    <strong>ODF Number</strong>
                                </th>
                                <th>
                                    <strong>ODF Port</strong>
                                </th>

                                <th>
                                    <strong>Action</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($olt_interface as $interface)
                                <tr>
                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                           data-bs-target="#routeView">
                                        {{$interface->olt->olt_device_id}}
                                    </td>

                                    <td>
                                        {{$interface->olt_frame}}
                                    </td>
                                    <td>
                                        {{$interface->olt_card}}
                                    </td>
                                    <td>
                                        {{$interface->olt_port}}
                                    </td>
                                    <td>
                                        @if(isset($interface->odfinterface->odfrack->odf_device_id))
                                            {{$interface->odfinterface->odfrack->odf_device_id}}
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($interface->odfinterface->odf_no))
                                            {{$interface->odfinterface->odf_no}}
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($interface->odfinterface->odf_port))
                                            {{$interface->odfinterface->odf_port}}
                                        @else
                                        @endif
                                    </td>

                                    <td>
                                        {{--        <button type="button" rel="tooltip" class="btn btn-success"--}}
                                        {{--                data-toggle="modal" data-target="#updateService{{$service->id}}">--}}
                                        {{--            <i class="now-ui-icons ui-2_settings-90"></i>--}}
                                        {{--        </button>--}}

                                        <button type="button" rel="tooltip" class="btn btn-round btn-round-xs mr5" onclick="editService({{$interface}})">
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
                                {!! $olt_interface->links() !!}
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

        var form = $("#oltInterfaceCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'olt_frame': $("#olt_frame").val(),
                'odf_interfaces_id': $("#odf_interfaces_id").val(),
                'olt_card': $("#olt_card").val(),
                'olt_port': $("#olt_port").val(),
                'odf_interfaces_id': $("#odf_interfaces_id").val(),
                'olts_id': $("#olts_id").val(),

                olts_id
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


