@extends("layout")
@section("users")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Users</h4>
                </div>

                <div class="container-fluid">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td colspan="1">
                                <form class="well form-horizontal">
                                    <fieldset>
                                        <label class="col-md-4 control-label">User Search</label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                                <select class="selectpicker form-control">
                                                    <option></option>
                                                    <option>OLT</option>
                                                    <option>FCAB</option>
                                                    <option>FDP</option>
                                                    <option>FIDP</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </td>
                        </tbody>
                    </table>
                </div>

                <div class="container-fluid">
                    <a href="{{route("users.create")}}" type="button" class="btn btn-primary" data-bs-toggle="modal">
                        +Add User
                    </a>
                    <!-- Button trigger modal -->
                    {{--                    <a href="{{route("services.create")}}">Add Record</a>--}}

                    <div class="alert-box failure">{{session("msg")}}</div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>
                                    <strong>User Name</strong>
                                </th>
                                <th>
                                    <strong>Email Address</strong>
                                </th>
{{--                                <th>--}}
{{--                                    <strong>User Type</strong>--}}
{{--                                </th>--}}
                                <th>
                                    <strong>Action</strong>
                                </th>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach ($users as $user)
                                        <td>
                                            <a href="users" onclick="<"class="text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Staff Information</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>{{$user->name}}</a>
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
{{--                                        <td>--}}
{{--                                            {{$user->usertype}}--}}
{{--                                        </td>--}}
                                        <td><a href="users_delete/{{$user->id}}">Delete</a></td>
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
                                    {!! $users->links() !!}
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
