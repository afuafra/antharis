@extends("layout")
@section("fidpsInterface")



    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">FIDP Splitter</h4>
                </div>


                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">FIDP Splitter Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal" data-target="#exampleModal">
                            +Add FIDP Splitter
                        </button>
                    </form>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add FIDP Splitter</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="container-fluid" id="splitterCreate" method="POST"
                                          action="{{route("fidp_splitters.store")}}" oninput="fidp_splitter_device_id.value = 'SPLITTER' +'|'+ fidp_splitter_no.value +'|'+ fidp_id.selectedOptions[0].text">


                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">FIDP splitter no</label>
                                                <input type="text" class="form-control" name="fidp_splitter_no"
                                                       id="fidp_splitter_no">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">FIDP Device Name </label>
                                                <select class="form-control" id="fidp_id" name="fidp_id"  >
                                                    @foreach($fidp_list as $fidp_li)
                                                        <option value="{{ $fidp_li->id }}">{{ $fidp_li->fidp_device_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">FIDP Splitter Device ID</label>
                                                <input type="text" class="form-control" name="fidp_splitter_device_id"
                                                       id="fidp_splitter_device_id">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("fidp_splitters.index")}}" class="btn btn-secondary"
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
                                    <strong>Splitter No</strong>
                                </th>
                                <th>
                                    <strong>FIDP Splitter Device Name</strong>
                                </th>
                                <th>
                                    <strong>FIDP Device Name</strong>
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

                                        {{$splitter->fidp_splitter_no}}
                                    </td>
                                    <td>
                                        {{$splitter->fidp_splitter_device_id}}
                                    </td>
                                    <td>
                                        {{$splitter->fidp->fidp_device_id}}

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

                'fidp_splitter_no': $("#fidp_splitter_no").val(),
                'fidp_id': $("#fidp_id").val(),
                'fidp_splitter_device_id': $("#fidp_splitter_device_id").val(),
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


