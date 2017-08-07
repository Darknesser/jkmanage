<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>巨开管理后台</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->




</head>

<body>
<!-- start: Header -->
@include('public.header')
<!-- start: Header --><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

<div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        @include('public.left')
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>

        <!-- start: Content -->
        <div id="content" class="span10">


            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">Dashboard</a></li>
            </ul>

            <div class="row-fluid hideInIE8 circleStats">

                <div class="span2" onTablet="span4" onDesktop="span2">
                    <div class="circleStatsItemBox yellow">
                        <div class="header">Disk Space Usage</div>
                        <span class="percent">percent</span>
                        <div class="circleStat">
                            <input type="text" value="58" class="whiteCircle" />
                        </div>
                        <div class="footer">
							<span class="count">
								<span class="number">20000</span>
								<span class="unit">MB</span>
							</span>
                            <span class="sep"> / </span>
                            <span class="value">
								<span class="number">50000</span>
								<span class="unit">MB</span>
							</span>
                        </div>
                    </div>
                </div>

                <div class="span2" onTablet="span4" onDesktop="span2">
                    <div class="circleStatsItemBox green">
                        <div class="header">Bandwidth</div>
                        <span class="percent">percent</span>
                        <div class="circleStat">
                            <input type="text" value="78" class="whiteCircle" />
                        </div>
                        <div class="footer">
							<span class="count">
								<span class="number">5000</span>
								<span class="unit">GB</span>
							</span>
                            <span class="sep"> / </span>
                            <span class="value">
								<span class="number">5000</span>
								<span class="unit">GB</span>
							</span>
                        </div>
                    </div>
                </div>

                <div class="span2" onTablet="span4" onDesktop="span2">
                    <div class="circleStatsItemBox red">
                        <div class="header">Memory</div>
                        <span class="percent">percent</span>
                        <div class="circleStat">
                            <input type="text" value="100" class="whiteCircle" />
                        </div>
                        <div class="footer">
							<span class="count">
								<span class="number">64</span>
								<span class="unit">GB</span>
							</span>
                            <span class="sep"> / </span>
                            <span class="value">
								<span class="number">64</span>
								<span class="unit">GB</span>
							</span>
                        </div>
                    </div>
                </div>

                <div class="span2 noMargin" onTablet="span4" onDesktop="span2">
                    <div class="circleStatsItemBox pink">
                        <div class="header">CPU</div>
                        <span class="percent">percent</span>
                        <div class="circleStat">
                            <input type="text" value="83" class="whiteCircle" />
                        </div>
                        <div class="footer">
							<span class="count">
								<span class="number">64</span>
								<span class="unit">GHz</span>
							</span>
                            <span class="sep"> / </span>
                            <span class="value">
								<span class="number">3.2</span>
								<span class="unit">GHz</span>
							</span>
                        </div>
                    </div>
                </div>

                <div class="span2" onTablet="span4" onDesktop="span2">
                    <div class="circleStatsItemBox blue">
                        <div class="header">Memory</div>
                        <span class="percent">percent</span>
                        <div class="circleStat">
                            <input type="text" value="100" class="whiteCircle" />
                        </div>
                        <div class="footer">
							<span class="count">
								<span class="number">64</span>
								<span class="unit">GB</span>
							</span>
                            <span class="sep"> / </span>
                            <span class="value">
								<span class="number">64</span>
								<span class="unit">GB</span>
							</span>
                        </div>
                    </div>
                </div>

                <div class="span2" onTablet="span4" onDesktop="span2">
                    <div class="circleStatsItemBox green">
                        <div class="header">Memory</div>
                        <span class="percent">percent</span>
                        <div class="circleStat">
                            <input type="text" value="100" class="whiteCircle" />
                        </div>
                        <div class="footer">
							<span class="count">
								<span class="number">64</span>
								<span class="unit">GB</span>
							</span>
                            <span class="sep"> / </span>
                            <span class="value">
								<span class="number">64</span>
								<span class="unit">GB</span>
							</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row-fluid">

                <a class="quick-button metro yellow span2">
                    <i class="icon-group"></i>
                    <p>Users</p>
                    <span class="badge">237</span>
                </a>
                <a class="quick-button metro red span2">
                    <i class="icon-comments-alt"></i>
                    <p>Comments</p>
                    <span class="badge">46</span>
                </a>
                <a class="quick-button metro blue span2">
                    <i class="icon-shopping-cart"></i>
                    <p>Orders</p>
                    <span class="badge">13</span>
                </a>
                <a class="quick-button metro green span2">
                    <i class="icon-barcode"></i>
                    <p>Products</p>
                </a>
                <a class="quick-button metro pink span2">
                    <i class="icon-envelope"></i>
                    <p>Messages</p>
                    <span class="badge">88</span>
                </a>
                <a class="quick-button metro black span2">
                    <i class="icon-calendar"></i>
                    <p>Calendar</p>
                </a>

                <div class="clearfix"></div>

            </div><!--/row-->



        </div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
    </div>
    <div class="modal-body">
        <p>Here settings can be configured...</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div>

<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <ul class="list-inline item-details">
            <li><a href="#">Admin templates</a></li>
            <li><a href="http://themescloud.org">Bootstrap themes</a></li>
        </ul>
    </div>
</div>

<div class="clearfix"></div>

@include('public.footer')

<!-- start: JavaScript-->

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-migrate-1.0.0.min.js"></script>

<script src="js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="js/jquery.ui.touch-punch.js"></script>

<script src="js/modernizr.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.cookie.js"></script>

<script src='js/fullcalendar.min.js'></script>

<script src='js/jquery.dataTables.min.js'></script>

<script src="js/excanvas.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>

<script src="js/jquery.chosen.min.js"></script>

<script src="js/jquery.uniform.min.js"></script>

<script src="js/jquery.cleditor.min.js"></script>

<script src="js/jquery.noty.js"></script>

<script src="js/jquery.elfinder.min.js"></script>

<script src="js/jquery.raty.min.js"></script>

<script src="js/jquery.iphone.toggle.js"></script>

<script src="js/jquery.uploadify-3.1.min.js"></script>

<script src="js/jquery.gritter.min.js"></script>

<script src="js/jquery.imagesloaded.js"></script>

<script src="js/jquery.masonry.min.js"></script>

<script src="js/jquery.knob.modified.js"></script>

<script src="js/jquery.sparkline.min.js"></script>

<script src="js/counter.js"></script>

<script src="js/retina.js"></script>

<script src="js/custom.js"></script>
<!-- end: JavaScript-->

</body>
</html>

