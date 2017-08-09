<!DOCTYPE html>
<html>
<head>
    <title>Detail Admin - Form Showcase</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/form-showcase.css" type="text/css" media="screen" />

    <!-- open sans font -->
    {{--<link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />--}}

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

<!-- navbar -->
@include('public.header')
<!-- end navbar -->

<!-- sidebar -->
@include('public.left')
<!-- end sidebar -->


<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span8 column">
                    <form id="addServer"/>
                    <div class="field-box">
                        <label>持有者:</label>
                        <input class="span8 inline-input" placeholder="请输入持有者名称" type="text" v-model="owner"/>
                    </div>
                    <div class="field-box">
                        <label>IP:</label>
                        <input class="span8 inline-input" placeholder="请输入服务器外网IP" type="text" v-model="ip"/>
                    </div>
                    <div class="field-box">
                        <label>服务器商:</label>
                        <input class="span8 inline-input" placeholder="请输入服务器商名称" type="text" v-model="provider_name"/>
                    </div>
                    <div class="field-box">
                        <label>服务器平台账号:</label>
                        <input class="span8 inline-input" placeholder="请输入服务器平台账号" type="text" v-model="provider_account"/>
                    </div>
                    <div class="field-box">
                        <label>服务器平台密码:</label>
                        <input class="span8 inline-input" placeholder="请输入服务器平台密码" type="text" v-model="provider_pwd"/>
                    </div>
                    <div class="field-box">
                        <label>服务器账号:</label>
                        <input class="span8 inline-input" placeholder="请输入服务器账号" type="text" v-model="server_account"/>
                    </div>
                    <div class="field-box">
                        <label>服务器密码:</label>
                        <input class="span8 inline-input" placeholder="请输入服务器密码" type="text" v-model="server_pwd"/>
                    </div>
                    <div class="field-box">
                        <label>到期时间:</label>
                        <input type="text" value="2017-08-08" class="input-large datepicker"/>
                    </div>
                    <div class="span6 field-box actions">
                        <input type="button" class="btn-glow primary" value="保存" v-on:click="addServer"/>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->

<!-- scripts for this page -->
<script src="js/wysihtml5-0.3.0.js"></script>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-wysihtml5-0.0.2.js"></script>
<script src="js/bootstrap.datepicker.js"></script>
<script src="js/jquery.uniform.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/theme.js"></script>
<script src="js/vue.min.js"></script>
<script src="https://cdn.bootcss.com/layer/3.0.1/layer.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="js/common/service.js"></script>

<!-- call this page plugins -->
<script type="text/javascript">
    $(function () {

        // add uniform plugin styles to html elements
        $("input:checkbox, input:radio").uniform();

        // select2 plugin for select elements
        $(".select2").select2({
            placeholder: "Select a State"
        });

        // datepicker plugin
        $('.datepicker').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        // wysihtml5 plugin on textarea
        $(".wysihtml5").wysihtml5({
            "font-styles": false
        });
    });
</script>

</body>
</html>