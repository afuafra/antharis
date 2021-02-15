@extends("layout")
@section("fidpsInterface")



    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">FDP Splitter</h4>
                </div>


                <form class="form-inline" action="" method="get">
                    <div class="form-group mx-sm-3">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input class="form-control" name='search' type="search" placeholder="Search">
                    </div>

                    <button class="btn btn-primary" type="submit">Search</button>
                </form>

                <div class="container-fluid">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        +Add FDP Splitter
                    </button>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add FDP Splitter</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="splitterCreate" method="POST"
                                          action="{{route("fdp_splitters.store")}}" oninput="fdp_splitter_device_id.value = 'SPLITTER' +'|'+ fdp_splitter_no.value +'|'+ fdp_id.selectedOptions[0].text">


                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">FDP Splitter No</label>
                                                <input type="text" class="form-control" name="fdp_splitter_no"
                                                       id="fdp_splitter_no">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">FDP Device Name </label>
                                                <select class="form-control" id="fdp_id" name="fdp_id"  >
                                                    @foreach($fdp_list as $fdp_li)
                                                        <option value="{{ $fdp_li->id }}">{{ $fdp_li->fdp_device_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">FDP Splitter Device ID</label>
                                                <input type="text" class="form-control" name="fdp_splitter_device_id"
                                                       id="fdp_splitter_device_id">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("fdp_splitters.index")}}" class="btn btn-secondary"
                                               data-bs-dismiss="modal">Back</a>
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
                                    <strong>Splitter No</strong>
                                </th>
                                <th>
                                    <strong>FDP Splitter Device Name</strong>
                                </th>
                                <th>
                                    <strong>FDP Device Name</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($splitters as $splitter)
                                {{--                            @include('services.service_item',['service'=>$service])--}}
                                <tr>

                                    <td>
                                        <a href="" class="text-primary" data-bs-toggle="modal"
                                           data-bs-target="#routeView">

                                        {{$splitter->fdp_splitter_no}}
                                    </td>
                                    <td>
                                        {{$splitter->fdp_splitter_device_id}}
                                    </td>
                                    <td>
                                        {{$splitter->fdp->fdp_device_id}}

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
                                {!! $splitters->links() !!}
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

        var form = $("#splitterCreate")
        var method = form.attr('method')
        var url = form.attr('action')


        form.submit(function (e) {


            var formData = {

                'fdp_splitter_no': $("#fdp_splitter_no").val(),
                'fdp_id': $("#fdp_id").val(),
                'fdp_splitter_device_id': $("#fdp_splitter_device_id").val(),
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


