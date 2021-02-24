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

                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">ODF Interface Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal"
                                data-target="#exampleModal">
                            +Add ODF Interface
                        </button>
                    </form>


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
                                          action="{{route("odf_interfaces.store")}}"
                                          oninput="entity_id.value = odf_racks_id.selectedOptions[0].text +'|'+ odf_no.value +'|'+ odf_port.value">


                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">odf_racks_id</label>
                                                <select class="form-control" name="odf_racks_id" list="list"
                                                        id="odf_racks_id"
                                                        data-style="select-with-transition btn-primary btn-round "
                                                        data-live-search="true">
                                                    @foreach($odfracks as $odfrack)
                                                        <option
                                                            value="{{ $odfrack->id }}">{{ $odfrack->odf_device_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                                <label class="form-label">olt_interface_id</label>
                                                <select class="form-control" name="olt_interface_id" list="list"
                                                        id="olt_interface_id"
                                                        data-style="select-with-transition btn-primary btn-round "
                                                        data-live-search="true">
                                                    <option></option>
                                                    @foreach($oltInterfaces as $oltInterface)
                                                        <option
                                                            value="{{ $oltInterface->id }}">{{ $oltInterface->olt->olt_device_id}}
                                                            # {{ $oltInterface->olt_frame}}/{{ $oltInterface->olt_card}}
                                                            /{{ $oltInterface->olt_port}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">entity_id</label>
                                            <input type="text" class="form-control" name="entity_id"
                                                   id="entity_id" readonly>
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
                        <table class="table table-sm">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    <strong>ODF Rack</strong>
                                </th>
                                <th>
                                    <strong>ODF No</strong>
                                </th>
                                <th>
                                    <strong>ODF Port</strong>
                                </th>

                                <th>
                                    <strong>OLT Name</strong>
                                </th>
                                <th>
                                    <strong>Frame/Card/Port</strong>
                                </th>
                                <th>
                                    <strong>Edit</strong>
                                </th>
                                <th>
                                    <strong>Delete</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($odfInterface_list as $interface)
                                {{--                            @include('services.service_item',['service'=>$service])--}}
                                <tr>
                                    <td>
                                        {{$interface->odfRack->odf_rack_name}}
                                    </td>

                                    <td>
                                        {{--                                        <a href="" class="text-primary" data-bs-toggle="modal"--}}
                                        {{--                                           data-bs-target="#routeView">--}}
                                        ODF-{{$interface->odf_no}}
                                    </td>

                                    <td>
                                        {{$interface->odf_port}}
                                    </td>

                                    <td>
                                        @if(isset($interface->oltinterface->olt->olt_name))
                                            {{$interface->oltinterface->olt->olt_name}}
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($interface->oltinterface))
                                            {{$interface->oltinterface->olt_frame}}
                                            /{{$interface->oltinterface->olt_card}}
                                            /{{$interface->oltinterface->olt_port}}
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        <a onclick="editOdfInt({{$interface}})">
                                            <i class="fas fa-edit text-success fa-lg"></i></a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" id="smallButton" data-target=".bd-example-modal-lg"
                                           data-attr="{{ route('odf_interfaces', $interface->id) }}"
                                           title="Delete ODF Interface">
                                            <i class="fas fa-trash text-danger  fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach()
                            </tbody>
                        </table>
                    </div>
                </div>

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


    <!-- Modal -->
    <div class="container-fluid">
        <div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update ODF Interface</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="container-fluid"
                          oninput="_entity_id.value = _odf_racks_id.selectedOptions[0].text +'|'+ _odf_no.value +'|'+ _odf_port.value">
                        <div class="mb-3">
                            <input type="hidden" id="_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">odf_racks_id</label>
                            <select class="form-control" name="odf_racks_id" list="list" id="odf_racks_id"
                                    data-style="select-with-transition btn-primary btn-round " data-live-search="true">
                                @foreach($odfracks as $odfrack)
                                    <option value="{{ $odfrack->id }}">{{ $odfrack->odf_device_id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">odf_no</label>
                            <input type="text" class="form-control" name="_odf_no"
                                   id="_odf_no">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">odf_port</label>
                            <input type="text" class="form-control" name="_odf_port"
                                   id="_odf_port">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">olt_interface_id</label>
                            <select class="form-control" name="_olt_interface_id" list="list" id="_olt_interface_id"
                                    data-style="select-with-transition btn-primary btn-round " data-live-search="true">
                                <option></option>
                                @foreach($oltInterfaces as $oltInterface)
                                    <option value="{{ $oltInterface->id }}">{{ $oltInterface->olt->olt_device_id}}
                                        # {{ $oltInterface->olt_frame}}/{{ $oltInterface->olt_card}}
                                        /{{ $oltInterface->olt_port}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">entity_id</label>
                            <input type="text" class="form-control" name="_entity_id"
                                   id="_entity_id" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="updateOdfInter()" class="btn btn-primary">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script>

        // display a modal (small modal)
        $(document).on('click', '#smallButton', function (event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href
                , beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                }
                , complete: function () {
                    $('#loader').hide();
                }
                , error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                }
                , timeout: 8000
            })
        });

        function editOdfInt(odf_interfaces) {
            $("#_id").val(odf_interfaces.id)
            $("#_odf_no").val(odf_interfaces.odf_no)
            $("#_odf_port").val(odf_interfaces.odf_port)
            $("#_odf_racks_id").val(odf_interfaces.odf_racks_id)
            $("#_olt_interface_id").val(odf_interfaces.olt_interface_id)
            $("#_entity_id").val(odf_interfaces.entity_id)

            var myModel = new bootstrap.Modal(document.getElementById('editModel'), {

                keyboard: false
            });

            myModel.show()
            console.log(odf_interfaces)

        }

        function updateOdfInter(odf_interfaces) {

            var id = $("#_id").val()
            var url = '/odf_interfaces/' + id

            var formData2 = {


                'odf_no': $("#_odf_no").val(),
                'odf_port': $("#_odf_port").val(),
                'odf_racks_id': $("#_odf_racks_id").val(),
                'olt_interface_id': $("#_olt_interface_id").val(),
                'entity_id': $("#_entity_id").val(),
                '_token': "{{ csrf_token() }}"

            }

            $.ajax({

                type: "PUT",
                url: url,
                data: formData2,
                dataType: "json",


                success: function (data) {

                    $("").text('Yey!! Service Updated')
                    setTimeout(() => {

                        location.reload()

                    }, 300)

                },

                error: function (error) {

                    console.error('ERROR:', error)

                }
            });


        }


        var form = $("#fcabsCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'entity_id': $("#entity_id").val(),
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

        $(function () {
            $('select').selectpicker();
        });

    </script>
@endpush


