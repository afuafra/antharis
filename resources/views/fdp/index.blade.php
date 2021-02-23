@extends("layout")
@section("fdpsInterface")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">FDP </h4>
                </div>

                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">FDP Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal"
                                data-target="#exampleModal">
                            +Add FDP
                        </button>
                    </form>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add fdp</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="fdpsCreate" method="POST"
                                          action="{{route("fdp.store")}}"
                                          oninput="fdp_device_id.value = device_type.value +'|'+ fdp_no.value +'|'+ device_site_id.selectedOptions[0].text">


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
                                                <label class="form-label">FDP Type</label>
                                                <select class="form-control" name="device_type" list="list"
                                                        id="device_type" data-style="select-with-transition btn-primary btn-round" >
                                                    <option value="FEDP">FEDP</option>
                                                    <option value="FPDP">FPDP</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">FDP NO</label>
                                                <input type="text" class="form-control" name="fdp_no"
                                                       id="fdp_no">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Device Address</label>
                                                <input type="text" class="form-control" name="device_address"
                                                       id="device_address">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Device Status</label>
                                                <input type="text" class="form-control" name="device_status"
                                                       id="device_status">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">FDP Device ID</label>
                                                <input type="text" class="form-control" name="fdp_device_id"
                                                       id="fdp_device_id" readonly>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("fdp.index")}}" class="btn btn-secondary"
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
                                    <strong>Name</strong>
                                </th>
                                <th>
                                    <strong>Device Address</strong>
                                </th>
                                <th>
                                    <strong>Device Status</strong>
                                </th>
                                <th>
                                    <strong>Device Site</strong>
                                </th>
                                <th>
                                    <strong>FDP No</strong>
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
                            @foreach ($fdp_list as $fdp)
                                {{--                            @include('services.service_item',['service'=>$service])--}}
                                <tr>

                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                           data-bs-target="#routeView">

                                        {{$fdp->fdp_device_id}}
                                    </td>
                                    <td>
                                        {{$fdp->device_address}}
                                    </td>
                                    <td>
                                        {{$fdp->device_status}}
                                    </td>
                                    <td>
                                        {{$fdp->device_site->atollislandsite}}
                                    </td>
                                    <td>
                                        {{$fdp->fdp_no}}
                                    </td>
                                    <td>
                                        <a onclick="editFdp({{$fdp}})">
                                            <i class="fas fa-edit text-success fa-lg"></i></a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" id="oltDelete" data-target=".bd-example-modal-lg"
                                           data-attr="{{ route('fdp', $fdp->id) }}" title="Delete FDP">
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
                                {!! $fdp_list->links() !!}
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
                        <h5 class="modal-title" id="exampleModalLabel">Update fdp</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="container-fluid"
                          oninput="_fdp_device_id.value = _device_type.value +'|'+ _fdp_no.value +'|'+ _device_site_id.selectedOptions[0].text">
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
                            <label class="form-label">FDP Type</label>
                            <select class="form-control" name="_device_type" list="list"
                                    id="_device_type" data-style="select-with-transition btn-primary btn-round" >
                                <option value="FEDP">FEDP</option>
                                <option value="FPDP">FPDP</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">FDP NO</label>
                            <input type="text" class="form-control" name="_fdp_no"
                                   id="_fdp_no">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Device Address</label>
                            <input type="text" class="form-control" name="_device_address"
                                   id="_device_address">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Device Status</label>
                            <input type="text" class="form-control" name="_device_status"
                                   id="_device_status">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">FDP Device ID</label>
                            <input type="text" class="form-control" name="_fdp_device_id"
                                   id="_fdp_device_id" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <button type="button" onclick="updateFdp()" class="btn btn-primary">Update</button>
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

        function editFdp(fdp) {
            $("#_id").val(fdp.id)
            $("#_region_id").val(fdp.region_id)
            $("#_fdp_no").val(fdp.fdp_no)
            $("#_device_address").val(fdp.device_address)
            $("#_device_status").val(fdp.device_status)
            $("#_device_site_id").val(fdp.device_site_id)
            $("#_fdp_device_id").val(fdp.fdp_device_id)
            $("#_device_type").val(fdp.device_type)

            var myModel = new bootstrap.Modal(document.getElementById('editModel'), {

                keyboard: false
            });

            myModel.show()
            console.log(fdp)

        }

        function updateFdp(fdp) {

            var id = $("#_id").val()
            var url = '/fdp/' + id

            var formData2 = {

                'region_id': $("#_region_id").val(),
                'fdp_no': $("#_fdp_no").val(),
                'fdp_device_id': $("#_fdp_device_id").val(),
                'device_address': $("#_device_address").val(),
                'device_status': $("#_device_status").val(),
                'device_site_id': $("#_device_site_id").val(),
                'device_type': $("#device_type").val(),
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

        var form = $("#fdpsCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'region_id': $("#region_id").val(),
                'fdp_no': $("#fdp_no").val(),
                'device_type': $("#device_type").val(),
                'fdp_device_id': $("#fdp_device_id").val(),
                'device_address': $("#device_address").val(),
                'device_status': $("#device_status").val(),
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


