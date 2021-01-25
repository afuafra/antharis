
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../assets/img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Test Inventory</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!-- CSS Files -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../assets/demo/demo.css" rel="stylesheet" />



<div class="container-fluid col-lg-auto card">
    <div class="container-fluid col-md-3 mid pt-5">

        <form method="POST" action="<?php echo e(route("devicesites.store")); ?>" oninput="atollislandsite.value = AtollCity.value +'_'+ IslandDistrict.value+'_'+ Site.value">
            <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label  class="form-label">Atoll/City</label>
                        <input type="text" class="form-control" name="AtollCity" id="AtollCity">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Island/District</label>
                        <input type="text" class="form-control" name="IslandDistrict" id="IslandDistrict">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Site</label>
                        <input type="text" class="form-control" name="Site" id="Site">
                     </div>
                    <div class="mb-3">
                        <label class="form-label">Atoll Island Site</label>
                        <input type="text" class="form-control" name="atollislandsite" id="atollislandsite">
                    </div>

                <div class="modal-footer">
                    <a href="<?php echo e(route("devicesites.index")); ?>" class="btn btn-secondary" data-bs-dismiss="modal">back</a>
                    <input  name="submit" type="submit" class="btn btn-primary"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<footer class="footer">
    <div class="container-fluid">
        <nav>
            <ul>
                <li>
                    <a href="">

                        Copyright © 2021 | Ibrahim Afrah
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</footer>
</div>
</div>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>










<?php /**PATH C:\xampp\htdocs\antharis\resources\views/devicesites/create.blade.php ENDPATH**/ ?>