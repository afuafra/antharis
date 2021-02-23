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

                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal" data-target="#exampleModal">
                            Add ODF
                        </button>
                    </form>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add ODF Rack</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="odfRackCreate" method="POST"
                                          action="{{route("odf_racks.store")}}" oninput="odf_device_id.value = 'ODF-RACK' +'|'+ odf_rack_name.value +'|'+ device_site_id.selectedOptions[0].text">


                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">Region </label>
                                                <select class="form-control"
                                                        data-style="select-with-transition btn-primary btn-round "
                                                        name="region_id" id="region_id"
                                                        data-live-search="true">
                                                    @foreach($regions as $region)
                                                        <option
                                                            value="{{ $region->id }}">{{ $region->region_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Device Site </label>
                                                <select class="form-control"
                                                        data-style="select-with-transition btn-primary btn-round "
                                                        name="device_site_id" id="device_site_id"
                                                        data-live-search="true">
                                                    @foreach($devicesites_list as $devicesite)
                                                        <option
                                                            value="{{ $devicesite->id }}">{{ $devicesite->atollislandsite}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                    <strong>ODF Rack Name</strong>
                                </th>
                                <th>
                                    <strong>ODF Device ID</strong>
                                </th>
                                <th>
                                    <strong>Device Status</strong>
                                </th>
                                <th>
                                    <strong>Device Address</strong>
                                </th>
                                <th>
                                    <strong>Device Site</strong>
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
                                        {{$odf->device_site->atollislandsite}}
                                    </td>
                                    <td>
                                        <a onclick="editOlt({{$odf}})">
                                            <i class="fas fa-edit text-success fa-lg"></i></a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" id="oltDelete" data-target=".bd-example-modal-lg" data-attr="{{ route('odf', $odf->id) }}" title="Delete ODF">
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
                                {!! $odf_list->links() !!}
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
                        <h5 class="modal-title" id="exampleModalLabel">Update ODF Interface</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="container-fluid"
                          oninput="_odf_device_id.value = 'ODF-RACK' +'|'+ _odf_rack_name.value +'|'+ _device_site_id.selectedOptions[0].text">
                        <div class="mb-3">
                            <input type="hidden" id="_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Region </label>
                            <select class="form-control"
                                    data-style="select-with-transition btn-primary btn-round "
                                    name="_region_id" id="_region_id"
                                    data-live-search="true">
                                @foreach($regions as $region)
                                    <option
                                        value="{{ $region->id }}">{{ $region->region_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Device Site </label>
                            <select class="form-control"
                                    data-style="select-with-transition btn-primary btn-round "
                                    name="_device_site_id" id="_device_site_id"
                                    data-live-search="true">
                                @foreach($devicesites_list as $devicesite)
                                    <option
                                        value="{{ $devicesite->id }}">{{ $devicesite->atollislandsite}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">odf_rack_name</label>
                            <input type="text" class="form-control" name="_odf_rack_name"
                                   id="_odf_rack_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">device_address</label>
                            <input type="text" class="form-control" name="_device_address"
                                   id="_device_address">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">device_status</label>
                            <input type="text" class="form-control" name="_device_status"
                                   id="_device_status">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">odf_device_id</label>
                            <input type="text" class="form-control" name="_odf_device_id"
                                   id="_odf_device_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <button type="button" onclick="updateOdf()" class="btn btn-primary">Update</button>
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


        function editOlt(odf_racks) {
            $("#_id").val(odf_racks.id)
            $("#_region_id").val(odf_racks.region_id)
            $("#_odf_rack_name").val(odf_racks.odf_rack_name)
            $("#_device_address").val(odf_racks.device_address)
            $("#_device_status").val(odf_racks.device_status)
            $("#_device_site_id").val(odf_racks.device_site_id)
            $("#_odf_device_id").val(odf_racks.odf_device_id)

            var myModel = new bootstrap.Modal(document.getElementById('editModel'), {

                keyboard: false
            });

            myModel.show()
            console.log(odf_racks)

        }

        function updateOdf(odf_racks) {

            var id = $("#_id").val()
            var url = '/odf_racks/' + id

            var formData2 = {

                'region_id': $("#_region_id").val(),
                'odf_device_id': $("#_odf_device_id").val(),
                'odf_rack_name': $("#_odf_rack_name").val(),
                'device_address': $("#_device_address").val(),
                'device_status': $("#_device_status").val(),
                'device_site_id': $("#_device_site_id").val(),
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

        var form = $("#odfRackCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'region_id': $("#region_id").val(),
                'odf_rack_name': $("#odf_rack_name").val(),
                'device_status': $("#device_status").val(),
                'odf_device_id': $("#odf_device_id").val(),
                'device_address': $("#device_address").val(),
                'device_site_id': $("#device_site_id").val(),
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


