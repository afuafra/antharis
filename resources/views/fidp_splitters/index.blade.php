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
                                                <select class="form-control" id="fidp_id" name="fidp_id" data-style="select-with-transition btn-primary btn-round " data-live-search="true" >
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
                                <th>
                                    <strong>Edit</strong>
                                </th>
                                <th>
                                    <strong>Delete</strong>
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
                                    <td>
                                        <a onclick="editSplitter({{$splitter}})">
                                            <i class="fas fa-edit text-success fa-lg"></i></a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" id="oltDelete" data-target=".bd-example-modal-lg" data-attr="{{ route('fidp_splitter', $splitter->id) }}" title="Delete FDP Splitter">
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
                                {!! $splitters->links() !!}
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
                        <h5 class="modal-title" id="exampleModalLabel">Update FIDP Splitter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="container-fluid"
                          oninput="_fidp_splitter_device_id.value = 'SPLITTER' +'|'+ _fidp_splitter_no.value +'|'+ _fidp_id.selectedOptions[0].text">
                        <div class="mb-3">
                            <input type="hidden" id="_id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">FIDP Splitter No</label>
                            <input type="text" class="form-control" name="_fidp_splitter_no"
                                   id="_fidp_splitter_no">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">FIDP Device Name</label>
                            <select class="form-control" id="_fidp_id" name="_fidp_id"  data-style="select-with-transition btn-primary btn-round " data-live-search="true">
                                @foreach($fidp_list as $fidp_li)
                                    <option value="{{ $fidp_li->id }}">{{ $fidp_li->fidp_device_id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">FIDP Splitter Device ID</label>
                            <input type="text" class="form-control" name="_fidp_splitter_device_id"
                                   id="_fidp_splitter_device_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <button type="button" onclick="updateSplitter()" class="btn btn-primary">Update</button>
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

        function editSplitter(fdp_splitters) {
            $("#_id").val(fdp_splitters.id)
            $("#_fidp_splitter_no").val(fdp_splitters.fidp_splitter_no)
            $("#_fidp_id").val(fdp_splitters.fidp_id)
            $("#_fidp_splitter_device_id").val(fdp_splitters.fidp_splitter_device_id)

            var myModel = new bootstrap.Modal(document.getElementById('editModel'), {

                keyboard: false
            });

            myModel.show()
            console.log(fdp_splitters)

        }

        function updateSplitter(fdp_splitters) {

            var id = $("#_id").val()
            var url = '/fidp_splitters/' + id

            var formData2 = {

                'fidp_splitter_no': $("#_fidp_splitter_no").val(),
                'fidp_id': $("#_fidp_id").val(),
                'fidp_splitter_device_id': $("#_fidp_splitter_device_id").val(),
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


        $(function () {
            $('select').selectpicker();
        });


    </script>
@endpush


