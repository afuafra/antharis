@extends("layout")
@section("fidpsInterface")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">FCAB Interface </h4>
                    <div>
                        <form class="form-inline" action="" method="get">
                            <div class="form-group mx-sm-3">
                                <input class="form-control" name='search' type="search" placeholder="Search">
                            </div>
                            <button class="btn btn-primary btn-round mr-4" type="submit">FCAB Interface Search</button>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal"
                                    data-target="#exampleModal">
                                +Add FCAB Interface
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Modal -->
                <div class="container-fluid">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add FCAB Interface</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="container-fluid" id="fcabInterfaceCreate" method="POST"
                                      action="{{route("fcabs_interface.store")}}"
                                      oninput="entity_id.value = fcab_id.selectedOptions[0].text +'|'+ terminal_side.value +'|'+ port.value">


                                    <div class="modal-body">

                                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                        <div class="mb-3">
                                            <label class="form-label">FCAB ID</label>
                                            <select class="form-control" name="fcab_id" list="list" id="fcab_id"
                                                    data-style="select-with-transition btn-primary btn-round "
                                                    data-live-search="true">
                                                <option></option>
                                                @foreach($fcablist as $fcabs)
                                                    <option
                                                        value="{{ $fcabs->id }}">{{ $fcabs->fcab_device_id}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Terminal Side</label>
                                            <select class="form-control" name="terminal_side"
                                                    id="terminal_side"
                                                    data-style="select-with-transition btn-primary btn-round ">
                                                <option disabled selected>Select Terminal Side...</option>
                                                <option value="E-SIDE">E-SIDE</option>
                                                <option value="D-SIDE">D-SIDE</option>
                                            </select>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Port No</label>
                                            <input type="text" class="form-control" name="port"
                                                   id="port" placeholder="Format: A/1">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">ODF Interface ID</label>
                                            <select class="form-control" name="odf_interfaces_id" list="list"
                                                    id="odf_interfaces_id"
                                                    data-style="select-with-transition btn-primary btn-round "
                                                    data-live-search="true">
                                                <option></option>
                                                @foreach($odfInterfaces as $odfInterface)
                                                    <option
                                                        value="{{ $odfInterface->id }}">{{ $odfInterface->odfrack->odf_device_id}}
                                                        #ODF-{{ $odfInterface->odf_no}}
                                                        #PORT-#ODF-{{ $odfInterface->odf_port}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    <div class="form-group">
                                        <label for="fcab_splitter_device_id">FCAB Splitter</label>
                                        <select name="fcab_splitter_device_id" id="fcab_splitter_device_id" class="form-control" style="width:250px">
                                            <option value="">--- Select fcab_splitter_device_id ---</option>
                                            @foreach ($splitters as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fcab_splitter_interfaces_id">FCAB Splitter Interface</label>
                                        <select id="fcab_splitter_interfaces_id" name="fcab_splitter_interfaces_id" class="form-control" style="width:250px">
{{--                                            <option>--State--</option>--}}
                                        </select>
                                    </div>

                                        <div class="mb-3">
                                            <label class="form-label">entity_id</label>
                                            <input type="text" class="form-control" name="entity_id"
                                                   id="entity_id" readonly>
                                        </div>
                                    <div class="modal-footer">
                                        <a href="{{route("fcabs_interface.index")}}" class="btn btn-secondary"
                                           data-bs-dismiss="modal">back</a>
                                        <input name="submit" type="submit" class="btn btn-primary"></input>
                                    </div>
                                    </div>
                                </form>
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
                                    <strong>FCAB No</strong>
                                </th>
                                <th>
                                    <strong>Terminal Side</strong>
                                </th>
                                <th>
                                    <strong>FCAB Port</strong>
                                </th>
                                <th>
                                    <strong>ODF Rack Name</strong>
                                </th>
                                <th>
                                    <strong>ODF No</strong>
                                </th>
                                <th>
                                    <strong>ODF Port</strong>
                                </th>
                                <th>
                                    <strong>Splitter Port</strong>
                                </th>
                                <th>
                                    <strong>Splitter Name</strong>
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
                            @foreach ($fcabsinterfaces as $fcab)
                                <tr>
                                    <td>
                                        {{$fcab->fcabs->device_site->atollislandsite}}
                                    </td>
                                    <td>
                                        {{$fcab->fcabs->fcab_no}}
                                    </td>
                                    <td>
                                        {{$fcab->terminal_side}}
                                    </td>
                                    <td>
                                        {{$fcab->port}}
                                    </td>
                                    <td>
                                        @if(isset($fcab->odfinterface->odfrack->odf_rack_name))
                                        {{$fcab->odfinterface->odfrack->odf_rack_name}}
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($fcab->odfinterface->odf_no))
                                        {{$fcab->odfinterface->odf_no}}
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($fcab->odfinterface->odf_port))
                                        {{$fcab->odfinterface->odf_port}}
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($fcab->SplitterInterface->port))
                                            {{$fcab->SplitterInterface->port}}
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($fcab->splitter->fcab_splitter_no))
                                            {{$fcab->splitter->fcab_splitter_no}}
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        <a onclick="editInterface({{$fcab}})">
                                            <i class="fas fa-edit text-success fa-lg"></i></a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" id="oltDelete" data-target=".bd-example-modal-lg"
                                           data-attr="{{ route('fcab_interface', $fcab->id) }}"
                                           title="Delete FCAB Interface">
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
                        {!! $fcabsinterfaces->links() !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="container-fluid">
        <div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update FCAB Interface</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form class="container-fluid"
                          oninput="_entity_id.value = _fcab_id.selectedOptions[0].text +'|'+ _terminal_side.value +'|'+ _port.value">
                        <div class="mb-3">
                            <input type="hidden" id="_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">FCAB ID</label>
                            <select class="form-control selectpicker" name="_fcab_id" list="list" id="_fcab_id">
                                <option></option>
                                @foreach($fcablist as $fcabs)
                                    <option
                                        value="{{ $fcabs->id }}">{{ $fcabs->fcab_device_id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Terminal Side</label>
                            <select class="form-control" name="_terminal_side"
                                    id="_terminal_side">
                                <option disabled selected>Select Terminal Side...</option>
                                <option value="E-SIDE">E-SIDE</option>
                                <option value="D-SIDE">D-SIDE</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Port No</label>
                            <input type="text" class="form-control" name="_port"
                                   id="_port" placeholder="Format: A/1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ODF Interface ID</label>
                            <select class="form-control" name="_odf_interfaces_id" list="list"
                                    id="_odf_interfaces_id">
                                <option disabled selected>Select Terminal Side...</option>
                                @foreach($odfInterfaces as $odfInterface)
                                    <option
                                        value="{{ $odfInterface->id }}">{{ $odfInterface->odfrack->odf_device_id}}
                                        #ODF-{{ $odfInterface->odf_no}}
                                        #PORT-#ODF-{{ $odfInterface->odf_port}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">FCAB Splitter</label>
                            <select  class="form-control" name="_fcab_splitter_device_id"
                                    id="_fcab_splitter_device_id">
                                <option></option>
                                @foreach($fcabsplitters as $fcabsplitter)
                                    <option
                                        value="{{ $fcabsplitter->id }}">{{ $fcabsplitter->fcab_splitter_device_id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">FCAB Splitter Interface</label>
                            <select class="form-control"
                                    name="_fcab_splitter_interfaces_id"
                                    id="_fcab_splitter_interfaces_id">
                                <option></option>
                                @foreach($fcabsplitterinterfaces as $fcabsplitterinterface)
                                    <option
                                        value="{{ $fcabsplitterinterface->id }}">{{ $fcabsplitterinterface->splitter->fcab_splitter_device_id }}
                                        |PORT-{{ $fcabsplitterinterface->port }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">entity_id</label>
                            <input type="text" class="form-control" name="_entity_id"
                                   id="_entity_id" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" onclick="updateInterface()"
                                    class="btn btn-primary">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel"
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

        jQuery(document).ready(function ()
        {
            jQuery('select[name="fcab_splitter_device_id"]').on('change',function(){
                var fcab_splitter_device_idID = jQuery(this).val();
                if(fcab_splitter_device_idID)
                {
                    jQuery.ajax({
                        url : 'fcabs_interface/getstates/' +fcab_splitter_device_idID,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            console.log(data);
                            jQuery('select[name="fcab_splitter_interfaces_id"]').empty();
                            jQuery.each(data, function(key,value){
                                $('select[name="fcab_splitter_interfaces_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                                $("#fcab_splitter_interfaces_id").selectpicker("refresh");
                            });
                        }
                    });
                }
                else
                {
                    $('select[name="fcab_splitter_interfaces_id"]').empty();
                }
            });
        });

        // display a modal (small modal)
        $(document).on('click', '#oltDelete', function (event) {
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
                , timeout: 6000
            })
        });


        function editInterface(fcabs_interface) {
            $("#_id").val(fcabs_interface.id)
            $("#_entity_id").val(fcabs_interface.entity_id)
            $("#_terminal_side").val(fcabs_interface.terminal_side)
            $("#_port").val(fcabs_interface.port)
            $("#_odf_interfaces_id").val(fcabs_interface.odf_interfaces_id)
            $("#_fcab_id").val(fcabs_interface.fcab_id)
            $("#_fcab_splitter_interfaces_id").val(fcabs_interface.fcab_splitter_interfaces_id)
            $("#_fcab_splitter_device_id").val(fcabs_interface.fcab_splitter_device_id)
            $("#_terminal_side").selectpicker("refresh");
            $("#_odf_interfaces_id").selectpicker("refresh");
            $("#_fcab_id").selectpicker("refresh");
            $("#_fcab_splitter_interfaces_id").selectpicker("refresh");
            $("#_fcab_splitter_device_id").selectpicker("refresh");

            var myModel = new bootstrap.Modal(document.getElementById('editModel'), {

                keyboard: false
            });

            myModel.show()
            console.log(fcabs_interface)

        }

        function updateInterface(fcab_interfaces) {

            var id = $("#_id").val()
            var url = '/fcabs_interface/' + id

            var formData2 = {


                'entity_id': $("#_entity_id").val(),
                'terminal_side': $("#_terminal_side").val(),
                'port': $("#_port").val(),
                'odf_interfaces_id': $("#_odf_interfaces_id").val(),
                'fcab_id': $("#_fcab_id").val(),
                'fcab_splitter_interfaces_id': $("#_fcab_splitter_interfaces_id").val(),
                'fcab_splitter_device_id': $("#_fcab_splitter_device_id").val(),
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


        var form = $("#fcabInterfaceCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'entity_id': $("#entity_id").val(),
                'terminal_side': $("#terminal_side").val(),
                'port': $("#port").val(),
                'odf_interfaces_id': $("#odf_interfaces_id").val(),
                'fcab_id': $("#fcab_id").val(),
                'fcab_splitter_interfaces_id': $("#fcab_splitter_interfaces_id").val(),
                'fcab_splitter_device_id': $("#fcab_splitter_device_id").val(),
                '_token': $("#csrf").val()

            }

            $.post(url, formData, function (data) {


                $("#success").text('Yey!!')
                setTimeout(() => {

                    location.reload()

                }, 150)


            }).fail(function (error) {
                console.error('ERROR', error.responseJSON.errors)

            })


            e.preventDefault();


        });

        // $(function () {
        //     $('select').selectpicker();
        //     event.preventDefault();
        // });


    </script>
@endpush


