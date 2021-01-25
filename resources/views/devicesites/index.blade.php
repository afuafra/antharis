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

                    <div class="container-fluid">
                        <table class="table">
                            <tbody>
                                    <form class="well form-horizontal">
                                        <fieldset>
                                            <label class="col-md-4 control-label">Service Number Search</label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
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
                    <a href="{{route("devicesites.create")}}" type="button" class="btn btn-primary" data-bs-toggle="modal">
                        +Device Site
                    </a>
{{--                    <!-- Button trigger modal -->--}}
{{--                    <a href="{{route("services.create")}}">Add Record</a>--}}

                    <div class="alert-box failure">{{session("msg")}}</div>


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

                        <style>
                            .page-link {
                                position: relative;
                                display: block;
                                padding: .5rem .75rem;
                                margin-left: -1px;
                                line-height: 1.25;
                                color: #d9d9d9 !important;
                                background-color: #f96332 !important;
                                border: 1px solid #eb7134 !important;
                            }
                            .page-link:hover {
                                z-index: 2;
                                color: #fff !important;
                                text-decoration: none;
                                background-color: #fa7a50 !important;
                                border-color: #dee2e6;
                            }
                            .page-item.active .page-link {
                                z-index: 3;
                                color: #fff;
                                background-color: #f56c50 !important;
                                border-color: #353535;
                            }
                        </style>


                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {!! $devicesites->links() !!}
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>


        </body>
        </html>
    </div>
@endsection


