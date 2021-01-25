<?php $__env->startSection('inventory'); ?>



    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Inventory Search</h4>
                    </div>

                    <div class="container-fluid">
                        <table class="table">
                           <tbody>
                              <tr>
                                 <td colspan="1">
                                    <form class="well form-horizontal">
                                       <fieldset>
                                        <label class="col-md-4 control-label">Specification</label>
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
                                     </div>
                                          <div class="form-group">
                                            <label class="col-md-4 control-label">Device Address</label>
                                            <div class="col-md-8 inputGroupContainer">
                                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="Specification" name="DeviceAddress" placeholder="Device Address" class="form-control" required="true" value="" type="text"></div>
                                            </div>
                                         </div>

                                       </fieldset>
                                    </form>
                                 </td>
                                 <td colspan="1">
                                    <form class="well form-horizontal">
                                       <fieldset>
                                          <div class="form-group">
                                             <label class="col-md-4 control-label">Device Name</label>
                                             <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="DeviceName" name="DeviceName" placeholder="Device Name" class="form-control" required="true" value="" type="text"></div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-4 control-label">Device Site</label>
                                            <div class="col-md-8 inputGroupContainer">
                                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="DeviceName" name="DeviceName" placeholder="Device Site" class="form-control" required="true" value="" type="text"></div>
                                            </div>
                                         </div>
                                                                   <div class="form-group">

                                       </fieldset>
                                    </form>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>




                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Device Name
                                    </th>
                                    <th>
                                        Device Address
                                    </th>
                                    <th>
                                        Device Site
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            OLT|S6-OLT-1|Male'_Henveiru_HSahara
                                        </td>
                                        <td>
                                            H.Sahara
                                        </td>
                                        <td>
                                            Male'_Henveiru_HSahara
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            FDP|300-1|Male'_Henveiru_HSahara
                                        </td>
                                        <td>
                                            Male'_Maafannu_Light
                                        </td>
                                        <td>
                                            Male'_Maafannu_HSahara
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            FCAB|300|Male'_Henveiru_HSahara
                                        </td>
                                        <td>
                                            Male'_Maafannu_Darknight
                                        </td>
                                        <td>
                                            Male'_Maafannu_HSahara
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>





        </body>
        </html>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\antharis\resources\views/inventory.blade.php ENDPATH**/ ?>