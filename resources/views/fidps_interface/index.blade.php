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
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($fidps as $fidp)
                                {{--                            @include('services.service_item',['service'=>$service])--}}
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



@endsection
@push('scripts')
    <script>

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


