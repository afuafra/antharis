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

        <button onclick="update({{$service}})">Edit</button>


    </td>
</tr>




<div class="container-fluid">
    <div class="modal fade" id="updateService{{$service->id}}" tabindex="-1"
         role="dialog"
         aria-labelledby="updateService" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateService">Update
                        Service</h5>



                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div id="success2">
                    {{$service->id}}

                </div>

                <form class="container-fluid" id="serviceUpdate_{{$service->id}}"
                      method="POST"
                      action="{{route("services.update",$service->id)}}">
                    @method('PUT')
                    <input type="hidden" value="{{ csrf_token() }}"
                           name="_token" id="csrf1">

                    <div class="mb-3">
                        <label class="form-label">Order Number</label>
                        <input type="text" class="form-control"
                               name="OrderNumber"
                               id="updateOrderNumber">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Service Number</label>
                        <input type="text" class="form-control"
                               name="ServiceNumber"
                               id="updateServiceNumber">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Customer Name</label>
                        <input type="text" class="form-control"
                               name="CustomerName"
                               id="updateCustomerName">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Customer Address</label>
                        <input type="text" class="form-control"
                               name="CustomerAddress"
                               id="updateCustomerAddress">
                        <div class="form-text">
                            City/Atoll_District/Island_Site
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Service Status</label>
                        <input class="form-control"
                               name="ServiceStatus"
                               id="updateServiceStatus">
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary mr-2 close"
                                data-dismiss="modal">back</button>
                        <button  type="submit"
                                 class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>

        function update(service){

            $("#updateOrderNumber").val(service.orderNumber)
            var myModel = new bootstrap.Modal(document.getElementById('updateService'+service.id),{

                keyboard: false
            });

            myModel.show()
            console.log(service)

        }


        var form2 = $("#serviceUpdate_"+{{$service->id}})
        var method2 = form2.attr('method')
        var url2 = form2.attr('action')


        // var token= $("#csrf").val()
        // var partNo = $("#orderNumber").val()


        form2.submit(function (e) {

            console.log(url2)
            e.preventDefault();
            return
            // alert(url2)


            var formData2 = {

                '_method': 'PUT',
                'orderNumber': $("#updateOrderNumber").val(),
                'serviceNumber': $("#updateServiceNumber").val(),
                'customerName': $("#updateCustomerName").val(),
                'customerAddress': $("#updateCustomerAddress").val(),
                'serviceStatus': $("#updateServiceStatus").val(),
                '_token': $("#csrf1").val()

            }


            $.post(url2, formData2, function (data) {

                console.log('Success', data)


                $("#success2").text('Yey!! Service Updated')
                // setTimeout(() => {
                //
                //     location.reload()
                //
                // }, 300)

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
