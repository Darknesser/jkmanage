<!DOCTYPE html>
<html>
<head>
    <title>巨开管理后台</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap/bootstrap-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap/bootstrap-overrides.css') }}" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="{{ asset('css/lib/bootstrap-wysihtml5.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/lib/uniform.default.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/lib/select2.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/lib/bootstrap.datepicker.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/lib/font-awesome.css') }}" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/elements.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icons.css') }}" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="{{ asset('css/compiled/form-showcase.css') }}" type="text/css" media="screen" />

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
                    <form id="addCustomer">
                        <div class="field-box">
                            <label>名称:</label>
                            <input class="span8 inline-input" placeholder="请输入客户名称" type="text" v-model="name"/>
                        </div>
                        <div class="field-box">
                            <label>来源:</label>
                            <div class="ui-select">
                                <select v-model="selected">
                                    <option v-for="option in options" v-bind:value="option.value">
                                        @{{ option.text }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="field-box">
                            <label>负责人:</label>
                            <input class="span8 inline-input" placeholder="请输入客户负责人" type="text" v-model="principal"/>
                        </div>
                        <input type="hidden" id="id" value="{{ $id }}"/>
                        <div class="span6 field-box actions">
                            <input type="button" class="btn-glow primary" value="保存" v-on:click="addCustomer"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->

<!-- scripts for this page -->
<script src="{{ asset('js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('js/jquery-latest.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-wysihtml5-0.0.2.js') }}"></script>
<script src="{{ asset('js/bootstrap.datepicker.js') }}"></script>
<script src="{{ asset('js/jquery.uniform.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script src="{{ asset('js/vue.min.js') }}"></script>
<script src="https://cdn.bootcss.com/layer/3.0.1/layer.min.js"></script>
<script src="https://cdn.bootcss.com/axios/0.16.2/axios.min.js"></script>
<script src="{{ asset('js/common/service.js?v=20170811') }}"></script>

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

<script>
    //添加服务器
    new Vue({
        el: '#addCustomer',
        data: {
            name: '',
            source: '',
            principal: '',
            selected: '代理商',
            options: [
                {text: '代理商', value: '代理商'},
                {text: '资管系统', value: '资管系统'}
            ]
        },
        mounted: function () {
            let id = $('#id').val();
            if(id) {
                axios.get('/oneCustomer', {
                    params: {
                        id: id
                    }
                }).then((response) => {
                     console.log(response.data.data);
                    let data = response.data.data;
                    this.name = data.name;
                    this.selected = data.source;
                    this.principal = data.principal;
                })
            }
        },
        methods: {
            addCustomer: function () {
                axios.post('/updCustomer', {
                    name: this.name,
                    source: this.selected,
                    principal: this.principal,
                    id: $('#id').val()
                }).then((response) => {
                    let data = response.data;
                    if (data.code === 0) {
                        layer.msg(data.message);
                    }else{
                        location.href = '/customer';
                    }
                }).catch((error) => {
                    let data = error.response.data;
                    for (let i in data) {
                        layer.msg(data[i][0]);
                        return false;
                    }
                });
            }
        }
    });



</script>