<?php $__env->startSection('connectivity'); ?>



    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Connectivity</h4>
                    </div>

                    <div class="container-fluid">
                        <table class="table">
                           <tbody>
                              <tr>
                                 <td colspan="1">
                                    <form class="well form-horizontal">
                                       <fieldset>
                                        <label class="col-md-4 control-label">Source Device Name</label>
                                        <div class="col-md-8 inputGroupContainer">
                                           <div class="input-group">
                                              <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                              <select class="selectpicker form-control">
                                                <option></option>
                                                 <option>OLT|S6-OLT-1|Male'_Henveiru_HSahara</option>
                                                 <option>FDP|300-1|Male'_Henveiru_HSahara</option>
                                                 <option>FCAB|300|Male'_Henveiru_HSahara</option>
                                              </select>
                                           </div>
                                        </div>
                                     </div>
                                     <label class="col-md-4 control-label">Target Device Name</label>
                                     <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                           <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                           <select class="selectpicker form-control">
                                             <option></option>
                                              <option>OLT|S6-OLT-1|Male'_Henveiru_HSahara</option>
                                              <option>FDP|300-1|Male'_Henveiru_HSahara</option>
                                              <option>FCAB|300|Male'_Henveiru_HSahara</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                       </fieldset>
                                    </form>
                                 </td>
                                 <td colspan="1">
                                    <form class="well form-horizontal">
                                       <fieldset>
                                          <div class="form-group">
                                             <label class="col-md-4 control-label">Source Port</label>
                                             <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="DeviceName" name="DeviceName" placeholder="Device Name" class="form-control" required="true" value="" type="text"></div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-4 control-label">Target Port</label>
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
                                        Source Device Name
                                    </th>
                                    <th>
                                        Source Port
                                    </th>
                                    <th>
                                        Target Device Name
                                    </th>
                                    <th>
                                        Target Port
                                    </th>
                                    <th>
                                        Pipe
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            OLT|S6-OLT-1|Male'_Henveiru_HSahara
                                        </td>
                                        <td>
                                           0/1/1
                                        </td>
                                        <td>
                                            FDP|300-1|Male'_Henveiru_HSahara
                                        </td>
                                        <td>
                                            A/1
                                        </td>
                                        <td>
                                            OLT|S6-OLT-1|Male'_Henveiru_HSahara#0/1/1-->FDP|300-1|Male'_Henveiru_HSahara#A/1
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            OLT|S6-OLT-1|Male'_Henveiru_HSahara
                                        </td>
                                        <td>
                                           0/1/2
                                        </td>
                                        <td>
                                            FDP|300-1|Male'_Henveiru_HSahara
                                        </td>
                                        <td>
                                            A/2
                                        </td>
                                        <td>
                                            OLT|S6-OLT-1|Male'_Henveiru_HSahara#0/1/2-->FDP|300-1|Male'_Henveiru_HSahara#A/2
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            OLT|S6-OLT-1|Male'_Henveiru_HSahara
                                        </td>
                                        <td>
                                           0/1/3
                                        </td>
                                        <td>
                                            FDP|300-1|Male'_Henveiru_HSahara
                                        </td>
                                        <td>
                                            A/3
                                        </td>
                                        <td>
                                            OLT|S6-OLT-1|Male'_Henveiru_HSahara#0/1/3-->FDP|300-1|Male'_Henveiru_HSahara#A/3
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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\antharis\resources\views/connectivity.blade.php ENDPATH**/ ?>