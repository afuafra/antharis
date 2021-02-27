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
                                          action="{{route("fcabs_splitter_interface.store")}}" oninput="entity_id.value =  fcab_splitter_id.selectedOptions[0].text +'|'+ port.value">
                                        <div class="modal-body">
                                            <div id="success"></div>

                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">fcab_splitter_device_id </label>
                                                <select class="form-control" id="fcab_splitter_id" name="fcab_splitter_id" data-style="select-with-transition btn-primary btn-round "data-live-search="true">
                                                    @foreach($fcabsplitters as $fcabsplitter)
                                                        <option value="{{ $fcabsplitter->id }}">{{ $fcabsplitter->fcab_splitter_device_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">port</label>
                                                <input type="text" class="form-control" name="port"
                                                       id="port">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Entity ID</label>
                                                <input type="text" class="form-control" name="entity_id"
                                                       id="entity_id" readonly>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("fcabs_splitter_interface.index")}}" class="btn btn-secondary"
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
                                <th>
                                    <strong>Edit</strong>
                                </th>
                                <th>
                                    <strong>Delete</strong>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($splitterinterfaces as $splitterinterface)
                                <tr>
                                    <td>
                                        @if(isset($splitterinterface->splitter->fcab->device_site->atollislandsite))
                                            {{$splitterinterface->splitter->fcab->device_site->atollislandsite}}
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
                                        <a onclick="editOlt({{$splitterinterface}})">
                                            <i class="fas fa-edit text-success fa-lg"></i></a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" id="oltDelete" data-target=".bd-example-modal-lg" data-attr="{{ route('fcab_splitter_interface', $splitterinterface->id) }}" title="Delete OLT">
                                            <i class="fas fa-trash text-danger  fa-lg"></i>
                                        </a>
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

    <div class="container-fluid">
        <div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update FCAB Splitter Interface</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="container-fluid"
                          oninput="_entity_id.value =  _fcab_splitter_id.selectedOptions[0].text +'|'+ _port.value">
                        <div class="mb-3">
                            <input type="hidden" id="_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">fcab_splitter_device_id </label>
                            <select class="form-control" id="_fcab_splitter_id" name="_fcab_splitter_id" data-style="select-with-transition btn-primary btn-round " data-live-search="true">
                                @foreach($fcabsplitters as $fcabsplitter)
                                    <option value="{{ $fcabsplitter->id }}">{{ $fcabsplitter->fcab_splitter_device_id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">port</label>
                            <input type="text" class="form-control" name="_port"
                                   id="_port">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Entity ID</label>
                            <input type="text" class="form-control" name="_entity_id"
                                   id="_entity_id" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <button type="button" onclick="updateOlt()" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
        $(document).on('click', '#oltDelete', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href
                , beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                }
                , complete: function() {
                    $('#loader').hide();
                }
                , error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                }
                , timeout: 6000
            })
        });


        function editOlt(fcabs_splitter_interface) {
            $("#_id").val(fcabs_splitter_interface.id)
            $("#_entity_id").val(fcabs_splitter_interface.entity_id)
            $("#_port").val(fcabs_splitter_interface.port)
            $("#_fcab_splitter_id").val(fcabs_splitter_interface.fcab_splitter_id)
            $("#_fcab_splitter_id").selectpicker("refresh");

            var myModel = new bootstrap.Modal(document.getElementById('editModel'), {

                keyboard: false
            });

            myModel.show()
            console.log(fcabs_splitter_interface)

        }

        function updateOlt(fcabs_splitter_interface) {

            var id = $("#_id").val()
            var url = '/fcabs_splitter_interface/' + id

            var formData2 = {


                'entity_id': $("#_entity_id").val(),
                'port': $("#_port").val(),
                'fcab_splitter_id': $("#_fcab_splitter_id").val(),
                '_token': "{{ csrf_token() }}"

            }

            $.ajax({

                type: "PUT",
                url: url,
                data: formData2,
                dataType: "json",


                success: function (data) {

                    $("").text('Yey!! OLT Updated')
                    setTimeout(() => {

                        location.reload()

                    }, 300)

                },

                error: function (error) {

                    console.error('ERROR:', error)

                }
            });


        }

        var form = $("#splitterCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'entity_id': $("#entity_id").val(),
                'port': $("#port").val(),
                'fcab_splitter_id': $("#fcab_splitter_id").val(),
                // 'fcab_interface_id': $("#fcab_interface_id").val(),
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


