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

                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">OLT Interface Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal"
                                data-target="#addOltInterface">
                            +Add Add OLT Interface
                        </button>
                    </form>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="addOltInterface" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add OLT Interface</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="oltInterfaceCreate" method="POST"
                                          action="{{route("olt_interfaces.store")}}"
                                          oninput="entity_id.value = olts_id.selectedOptions[0].text +'|'+ olt_frame.value +'|'+ olt_card.value +'|'+ olt_port.value">


                                        <div class="modal-body">
                                            <div id="success"></div>
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">olts_id</label>
                                                <select class="form-control" name="olts_id" list="list" id="olts_id">
                                                    @foreach($olt_list as $olt)
                                                        <option value="{{$olt->id }}">{{ $olt->olt_device_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                                <label class="form-label">entity_id</label>
                                                <input type="text" class="form-control" name="entity_id"
                                                       id="entity_id" readonly>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{route("olt_interfaces.index")}}" class="btn btn-secondary"
                                                   data-bs-dismiss="modal">back</a>
                                                <input name="submit" type="submit" class="btn btn-primary">
                                            </div>
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
                            @foreach ($olt_interface as $interface)
                                <tr>
                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                           data-bs-target="#routeView">

                                        @if(isset($interface->olt->olt_name))
                                            {{$interface->olt->olt_name}}
                                        @else
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($interface))
                                            {{$interface->olt_frame}}/{{$interface->olt_card}}/{{$interface->olt_port}}
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        <a onclick="editoltInter({{$interface}})">
                                            <i class="fas fa-edit text-success fa-lg"></i></a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" id="smallButton" data-target=".bd-example-modal-lg"
                                           data-attr="{{ route('olt_interfaces', $interface->id) }}"
                                           title="Delete OLT Interface">
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
                                {!! $olt_interface->links() !!}
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
                        <h5 class="modal-title" id="exampleModalLabel">Update oltInter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="container-fluid"
                          oninput="_entity_id.value = _olts_id.selectedOptions[0].text +'|'+ _olt_frame.value +'|'+ _olt_card.value +'|'+ _olt_port.value">
                        <div class="mb-3">
                            <input type="hidden" id="_id">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">olts_id</label>
                            <select class="form-control" name="_olts_id" list="list" id="_olts_id">
                                @foreach($olt_list as $olt)
                                    <option value="{{$olt->id }}">{{ $olt->olt_device_id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">olt_frame</label>
                            <input type="text" class="form-control" name="_olt_frame"
                                   id="_olt_frame">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">olt_card</label>
                            <input type="text" class="form-control" name="_olt_card"
                                   id="_olt_card">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">olt_port</label>
                            <input type="text" class="form-control" name="_olt_port"
                                   id="_olt_port">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">entity_id</label>
                            <input type="text" class="form-control" name="_entity_id"
                                   id="_entity_id" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <button type="button" onclick="updateoltInter()" class="btn btn-primary">Update</button>
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

        function editoltInter(oltInter) {
            $("#_id").val(oltInter.id)
            $("#_olts_id").val(oltInter.olts_id)
            $("#_olt_frame").val(oltInter.olt_frame)
            $("#_olt_card").val(oltInter.olt_card)
            $("#_olt_port").val(oltInter.olt_port)
            $("#_entity_id").val(oltInter.entity_id)

            var myModel = new bootstrap.Modal(document.getElementById('editModel'), {

                keyboard: false
            });

            myModel.show()
            console.log(oltInter)

        }

        function updateoltInter(oltInter) {

            var id = $("#_id").val()
            var url = '/oltInter/' + id

            var formData2 = {

                'olts_id': $("#_olts_id").val(),
                'olt_frame': $("#_olt_frame").val(),
                'olt_card': $("#_olt_card").val(),
                'olt_port': $("#_olt_port").val(),
                'entity_id': $("#_entity_id").val(),
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


        var form = $("#oltInterfaceCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'entity_id': $("#entity_id").val(),
                'olt_frame': $("#olt_frame").val(),
                'olt_card': $("#olt_card").val(),
                'olt_port': $("#olt_port").val(),
                'olts_id': $("#olts_id").val(),
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


