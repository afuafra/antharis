<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Antharis</title>
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
    <link href="../assets/css/util.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <style>
        .overlay{
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background: rgba(255,255,255,0.8) url("loader.gif") center no-repeat;
        }
        /* Turn off scrollbar when body element has the loading class */
        body.loading{
            overflow: hidden;
        }
        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay{
            display: block;
        }
    </style>



</head>

<body>


<div class="sidebar" data-color="orange">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
    <div class="logo">
        <a href="" class="logo-tim img">

        </a>
        <a href="home" class="simple-text logo-lg">

            <strong>ANTHARIS</strong>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a data-toggle="collapse" href="#devices" >
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>
                        Devices <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="devices">
                    <ul class="nav">
                        <li >
                            <a href="<?php echo e(route("olts.index")); ?>">
                                <span class="sidebar-mini-icon pl-5"><strong>OLT</strong></span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("odf_racks.index")); ?>">
                                <span class="sidebar-mini-icon pl-5"><strong>ODF</strong></span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("fcab.index")); ?>">
                                <span class="sidebar-mini-icon pl-5"><strong>FCAB</strong></span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("fcabs_splitter.index")); ?>">
                                <span class="sidebar-mini-icon pl-5"><strong>FCAB Splitter</strong></span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("fdp.index")); ?>">
                                <span class="sidebar-mini-icon pl-5"><strong>FDP</strong></span>

                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("fdp_splitters.index")); ?>">
                                <span class="sidebar-mini-icon pl-5"><strong>FDP Splitter</strong></span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("fidp.index")); ?>">
                                <span class="sidebar-mini-icon pl-5"><strong>FIDP</strong></span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("fidp_splitters.index")); ?>">
                                <span class="sidebar-mini-icon pl-5"><strong>FIDP Splitter</strong></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#interfaces" >
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>
                        Interfaces <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="interfaces">
                    <ul class="nav">
                        <li >
                            <a href="<?php echo e(route("olt_interfaces.index")); ?>">
                                <span class="sidebar-mini-icon pl-5">OLT Interface</span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("odf_interfaces.index")); ?>">
                                <span class="sidebar-mini-icon pl-5">ODF Interface</span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("fcabs_interface.index")); ?>">
                                <span class="sidebar-mini-icon pl-5">FCAB Interface</span>
                            </a>
                        </li>

                        <li >
                            <a href="<?php echo e(route("fcab_splitter_interface.index")); ?>">
                                <span class="sidebar-mini-icon pl-5">FCAB Splitter Interface</span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("fdps_interface.index")); ?>">
                                <span class="sidebar-mini-icon pl-5">FDP Interface</span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo e(route("fidps_interface.index")); ?>">
                                <span class="sidebar-mini-icon pl-5">FIDP Interface</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a href="<?php echo e(route("services.index")); ?>">
                    <i class="now-ui-icons education_agenda-bookmark"></i>
                    <p>Services</p>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route("serviceRoute.index")); ?>">
                    <i class="now-ui-icons education_atom"></i>
                    <p>Route</p>
                </a>
            </li>






            <li>

                <a data-toggle="collapse" href="#customObjects" >

                    <i class="now-ui-icons shopping_shop"></i>

                    <p>
                        Custom Objects <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse " id="customObjects">
                    <ul class="nav">

                        <li >
                            <a href="<?php echo e(route("devicesites.index")); ?>">
                                <span class=" pl-5">Device Sites</span>
                            </a>
                        </li>

                        <li >
                            <a href="../examples/components/grid.html">
                                <span class=" pl-5">Serving Area</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a href="<?php echo e(route("users.index")); ?>">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Users</p>
                </a>
            </li>

        </ul>
    </div>
</div>
<div class="main-panel">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="#pablo"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">








                <ul class="navbar-nav">

                    <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->name); ?>

                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div>
        <?php echo $__env->yieldContent('home'); ?>
        <?php echo $__env->yieldContent('inventory'); ?>
        <?php echo $__env->yieldContent('services'); ?>
        <?php echo $__env->yieldContent('connectivity'); ?>
        <?php echo $__env->yieldContent('users'); ?>
        <?php echo $__env->yieldContent('serviceRoute'); ?>
        <?php echo $__env->yieldContent('fidps'); ?>
        <?php echo $__env->yieldContent('fdps'); ?>
        <?php echo $__env->yieldContent('fidpsInterface'); ?>
        <?php echo $__env->yieldContent('fdpsInterface'); ?>
        <?php echo $__env->yieldContent('fcab'); ?>
        <?php echo $__env->yieldContent('olts'); ?>
        <?php echo $__env->yieldContent('odf'); ?>
        <?php echo $__env->yieldContent('olt_interface'); ?>
        <?php echo $__env->yieldContent('odf_interface'); ?>
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






<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    // Initiate an Ajax request on button click
    $(document).on("click", "button", function(){
        $.get("customers.php", function(data){
            $("body").html(data);
        });
    });

    // Add remove loading class on body element based on Ajax request status
    $(document).on({
        ajaxStart: function(){
            $("body").addClass("loading");
        },
        ajaxStop: function(){
            $("body").removeClass("loading");
        }

    });

</script>
<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>

<?php /**PATH C:\xampp\htdocs\antharis\resources\views/layout.blade.php ENDPATH**/ ?>