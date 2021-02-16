@extends("layout")
@section("services")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Device Sites</h4>
                </div>

                <form class="form-inline" action="" method="get">
                    <div class="form-group mx-sm-3">
                        <input class="form-control" name='search' type="search" placeholder="Search">
                    </div>

                    <button class="btn btn-primary" type="submit">Search</button>
                </form>

                {{--                <div class="container-fluid">--}}
                {{--                    <a href="{{route("devicesites.create")}}" type="button" class="btn btn-primary" data-bs-toggle="modal">--}}
                {{--                        +Device Site--}}
                {{--                    </a>--}}
                {{--                    <!-- Button trigger modal -->--}}
                {{--                    <a href="{{route("services.create")}}">Add Record</a>--}}

                {{--                    <div class="alert-box failure">{{session("msg")}}</div>--}}
                <div class="container-fluid">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        +Add Device Site
                    </button>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="success"></div>

                                    <form class="container-fluid" id="deviceSiteCreate" method="POST"
                                          action="{{route("devicesites.store")}}"
                                          oninput="atollislandsite.value = AtollCity.value +'_'+ IslandDistrict.value+'_'+ Site.value">

                                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                        <div class="mb-3">
                                            <label class="form-label">Atoll/City</label>
                                            <input type="text" class="form-control" name="AtollCity" id="AtollCity">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Island/District</label>
                                            <input type="text" class="form-control" name="IslandDistrict"
                                                   id="IslandDistrict">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Site</label>
                                            <input type="text" class="form-control" name="Site" id="Site">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Atoll Island Site</label>
                                            <input type="text" class="form-control" name="atollislandsite"
                                                   id="atollislandsite">
                                        </div>

                                        <div class="modal-footer">
                                            <a href="{{route("devicesites.index")}}" class="btn btn-secondary"
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
                            <th>
                                <strong>Atoll/City</strong>
                            </th>
                            <th>
                                <strong>Island/District</strong>
                            </th>
                            <th>
                                <strong>Site</strong>
                            </th>
                            <th>
                                <strong>Device Site</strong>
                            </th>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach ($devicesites as $devicesite)
                                    <td>
                                        {{$devicesite->AtollCity}}
                                    </td>
                                    <td>
                                        {{$devicesite->IslandDistrict}}
                                    </td>
                                    <td>
                                        {{$devicesite->Site}}
                                    </td>
                                    <td>
                                        {{$devicesite->atollislandsite}}
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

                        {{--                        <style>--}}
                        {{--                            .page-link {--}}
                        {{--                                position: relative;--}}
                        {{--                                display: block;--}}
                        {{--                                padding: .5rem .75rem;--}}
                        {{--                                margin-left: -1px;--}}
                        {{--                                line-height: 1.25;--}}
                        {{--                                color: #d9d9d9 !important;--}}
                        {{--                                background-color: #f96332 !important;--}}
                        {{--                                border: 1px solid #eb7134 !important;--}}
                        {{--                            }--}}
                        {{--                            .page-link:hover {--}}
                        {{--                                z-index: 2;--}}
                        {{--                                color: #fff !important;--}}
                        {{--                                text-decoration: none;--}}
                        {{--                                background-color: #fa7a50 !important;--}}
                        {{--                                border-color: #dee2e6;--}}
                        {{--                            }--}}
                        {{--                            .page-item.active .page-link {--}}
                        {{--                                z-index: 3;--}}
                        {{--                                color: #fff;--}}
                        {{--                                background-color: #f56c50 !important;--}}
                        {{--                                border-color: #353535;--}}
                        {{--                            }--}}
                        {{--                        </style>--}}


                        <nav aria-label="">
                            <ul class="">
                                {!! $devicesites->links() !!}
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>


        @endsection
        @push('scripts')
            <script>
                var form = $("#deviceSiteCreate")
                var method = form.attr('method')
                var url = form.attr('action')
                // var token= $("#csrf").val()
                // var partNo = $("#orderNumber").val()


                form.submit(function (e) {

                    // e.preventDefault();

                    var formData = {

                        'AtollCity': $("#AtollCity").val(),
                        'IslandDistrict': $("#IslandDistrict").val(),
                        'Site': $("#Site").val(),
                        'atollislandsite': $("#atollislandsite").val(),
                        '_token': $("#csrf").val()

                    }


                    $.post(url, formData, function (data) {

                        // console.log('Success', data)


                        $("#success").text('Yey!! Device Site Created')
                        setTimeout(() => {

                            location.reload()

                        }, 300)
                        location.reload()

                    }).fail(function (error) {

                        console.error('ERROR', error.responseJSON.errors)

                    })


                    e.preventDefault();


                });

                // $(document).ready(function(){
                //
                // })


            </script>
    @endpush


