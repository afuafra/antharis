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
                                          oninput="odf_interfaces_id.value = 'FCAB' +'|'+ olt_frame.value +'|'+ atollislandsite.value">


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
                                                <label class="form-label">olts_id</label>
                                                <select class="form-control" name="olts_id" list="list" id="olts_id">
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
                                    <strong>Frame/Card/Port</strong>
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
                                        <button type="button" rel="tooltip" class="btn btn-round btn-round-xs mr5"
                                                onclick="editService({{$interface}})">
                                            <i class="now-ui-icons ui-2_settings-90"></i></button>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" id="smallButton" data-target=".bd-example-modal-lg"
                                           data-attr="{{ route('delete', $interface->id) }}"
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


        var form = $("#oltInterfaceCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

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


