@extends("layout")
@section("odf_interface")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ODF Interface </h4>
                </div>

                <div class="container-fluid">
                    <table class="table">
                        <tbody>
                        <form class="well form-horizontal">
                            <fieldset>
                                <label class="col-md-4 control-label">ODF Interface Search</label>
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
                        +Add ODF Interface
                    </button>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add ODF Interface</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="fcabsCreate" method="POST"
                                          action="{{route("odf_interfaces.store")}}">


                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">odf_no</label>
                                                <input type="text" class="form-control" name="odf_no"
                                                       id="odf_no">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">odf_port</label>
                                                <input type="text" class="form-control" name="odf_port"
                                                       id="odf_port">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">odf_racks_id</label>
                                                <select  class="form-control" name="odf_racks_id" list="list" id="odf_racks_id">
                                                    @foreach($odfracks as $odfrack)
                                                        <option value="{{ $odfrack->id }}">{{ $odfrack->odf_device_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">olt_interface_id</label>
                                                <select  class="form-control" name="olt_interface_id" list="list" id="olt_interface_id">
                                                    @foreach($oltInterfaces as $oltInterface)
                                                        <option></option>
                                                        <option value="{{ $oltInterface->id }}">{{ $oltInterface->olt->olt_device_id}} # {{ $oltInterface->olt_frame}}/{{ $oltInterface->olt_card}}/{{ $oltInterface->olt_port}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("odf_interfaces.index")}}" class="btn btn-secondary"
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
                                    <strong>odf_racks_id</strong>
                                </th>
                                <th>
                                    <strong>odf_no</strong>
                                </th>
                                <th>
                                    <strong>odf_port</strong>
                                </th>

                                <th>
                                    <strong>olt_interface_id</strong>
                                </th>
                                <th>
                                    <strong>olt port</strong>
                                </th>
                                <th>
                                    <strong>Action</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($odfInterface_list as $interface)
                                {{--                            @include('services.service_item',['service'=>$service])--}}
                                <tr>
                                    <td>
                                        {{$interface->odfRack->odf_device_id}}
                                    </td>

                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                           data-bs-target="#routeView">
                                        {{$interface->odf_no}}
                                    </td>

                                    <td>
                                        {{$interface->odf_port}}
                                    </td>

                                    <td>
                                        {{$interface->odfRack->interface[0]->oltinterface->olt->olt_device_id}}
                                    </td>
                                    <td>
                                        {{$interface->odfRack->interface[0]->oltinterface->olt_frame}}/{{$interface->odfRack->interface[0]->oltinterface->olt_card}}/{{$interface->odfRack->interface[0]->oltinterface->olt_port}}
                                    </td>
                                    <td>
                                        {{--        <button type="button" rel="tooltip" class="btn btn-success"--}}
                                        {{--                data-toggle="modal" data-target="#updateService{{$service->id}}">--}}
                                        {{--            <i class="now-ui-icons ui-2_settings-90"></i>--}}
                                        {{--        </button>--}}

                                        <button type="button" rel="tooltip" class="btn btn-round btn-round-xs mr5" onclick="editInterface({{$interface}})">
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
                                {!! $odfInterface_list->links() !!}
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
                            <label class="form-label">odf_no</label>
                            <input type="text" id="_odf_no" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">odf_port</label>
                            <input type="text" id="_odf_port" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">odf_racks_id</label>
                            <select  class="form-control" name="_odf_racks_id" list="list" id="_odf_racks_id">
                                @foreach($odfracks as $odfrack)
                                    <option value="{{ $odfrack->id }}">{{ $odfrack->odf_device_id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">olt_interface_id</label>
                            <select  class="form-control" name="_olt_interface_id" list="list" id="_olt_interface_id">
                                @foreach($oltInterfaces as $oltInterface)
                                    <option></option>
                                    <option value="{{ $oltInterface->id }}">{{ $oltInterface->olt->olt_device_id}} # {{ $oltInterface->olt_frame}}/{{ $oltInterface->olt_card}}/{{ $oltInterface->olt_port}}</option>
                                @endforeach
                            </select>
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

        function editInterface(odf_interfaces){
            $("#_id").val(odf_interfaces.id)
            $("#_odf_no").val(odf_interfaces.odf_no)
            $("#_odf_port").val(odf_interfaces.odf_port)
            $("#_odf_racks_id").val(odf_interfaces.odf_racks_id)
            $("#_olt_interface_id").val(odf_interfaces.olt_interface_id)

            var myModel = new bootstrap.Modal(document.getElementById('editModel'),{

                keyboard: false
            });

            myModel.show()
            console.log(odf_interfaces)

        }

        function updateInterface(odf_interfaces){

            var id = $("#_id").val()
            var url = '/odf_interfaces/'+id

            var formData2 = {



                'odf_no': $("#_odf_no").val(),
                'odf_port': $("#_odf_port").val(),
                'odf_racks_id': $("#_odf_racks_id").val(),
                'olt_interface_id': $("#_olt_interface_id").val(),
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



        var form = $("#fcabsCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'odf_no': $("#odf_no").val(),
                'fcab_device_id': $("#fcab_device_id").val(),
                'odf_port': $("#odf_port").val(),
                'odf_racks_id': $("#odf_racks_id").val(),
                'olt_interface_id': $("#olt_interface_id").val(),
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


