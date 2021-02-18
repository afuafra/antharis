@extends("layout")
@section("fidps")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">FIDP Interface </h4>
                </div>

                <div class="container-fluid">
                    <table class="table">
                        <tbody>
                        <form class="well form-horizontal">
                            <fieldset>
                                <label class="col-md-4 control-label">Interface Search</label>
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
                        +Add FIDP Interface
                    </button>

                    <!-- Modal -->
{{--                    <div class="container-fluid">--}}
{{--                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"--}}
{{--                             aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog" role="document">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h5 class="modal-title" id="exampleModalLabel">Add FIDP Interface</h5>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <form class="container-fluid" id="fidpsCreate" method="POST"--}}
{{--                                          action="{{route("fidp.store")}}" oninput="fidp_device_id.value = 'FIDP' +'|'+ fidp_no.value +'|'+ atollislandsite.value">--}}


{{--                                        <div class="modal-body">--}}


{{--                                            <div id="success"></div>--}}


{{--                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">--}}

{{--                                            <div class="mb-3">--}}
{{--                                                <label class="form-label">FIDP NO</label>--}}
{{--                                                <input type="text" class="form-control" name="fidp_no"--}}
{{--                                                       id="fidp_no">--}}
{{--                                            </div>--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label class="form-label">Device Address</label>--}}
{{--                                                <input type="text" class="form-control" name="device_address"--}}
{{--                                                       id="device_address">--}}
{{--                                            </div>--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label class="form-label">Device Status</label>--}}
{{--                                                <input type="text" class="form-control" name="device_status"--}}
{{--                                                       id="device_status">--}}
{{--                                            </div>--}}


{{--                                            <div class="mb-3">--}}
{{--                                                <label class="form-label">Device Site </label>--}}
{{--                                                <input  class="form-control" name="atollislandsite" list="list" id="atollislandsite">--}}
{{--                                                <datalist id="list">--}}
{{--                                                    @foreach($devicesites_list as $devicesite)--}}
{{--                                                    <option value="{{ $devicesite }}">{{ $devicesite }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </datalist>--}}
{{--                                            </div>--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label class="form-label">FIDP Device ID</label>--}}
{{--                                                <input type="text" class="form-control" name="fidp_device_id"--}}
{{--                                                       id="fidp_device_id" readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <a href="{{route("fidp.index")}}" class="btn btn-secondary"--}}
{{--                                               data-bs-dismiss="modal">back</a>--}}
{{--                                            <input name="submit" type="submit" class="btn btn-primary"></input>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    <strong>FIDP</strong>
                                </th>
                                <th>
                                    <strong>Terminal Side</strong>
                                </th>
                                <th>
                                    <strong>Port</strong>
                                </th>
                                <th>
                                    <strong>Service No</strong>
                                </th>
                                <th>
                                    <strong>Action</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($fidps as $fidp)
                                <tr>

                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                           data-bs-target="#routeView">

                                        {{$fidp->fidps->fidp_device_id}}
                                    </td>
                                    <td>
                                        {{$fidp->terminal_side}}
                                    </td>
                                    <td>
                                        {{$fidp->port}}
                                    </td>
                                    <td>
                                        {{$fidp->services->serviceNumber}}
                                    </td>
                                    <td>
                                        <button type="button" rel="tooltip" class="btn btn-round btn-round-xs mr5" onclick="editInterface({{$fidp}})">
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
                                {!! $fidps->links() !!}
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>


    </div>

        <!-- Modal -->
        <div class="container-fluid">
            <div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update ODF Interface</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="container-fluid">
                            <div class="mb-3">
                                <input type="hidden" id="_id">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">_terminal_side</label>
                                <input type="text" id="_terminal_side" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">_port</label>
                                <input type="text" id="_port" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">_fidp_id</label>
{{--                                <select  class="form-control" name="_fidp_id" list="list" id="_fidp_id">--}}
{{--                                    @foreach($odfracks as $odfrack)--}}
{{--                                        <option value="{{ $odfrack->id }}">{{ $odfrack->odf_device_id}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">_service_id</label>
{{--                                <select  class="form-control" name="_service_id" list="list" id="_service_id">--}}
{{--                                    <option></option>--}}
{{--                                    @foreach($oltInterfaces as $oltInterface)--}}
{{--                                        <option value="{{ $oltInterface->id }}">{{ $oltInterface->olt->olt_device_id}} # {{ $oltInterface->olt_frame}}/{{ $oltInterface->olt_card}}/{{ $oltInterface->olt_port}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">_fidp_splitter_interface_id</label>
                                {{--                                <select  class="form-control" name="_service_id" list="list" id="_service_id">--}}
                                {{--                                    <option></option>--}}
                                {{--                                    @foreach($oltInterfaces as $oltInterface)--}}
                                {{--                                        <option value="{{ $oltInterface->id }}">{{ $oltInterface->olt->olt_device_id}} # {{ $oltInterface->olt_frame}}/{{ $oltInterface->olt_card}}/{{ $oltInterface->olt_port}}</option>--}}
                                {{--                                    @endforeach--}}
                                {{--                                </select>--}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">_fdps_interface_id</label>
                                {{--                                <select  class="form-control" name="_service_id" list="list" id="_service_id">--}}
                                {{--                                    <option></option>--}}
                                {{--                                    @foreach($oltInterfaces as $oltInterface)--}}
                                {{--                                        <option value="{{ $oltInterface->id }}">{{ $oltInterface->olt->olt_device_id}} # {{ $oltInterface->olt_frame}}/{{ $oltInterface->olt_card}}/{{ $oltInterface->olt_port}}</option>--}}
                                {{--                                    @endforeach--}}
                                {{--                                </select>--}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" onclick="updateInterface()" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>


@endsection
@push('scripts')
    <script>

        function editInterface(fidps_interface){
            $("#_id").val(fidps_interface.id)
            $("#_terminal_side").val(fidps_interface.terminal_side)
            $("#_port").val(fidps_interface.port)
            $("#_fidp_id").val(fidps_interface.fidp_id)
            $("#_service_id").val(fidps_interface.service_id)
            $("#_fidp_splitter_interface_id").val(fidps_interface.fidp_splitter_interface_id)
            $("#_fdps_interface_id").val(fidps_interface.fdps_interface_id)

            var myModel = new bootstrap.Modal(document.getElementById('editModel'),{

                keyboard: false
            });

            myModel.show()
            console.log(odf_interfaces)

        }

        function updateInterface(fidps_interface){

            var id = $("#_id").val()
            var url = '/fidps_interface/'+id

            var formData2 = {



                'terminal_side': $("#_terminal_side").val(),
                'port': $("#_port").val(),
                'fidp_id': $("#_fidp_id").val(),
                'service_id': $("#_service_id").val(),
                'fidp_splitter_interface_id': $("#_fidp_splitter_interface_id").val(),
                'fdps_interface_id': $("#_fdps_interface_id").val(),
                '_token': "{{ csrf_token() }}"

            }

            $.ajax({

                type:"PUT",
                url: url,
                data: formData2,
                dataType: "json",


                success: function (data){

                    $("").text('Yey!! Service Updated')
                    setTimeout(() => {

                        location.reload()

                    }, 300)

                },

                error: function (error){

                    console.error('ERROR:',error)

                }
            });



        }

        var form = $("#fidpsCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'fidp_no': $("#fidp_no").val(),
                'fidp_device_id': $("#fidp_device_id").val(),
                'device_address': $("#device_address").val(),
                'device_status': $("#device_status").val(),
                'atollislandsite': $("#atollislandsite").val(),
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


