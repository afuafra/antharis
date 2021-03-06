@extends("layout")
@section("olts")


    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">OLT</h4>
                </div>

                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round" type="submit">OLT Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal"
                                data-target="#exampleModal">
                            +Add olts
                        </button>
                    </form>
                </div>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add OLT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="oltsCreate" method="POST"
                                          action="{{route("olts.store")}}"
                                          oninput="olt_device_id.value = 'OLT' +'|'+ olt_name.value +'|'+ device_site_id.selectedOptions[0].text">


                                        <div class="modal-body">

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
                                                <label class="form-label">olt_name</label>
                                                <input type="text" class="form-control" name="olt_name"
                                                       id="olt_name">
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
                                                <label class="form-label">olt_device_id</label>
                                                <input type="text" class="form-control" name="olt_device_id"
                                                       id="olt_device_id" readonly>
                                            </div>

                                            <div class="modal-footer">
                                                <a href="{{route("olts.index")}}" class="btn btn-secondary"
                                                   data-bs-dismiss="modal">back</a>
                                                <input name="submit" type="submit" class="btn btn-primary">
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
                                    <strong>OLT Name</strong>
                                </th>
                                <th>
                                    <strong>OLT Device ID</strong>
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
                                    <strong>Region</strong>
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
                            @foreach ($olt_list as $olt)
                                {{--                            @include('services.service_item',['service'=>$service])--}}
                                <tr>

                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                           data-bs-target="#routeView">

                                        {{$olt->olt_name}}
                                    </td>
                                    <td>
                                        {{$olt->olt_device_id}}
                                    </td>
                                    <td>
                                        {{$olt->device_address}}
                                    </td>
                                    <td>
                                        {{$olt->device_status}}
                                    </td>
                                    <td>
                                        {{$olt->device_site->atollislandsite}}
                                    </td>
                                    <td>
                                        {{$olt->region->region_name}}
                                    </td>
                                    <td>
                                        <a onclick="editOlt({{$olt}})">
                                            <i class="fas fa-edit text-success fa-lg"></i></a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" id="oltDelete" data-target=".bd-example-modal-lg" data-attr="{{ route('olt', $olt->id) }}" title="Delete OLT">
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
                        {!! $olt_list->links() !!}
                    </ul>
                </nav>

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
                          oninput="_olt_device_id.value = 'OLT' +'|'+ _olt_name.value +'|'+ _device_site_id.selectedOptions[0].text">
                        <div class="mb-3">
                            <input type="hidden" id="_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Region </label>
                            <select class="form-control"
                                    data-style="select-with-transition btn-primary btn-round "
                                    name="_region_id" id="_region_id">
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
                            <label class="form-label">olt_name</label>
                            <input type="text" class="form-control" name="_olt_name"
                                   id="_olt_name">
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
                            <label class="form-label">olt_device_id</label>
                            <input type="text" class="form-control" name="_olt_device_id"
                                   id="_olt_device_id">
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


        function editOlt(olts) {
            $("#_id").val(olts.id)
            $("#_region_id").val(olts.region_id)
            $("#_olt_name").val(olts.olt_name)
            $("#_device_address").val(olts.device_address)
            $("#_device_status").val(olts.device_status)
            $("#_device_site_id").val(olts.device_site_id)
            $("#_olt_device_id").val(olts.olt_device_id)
            $("#_region_id").selectpicker("refresh");
            $("#_device_site_id").selectpicker("refresh");

            var myModel = new bootstrap.Modal(document.getElementById('editModel'), {

                keyboard: false
            });

            myModel.show()
            console.log(olts)

        }

        function updateOlt(olts) {

            var id = $("#_id").val()
            var url = '/olts/' + id

            var formData2 = {

                'region_id': $("#_region_id").val(),
                'olt_name': $("#_olt_name").val(),
                'olt_device_id': $("#_olt_device_id").val(),
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


        var form = $("#oltsCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'region_id': $("#region_id").val(),
                'olt_name': $("#olt_name").val(),
                'olt_device_id': $("#olt_device_id").val(),
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


