<?php $__env->startSection("services"); ?>

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Device Sites</h4>
                </div>

                <div>
                    <form class="form-inline" action="" method="get">
                        <div class="form-group mx-sm-3">
                            <input class="form-control" name='search' type="search" placeholder="Search">
                        </div>
                        <button class="btn btn-primary btn-round mr-4" type="submit">Device Site Search</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round mr-4 ml-auto" data-toggle="modal" data-target="#exampleModal">
                            +Add Device Site
                        </button>
                    </form>

                    <!-- Modal -->
                    <div class="container-fluid">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Device Site</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="success"></div>

                                    <form class="container-fluid" id="deviceSiteCreate" method="POST"
                                          action="<?php echo e(route("devicesites.store")); ?>"
                                          oninput="atollislandsite.value = AtollCity.value +'_'+ IslandDistrict.value+'_'+ Site.value">

                                        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token" id="csrf">

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
                                            <a href="<?php echo e(route("devicesites.index")); ?>" class="btn btn-secondary"
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
                                <?php $__currentLoopData = $devicesites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $devicesite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <?php echo e($devicesite->AtollCity); ?>

                                    </td>
                                    <td>
                                        <?php echo e($devicesite->IslandDistrict); ?>

                                    </td>
                                    <td>
                                        <?php echo e($devicesite->Site); ?>

                                    </td>
                                    <td>
                                        <?php echo e($devicesite->atollislandsite); ?>

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

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        


                        <nav aria-label="">
                            <ul class="">
                                <?php echo $devicesites->links(); ?>

                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>


        <?php $__env->stopSection(); ?>
        <?php $__env->startPush('scripts'); ?>
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
    <?php $__env->stopPush(); ?>



<?php echo $__env->make("layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\antharis\resources\views/devicesites/index.blade.php ENDPATH**/ ?>