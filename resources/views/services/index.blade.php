@extends("layout")
@section("services")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Services</h4>
                </div>

                <form class="form-inline" action="" method="get">
                    <div class="form-group mx-sm-3">
                        <input class="form-control" name='search' type="search" placeholder="Search">
                    </div>

                    <button class="btn btn-primary" type="submit">Search</button>
                </form>

                {{--                <div class="container-fluid">--}}
                {{--                    <a href="{{route("services.create")}}" type="button" class="btn btn-primary" data-bs-toggle="modal">--}}
                {{--                        +Add Service--}}
                {{--                    </a>--}}


                {{--                    <div class="container-fluid">--}}
                {{--                    <a href="" type="button" class="btn btn-primary" data-bs-toggle="modal">--}}
                {{--                        +Add Service--}}
                {{--                    </a>--}}
                <div class="container-fluid">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        +Add Service
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
                                    <form class="container-fluid" id="serviceCreate" method="POST"
                                          action="{{route("services.store")}}">

                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="{{ csrf_token() }}" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">Order Number</label>
                                                <input type="text" class="form-control" name="orderNumber"
                                                       id="orderNumber">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Service Number</label>
                                                <input type="text" class="form-control" name="serviceNumber"
                                                       id="serviceNumber">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Customer Name</label>
                                                <input type="text" class="form-control" name="customerName"
                                                       id="customerName">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Customer Address</label>
                                                <input type="text" class="form-control" name="customerAddress"
                                                       id="customerAddress">
                                                <div class="form-text">City/Atoll_District/Island_Site</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Service Status</label>
                                                <select class="form-control" name="serviceStatus" id="serviceStatus">
                                                    <option></option>
                                                    <option>Working</option>
                                                    <option>Allocated</option>
                                                    <option>Ceased</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route("services.index")}}" class="btn btn-secondary"
                                               data-bs-dismiss="modal">back</a>
                                            <input name="submit" type="submit" class="btn btn-primary"></input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                <div id="errorCreate"></div>--}}
                {{--                    <!-- Button trigger modal -->--}}
                {{--                    <a href="{{route("services.create")}}">Add Record</a>--}}

                <div class="alert-box failure">{{session("msg")}}</div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    <strong>Order Number</strong>
                                </th>
                                <th>
                                    <strong>Service Number</strong>
                                </th>
                                <th>
                                    <strong>Customer Name</strong>
                                </th>
                                <th>
                                    <strong>Customer Address</strong>
                                </th>
                                <th>
                                    <strong>Service Status</strong>
                                </th>
                                <th>
                                    <strong>Action</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($services as $service)
{{--                            @include('services.service_item',['service'=>$service])--}}
                                    <tr>
    <td>
        {{$service->orderNumber}}
    </td>
    <td>
        <a href="" onclick="<" class="text-primary" data-bs-toggle="modal"
           data-bs-target="#routeView">

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="routeView" tabindex="-1"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Route
                                View</h5>
                            <button type="button" class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div class="container">
                                <table class="table table-striped">
                                    <thead class="text-primary fs-16">
                                    <th><strong>Device Type</strong></th>
                                    <th><strong>Device Name</strong></th>
                                    <th><strong>Port Name</strong></th>
                                    {{--                                    <th class="text-right">Actions</th>--}}
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>FIDP</td>
                                        <td>FIDP|320-13A|Male'_Henveiru_HSahara</td>
                                        <td>A/3</td>
                                        {{--                                        <td class="td-actions text-right">--}}
                                        {{--                                            <button type="button" rel="tooltip" class="btn btn-success">--}}
                                        {{--                                                <i class="now-ui-icons ui-2_settings-90"></i>--}}
                                        {{--                                            </button>--}}
                                        {{--                                        </td>--}}
                                    </tr>
                                    <tr>
                                        <td>FDP</td>
                                        <td>FIDP|320-13|Male'_Henveiru_HSahara</td>
                                        <td>O/3</td>
                                    </tr>
                                    <tr>
                                        <td>FDP-SPLITTER</td>
                                        <td>
                                            SPLITTER-1|320-13|Male'_Henveiru_HSahara
                                        </td>
                                        <td>OUT-3</td>
                                    </tr>
                                    <tr>
                                        <td>FDP-SPLITTER</td>
                                        <td>
                                            SPLITTER-1|320-13|Male'_Henveiru_HSahara
                                        </td>
                                        <td>IN-1</td>
                                    </tr>
                                    <tr>
                                        <td>FDP</td>
                                        <td>FDP|320-13|Male'_Henveiru_HSahara</td>
                                        <td>P/3</td>
                                    </tr>
                                    <tr>
                                        <td>FCAB</td>
                                        <td>FCAB|320|Male'_Henveiru_HSahara</td>
                                        <td>N/3</td>
                                    </tr>
                                    <tr>
                                        <td>FCAB-SPLITTER</td>
                                        <td>SPLITTER-X1|320|Male'_Henveiru_HSahara
                                        </td>
                                        <td>OUT-3</td>
                                    </tr>
                                    <tr>
                                        <td>FCAB-SPLITTER</td>
                                        <td>SPLITTER-X1|320|Male'_Henveiru_HSahara
                                        </td>
                                        <td>IN-1</td>
                                    </tr>
                                    <tr>
                                        <td>FCAB</td>
                                        <td>FCAB|320|Male'_Henveiru_HSahara</td>
                                        <td>A/3</td>
                                    </tr>
                                    <tr>
                                        <td>ODF</td>
                                        <td>RACK-1|ODF-3|Male'_Henveiru_HSahara</td>
                                        <td>E/3</td>
                                    </tr>
                                    <tr>
                                        <td>OLT</td>
                                        <td>
                                            OLT|H.SAHARA-OLT-1|Male'_Henveiru_HSahara
                                        </td>
                                        <td>0/15/1</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{$service->serviceNumber}}
    </td>
    <td>
        {{$service->customerName}}
    </td>
    <td>
        {{$service->customerAddress}}
    </td>
    <td>
        {{$service->serviceStatus}}
    </td>
    <td>
        {{--        <button type="button" rel="tooltip" class="btn btn-success"--}}
        {{--                data-toggle="modal" data-target="#updateService{{$service->id}}">--}}
        {{--            <i class="now-ui-icons ui-2_settings-90"></i>--}}
        {{--        </button>--}}

        <button type="button" rel="tooltip" class="btn btn-round btn-round-xs mr5" onclick="editService({{$service}})">
        <i class="now-ui-icons ui-2_settings-90"></i></button>

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
                                {!! $services->links() !!}
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- Modal -->
    <div class="container-fluid">
    <div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="container-fluid">
                <div class="mb-3">
                        <input type="hidden" id="_id">
                </div>
                    <div class="mb-3">
                        <label class="form-label">Order Number</label>
                        <input type="text" id="_orderNumber" class="form-control">
                    </div>
                <div class="mb-3">
                    <label class="form-label">Service Number</label>
                    <input type="text" id="_serviceNumber" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Customer Name</label>
                    <input type="text" id="_customerName" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Customer Address</label>
                    <input type="text" id="_customerAddress" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Service Status</label>
                    <input type="text" id="_serviceStatus" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="updateService()" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>

