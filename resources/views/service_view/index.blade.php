@extends("layout")
@section("services")

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service View</h4>
                </div>

                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">Service Search</button>

                    </form>


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
                                    <strong>FIDP Name</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($services as $service)

                                <tr>
                                    <td>
                                        {{$service->orderNumber}}
                                    </td>
                                    <td>
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
                                        @if(isset($service->fidpsinterface[0]->fidps->fidp_device_id))
                                            {{$service->fidpsinterface[0]->fidps->fidp_device_id}}
                                        @else
                                        @endif

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
                            <button type="button" onclick="updateService()" class="btn btn-primary">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @endsection
            @push('scripts')
                <script>

                    function editService(service) {
                        $("#_id").val(service.id)
                        $("#_orderNumber").val(service.orderNumber)
                        $("#_serviceNumber").val(service.serviceNumber)
                        $("#_customerName").val(service.customerName)
                        $("#_customerAddress").val(service.customerAddress)
                        $("#_serviceStatus").val(service.serviceStatus)

                        var myModel = new bootstrap.Modal(document.getElementById('editModel'), {

                            keyboard: false
                        });

                        myModel.show()
                        console.log(service)

                    }

                    function updateService(service) {

                        var id = $("#_id").val()
                        var url = '/services/' + id

                        var formData2 = {


                            'orderNumber': $("#_orderNumber").val(),
                            'serviceNumber': $("#_serviceNumber").val(),
                            'customerName': $("#_customerName").val(),
                            'customerAddress': $("#_customerAddress").val(),
                            'serviceStatus': $("#_serviceStatus").val(),
                            '_token': "{{ csrf_token() }}"

                        }

                        $.ajax({

                            type: "PUT",
                            url: url,
                            data: formData2,
                            dataType: "json",


                            success: function (data) {

                                $("").text('Yey!! Service Updated')
                                setTimeout(() => {

                                    location.reload()

                                }, 300)

                            },

                            error: function (error) {

                                console.error('ERROR:', error)

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


