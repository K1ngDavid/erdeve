<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>ERDEVE | DASHBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->



    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/loader-style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="assets/js/progress-bar/number-pb.css">



    <style type="text/css">
        canvas#canvas4 {
            position: relative;
            top: 20px;
        }
    </style>




    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/minus.png">
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- TOP NAVBAR -->
<?php
include "inc/navbar.php";
?>
<!-- /END OF TOP NAVBAR -->

<!-- SIDE MENU -->
<!-- END OF SIDE MENU -->
<?php
include "inc/side-menu.php";
?>


<!--  PAPER WRAP -->
<div class="wrap-fluid">
    <div class="container-fluid paper-wrap bevel tlbr">





        <!-- CONTENT -->
        <!--TITLE -->
        <?php
        include "inc/nav-second.php";
        ?>
        <!--/ TITLE -->

        <!-- BREADCRUMB -->
        <ul id="breadcrumb">
            <li>
                <span class="entypo-home"></span>
            </li>
            <li><i class="fa fa-lg fa-angle-right"></i>
            </li>
            <li><a href="#" title="Sample page 1">Accueil</a>
            </li>
            <li><i class="fa fa-lg fa-angle-right"></i>
            </li>
            <li><a href="#" title="Sample page 1">Dashboard</a>
            </li>
        </ul>

        <!-- END OF BREADCRUMB -->

        <!--  DEVICE MANAGER -->
        <div class="content-wrap">
            <div class="row">
                <div class="col-sm-3">
                    <div class="profit" id="profitClose">
                        <div class="headline ">
                            <h3>
                                    <span>
                                        <i class="maki-ferry"></i>&#160;&#160;Evenements a venir</span>
                            </h3>
                            <div class="titleClose">
                                <a href="#profitClose" class="gone">
                                    <span class="entypo-cancel"></span>
                                </a>
                            </div>
                        </div>

                        <div class="value">
                                <span class="pull-left"><i class="entypo-clock clock-position"></i>
                                </span>
                            <div id="">
                                <span>10</span>
                            </div>


                        </div>

                        <div class="progress-tinny">
                            <div style="width: 50%" class="bar"></div>
                        </div>
                        <div class="profit-line">
                            <i class="fa fa-caret-up fa-lg"></i>&#160;&#160; 3 &#160; aujourd'hui</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="profit" id="profitClose">
                        <div class="headline ">
                            <h3>
                                    <span>
                                        <i class="maki-ferry"></i>&#160;&#160;Contacts</span>
                            </h3>
                            <div class="titleClose">
                                <a href="#profitClose" class="gone">
                                    <span class="entypo-cancel"></span>
                                </a>
                            </div>
                        </div>

                        <div class="value">
                                <span class="pull-left"><i class="entypo-clock clock-position"></i>
                                </span>
                            <div id="">
                                <span>17</span>
                            </div>


                        </div>

                        <div class="progress-tinny">
                            <div style="width: 50%" class="bar"></div>
                        </div>
                        <div class="profit-line">
                            <i class="fa fa-caret-up fa-lg"></i>&#160;&#160; 5 &#160; nouveaux contact</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="profit" id="profitClose">
                        <div class="headline ">
                            <h3>
                                    <span>
                                        <i class="maki-ferry"></i>&#160;&#160;Taches en cours</span>
                            </h3>
                            <div class="titleClose">
                                <a href="#profitClose" class="gone">
                                    <span class="entypo-cancel"></span>
                                </a>
                            </div>
                        </div>

                        <div class="value">
                                <span class="pull-left"><i class="entypo-clock clock-position"></i>
                                </span>
                            <div id="">
                                <span>2</span>
                            </div>


                        </div>

                        <div class="progress-tinny">
                            <div style="width: 50%" class="bar"></div>
                        </div>
                        <div class="profit-line">
                            <i class="fa fa-caret-up fa-lg"></i>&#160;&#160; 2 &#160; evenements</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="profit" id="profitClose">
                        <div class="headline ">
                            <h3>
                                    <span>
                                        <i class="maki-ferry"></i>&#160;&#160;Rapport</span>
                            </h3>
                            <div class="titleClose">
                                <a href="#profitClose" class="gone">
                                    <span class="entypo-cancel"></span>
                                </a>
                            </div>
                        </div>

                        <div class="value">
                                <span class="pull-left"><i class="entypo-clock clock-position"></i>
                                </span>
                            <div id="">
                                <span>5</span>
                            </div>


                        </div>

                        <div class="progress-tinny">
                            <div style="width: 50%" class="bar"></div>
                        </div>
                        <div class="profit-line">
                            <i class="fa fa-caret-up fa-lg"></i>&#160;&#160; 0 &#160; aujourd'hui</div>
                    </div>
                </div>
            </div>
        </div>
        <!--  / DEVICE MANAGER -->










        <div class="content-wrap">
            <div class="row">
                <div class="col-sm-8">
                    <div id="siteClose" class="nest">
                        <div class="title-alt">
                            <h6>
                                <span class="fontawesome-truck"></span>&nbsp;Taches en cours</h6>
                            <div class="titleClose">
                                <a class="gone" href="#siteClose">
                                    <span class="entypo-cancel"></span>
                                </a>
                            </div>
                            <div class="titleToggle">
                                <a class="nav-toggle-alt" href="#site">
                                    <span class="entypo-up-open"></span>
                                </a>
                            </div>
                        </div>
                        <div id="site" class="body-nest" style="min-height:296px;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="armada-devider">
                                            <div class="armada">
                                                <p>Depart: Paris</p>
                                                <p>Arrive: Nice </p>
                                            </div>
                                        </td>
                                        <td class="driver-devider">
                                            <img class="armada-pic img-circle" alt="" src="http://api.randomuser.me/portraits/thumb/men/14.jpg">
                                            <h3>Mark</h3>
                                            <br>
                                            <p>Commercial</p>
                                        </td>
                                        <td class="progress-devider">
                                            <p>Temps estime : 1 h 30</p>
                                            <p>Heure de depart : 11 h 30</p>
                                            <p>Heure d'arrive : 13 h 00</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="armada-devider">
                                            <div class="armada">
                                                <p>Depart: Paris</p>
                                                <p>Arrive: Nice </p>
                                            </div>
                                        </td>
                                        <td class="driver-devider">
                                            <img class="armada-pic img-circle" alt="" src="http://api.randomuser.me/portraits/thumb/men/14.jpg">
                                            <h3>Mark</h3>
                                            <br>
                                            <p>Commercial</p>
                                        </td>
                                        <td class="progress-devider">
                                            <p>Temps estime : 1 h 30</p>
                                            <p>Heure de depart : 11 h 30</p>
                                            <p>Heure d'arrive : 13 h 00</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="RealTimeClose" class="nest">
                        <div class="title-alt">
                            <h6>
                                <span class="fontawesome-resize-horizontal"></span>&nbsp;Discussion</h6>
                            <div class="titleClose">
                                <a class="gone" href="#RealTimeClose">
                                    <span class="entypo-cancel"></span>
                                </a>
                            </div>
                            <div class="titleToggle">
                                <a class="nav-toggle-alt" href="#RealTime">
                                    <span class="entypo-up-open"></span>
                                </a>
                            </div>
                        </div>
                        <div id="RealTime" style="min-height:296px;padding-top:20px;" class="body-nest">
                            <ul class="direction">
                                <li>
                                    <span class="direction-icon maki-fuel" style="background:#FF6B6B"></span>
                                    <h3>
                                        <span>Gas Station</span>
                                    </h3>
                                    <p>5 Km Foward&nbsp;&nbsp;<i class="fa fa-arrow-circle-up"></i>
                                    </p>
                                    <p><i>Estimated time </i>:&nbsp;<i class="fa fa-clock-o"></i>&nbsp;&nbsp;20 Min</p>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <span class="direction-icon maki-fast-food" style="background:#65C3DF"></span>
                                    <h3>
                                        <span>Restourant</span>
                                    </h3>
                                    <p>1 Km Turn Left&nbsp;&nbsp;<i class="fa fa-reply"></i>
                                    </p>
                                    <p><i>Estimated time </i>:&nbsp;<i class="fa fa-clock-o"></i>&nbsp;&nbsp;20 Min</p>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <span class="direction-icon maki-giraffe" style="background:#45B6B0"></span>
                                    <h3>
                                        <span>Zoo</span>
                                    </h3>
                                    <p>3 Km Turn Right &nbsp;&nbsp;<i class="fa fa-share"></i>
                                    </p>
                                    <p><i>Estimated time </i>:&nbsp;<i class="fa fa-clock-o"></i>&nbsp;&nbsp;20 Min</p>
                                </li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="content-wrap">
            <div class="row">
                <div class="col-sm-6">
                    <div class="">
                        <div class="">
                            <div id="placeholder" style="width:1%;height:1px;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
                <!-- /END OF CONTENT -->



                <!-- FOOTER -->
                <?php
                include "inc/footer.php";
                ?>

                <!-- / END OF FOOTER -->


            </div>
        </div>
    </div>
    <!--  END OF PAPER WRAP -->

    <!-- RIGHT SLIDER CONTENT -->
    <div class="sb-slidebar sb-right">
        <div class="right-wrapper">
            <div class="row">
                <h3>
                    <span><i class="entypo-gauge"></i>&nbsp;&nbsp;Raccourcis</span>
                </h3>
                <div class="col-sm-12">

                    <div class="widget-knob">
                        <span class="chart" style="position:relative" data-percent="86">
                            <span class="percent"></span>
                        </span>
                    </div>
                    <div class="widget-def">
                        <b>Distance traveled</b>
                        <br>
                        <i>86% to the check point</i>
                    </div>

                    <div class="widget-knob">
                        <span class="speed-car" style="position:relative" data-percent="60">
                            <span class="percent2"></span>
                        </span>
                    </div>
                    <div class="widget-def">
                        <b>The average speed</b>
                        <br>
                        <i>30KM/h avarage speed</i>
                    </div>


                    <div class="widget-knob">
                        <span class="overall" style="position:relative" data-percent="25">
                            <span class="percent3"></span>
                        </span>
                    </div>
                    <div class="widget-def">
                        <b>Overall result</b>
                        <br>
                        <i>30KM/h avarage Result</i>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top:0;" class="right-wrapper">
            <div class="row">
                <h3>
                    <span><i class="entypo-chat"></i>&nbsp;&nbsp;CHAT</span>
                </h3>
                <div class="col-sm-12">
                    <span class="label label-warning label-chat">Online</span>
                    <ul class="chat">
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-circle" src="http://api.randomuser.me/portraits/thumb/men/20.jpg">
                                </span><b>Dave Junior</b>
                                <br><i>Last seen : 08:00 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-circle" src="http://api.randomuser.me/portraits/thumb/men/21.jpg">
                                </span><b>Kenneth Lucas</b>
                                <br><i>Last seen : 07:21 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-circle" src="http://api.randomuser.me/portraits/thumb/men/22.jpg">
                                </span><b>Heidi Perez</b>
                                <br><i>Last seen : 05:43 PM</i>
                            </a>
                        </li>


                    </ul>

                    <span class="label label-chat">Offline</span>
                    <ul class="chat">
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-offline img-circle" src="http://api.randomuser.me/portraits/thumb/men/23.jpg">
                                </span><b>Dave Junior</b>
                                <br><i>Last seen : 08:00 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-offline img-circle" src="http://api.randomuser.me/portraits/thumb/women/24.jpg">
                                </span><b>Kenneth Lucas</b>
                                <br><i>Last seen : 07:21 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-offline img-circle" src="http://api.randomuser.me/portraits/thumb/men/25.jpg">
                                </span><b>Heidi Perez</b>
                                <br><i>Last seen : 05:43 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-offline img-circle" src="http://api.randomuser.me/portraits/thumb/women/25.jpg">
                                </span><b>Kenneth Lucas</b>
                                <br><i>Last seen : 07:21 PM</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>
                                    <img alt="" class="img-chat img-offline img-circle" src="http://api.randomuser.me/portraits/thumb/men/26.jpg">
                                </span><b>Heidi Perez</b>
                                <br><i>Last seen : 05:43 PM</i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- END OF RIGHT SLIDER CONTENT-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
    <script src="assets/js/progress-bar/src/jquery.velocity.min.js"></script>
    <script src="assets/js/progress-bar/number-pb.js"></script>
    <script src="assets/js/progress-bar/progress-app.js"></script>



    <!-- MAIN EFFECT -->
    <script type="text/javascript" src="assets/js/preloader.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/load.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>




    <!-- GAGE -->


    <script type="text/javascript" src="assets/js/chart/jquery.flot.js"></script>
    <script type="text/javascript" src="assets/js/chart/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="assets/js/chart/realTime.js"></script>
    <script type="text/javascript" src="assets/js/speed/canvasgauge-coustom.js"></script>
    <script type="text/javascript" src="assets/js/countdown/jquery.countdown.js"></script>



    <script src="assets/js/jhere-custom.js"></script>

    <script>
        var gauge4 = new Gauge("canvas4", {
            'mode': 'needle',
            'range': {
                'min': 0,
                'max': 90
            }
        });
        gauge4.draw(Math.floor(Math.random() * 90));
        var run = setInterval(function() {
            gauge4.draw(Math.floor(Math.random() * 90));
        }, 3500);
    </script>


    <script type="text/javascript">
        /* Javascript
         *
         * See http://jhere.net/docs.html for full documentation
         */
        $(window).on('load', function() {
            $('#mapContainer').jHERE({
                center: [52.500556, 13.398889],
                type: 'smart',
                zoom: 10
            }).jHERE('marker', [52.500556, 13.338889], {
                icon: 'assets/img/marker.png',
                anchor: {
                    x: 12,
                    y: 32
                },
                click: function() {
                    alert('Hallo from Berlin!');
                }
            })
                .jHERE('route', [52.711, 13.011], [52.514, 13.453], {
                    color: '#FFA200',
                    marker: {
                        fill: '#86c440',
                        text: '#'
                    }
                });
        });
    </script>
    <script type="text/javascript">
        var output, started, duration, desired;

        // Constants
        duration = 5000;
        desired = '50';

        // Initial setup
        output = $('#speed');
        started = new Date().getTime();

        // Animate!
        animationTimer = setInterval(function() {
            // If the value is what we want, stop animating
            // or if the duration has been exceeded, stop animating
            if (output.text().trim() === desired || new Date().getTime() - started > duration) {
                console.log('animating');
                // Generate a random string to use for the next animation step
                output.text('' + Math.floor(Math.random() * 60)

                );

            } else {
                console.log('animating');
                // Generate a random string to use for the next animation step
                output.text('' + Math.floor(Math.random() * 120)

                );
            }
        }, 5000);
    </script>
    <script type="text/javascript">
        $('#getting-started').countdown('2015/01/01', function(event) {
            $(this).html(event.strftime(

                '<span>%M</span>' + '<span class="start-min">:</span>' + '<span class="start-min">%S</span>'));
        });
    </script>




</body>

</html>
