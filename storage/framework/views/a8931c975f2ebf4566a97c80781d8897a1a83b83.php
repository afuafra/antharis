<?php $__env->startSection("services"); ?>

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Services</h4>
                </div>
                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">Service Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal"
                                data-target="#exampleModal">
                            +Add Service
                        </button>
                    </form>

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
                                          action="<?php echo e(route("services.store")); ?>">

                                        <div class="modal-body">


                                            <div id="success"></div>


                                            <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token" id="csrf">

                                            <div class="mb-3">
                                                <label class="form-label">Order Number</label>
                                                <input type="text" class="form-control" name="order_number"
                                                       id="order_number">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Service Number</label>
                                                <input type="text" class="form-control" name="service_number"
                                                       id="service_number">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Customer Name</label>
                                                <input type="text" class="form-control" name="customer_name"
                                                       id="customer_name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Customer Address</label>
                                                <input type="text" class="form-control" name="customer_address"
                                                       id="customer_address">
                                                <div class="form-text">City/Atoll_District/Island_Site</div>
                                            </div>
                                            <<div class="mb-3">
                                                <label class="form-label">Service Number</label>
                                                <input type="text" class="form-control" name="street"
                                                       id="street">
                                            </div>
                                        <div class="modal-footer">
                                            <a href="<?php echo e(route("services.index")); ?>" class="btn btn-secondary"
                                               data-bs-dismiss="modal">back</a>
                                            <input name="submit" type="submit" class="btn btn-primary"></input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                
                

                <div class="alert-box failure"><?php echo e(session("msg")); ?></div>


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
                                <th>
                                    <strong>Action</strong>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td>
                                        <?php echo e($service->order_number); ?>

                                    </td>
                                    <td>
                                        
                                        

                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        


                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <?php echo e($service->service_number); ?>

                                    </td>
                                    <td>
                                        <?php echo e($service->customer_name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($service->customer_address); ?>

                                    </td>
                                    <td>
                                        <?php echo e($service->service_status); ?>

                                    </td>
                                    <td>
                                        <?php if(isset($service->fidpsinterface[0]->fidps->fidp_device_id)): ?>
                                            <?php echo e($service->fidpsinterface[0]->fidps->fidp_device_id); ?>

                                        <?php else: ?>
                                        <?php endif; ?>

                                    </td>
                                    <td>
                                        
                                        
                                        
                                        

                                        <button type="button" rel="tooltip" class="btn btn-round btn-round-xs mr5"
                                                onclick="editService(<?php echo e($service); ?>)">
                                            <i class="now-ui-icons ui-2_settings-90"></i></button>

                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="card-footer">
                            <div class="stats">
                                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                            </div>
                        </div>


                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php echo $services->links(); ?>

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
                            <input type="text" id="_order_number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Service Number</label>
                            <input type="text" id="_service_number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Customer Name</label>
                            <input type="text" id="_customer_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Customer Address</label>
                            <input type="text" id="_customer_address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Service Status</label>
                            <input type="text" id="_service_status" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="updateService()" class="btn btn-primary">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <?php $__env->stopSection(); ?>
            <?php $__env->startPush('scripts'); ?>
                <script>

                    function editService(service) {
                        $("#_id").val(service.id)
                        $("#_order_number").val(service.order_number)
                        $("#_service_number").val(service.service_number)
                        $("#_customer_name").val(service.customer_name)
                        $("#_customer_address").val(service.customer_address)
                        $("#_service_status").val(service.service_status)

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


                            'order_number': $("#_order_number").val(),
                            'service_number': $("#_service_number").val(),
                            'customer_name': $("#_customer_name").val(),
                            'customer_address': $("#_customer_address").val(),
                            'service_status': $("#_service_status").val(),
                            '_token': "<?php echo e(csrf_token()); ?>"

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
                    // var partNo = $("#order_number").val()


                    form.submit(function (e) {

                        // e.preventDefault();

                        var formData = {

                            'order_number': $("#order_number").val(),
                            'service_number': $("#service_number").val(),
                            'customer_name': $("#customer_name").val(),
                            'customer_address': $("#customer_address").val(),
                            'service_status': $("#service_status").val(),
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
    <?php $__env->stopPush(); ?>



<?php echo $__env->make("layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\antharis\resources\views/services/index.blade.php ENDPATH**/ ?>