@endsection
@push('scripts')
    <script>

        function editService(service){
            $("#_id").val(service.id)
            $("#_orderNumber").val(service.orderNumber)
            $("#_serviceNumber").val(service.serviceNumber)
            $("#_customerName").val(service.customerName)
            $("#_customerAddress").val(service.customerAddress)
            $("#_serviceStatus").val(service.serviceStatus)

            var myModel = new bootstrap.Modal(document.getElementById('editModel'),{

                keyboard: false
            });

            myModel.show()
            console.log(service)

        }

        function updateService(service){

            var id = $("#_id").val()
            var url = '/services/'+id

            var formData2 = {



                'orderNumber': $("#_orderNumber").val(),
                'serviceNumber': $("#_serviceNumber").val(),
                'customerName': $("#_customerName").val(),
                'customerAddress': $("#_customerAddress").val(),
                'serviceStatus': $("#_serviceStatus").val(),
                '_token': "{{ csrf_token() }}"

            }

           $.ajax({

                type:"PUT",
                url: url,
                data: formData2,
                dataType: "json",


                success: function (data){

                    $("").text('Yey!! Service Updated')
                    setTimeout(() => {

                        location.reload()

                    }, 300)

                },

                error: function (error){

                    console.error('ERROR:',error)

                }
            });



        }



        var form = $("#serviceCreate")
        var method = form.attr('method')
        var url = form.attr('action')
        // var token= $("#csrf").val()
        // var partNo = $("#orderNumber").val()


        form.submit(function (e) {

            // e.preventDefault();

            var formData = {

                'orderNumber': $("#orderNumber").val(),
                'serviceNumber': $("#serviceNumber").val(),
                'customerName': $("#customerName").val(),
                'customerAddress': $("#customerAddress").val(),
                'serviceStatus': $("#serviceStatus").val(),
                '_token': $("#csrf").val()

            }


            $.post(url, formData, function (data) {

                // console.log('Success', data)
                // console.log('Success', data)


                $("#success").text('Yey!! Service Created')
                setTimeout(() => {

                    location.reload()

                }, 300)


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


