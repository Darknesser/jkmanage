<!DOCTYPE html>
<html>
<head>
    <title>Detail Admin - Tables showcase</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/icons.css" />

    <!-- libraries -->
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/tables.css" type="text/css" media="screen" />

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
        <div id="pad-wrapper">

            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section" id="serverTable">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>服务器</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <div class="ui-select">
                            <select v-model="selected">
                                <option v-for="option in options" v-bind:value="option.value">
                                    @{{ option.text }}
                                </option>
                            </select>
                        </div>
                        <input type="text" class="search" v-on:keyup.13="show" v-model="condition"/>
                        <a class="btn-flat new-product" href="{{ url('/addServer') }}">+ 添加</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <input type="checkbox" />
                                ID
                            </th>
                            <th class="span3">
                                <span class="line"></span>持有者
                            </th>
                            <th class="span3">
                                <span class="line"></span>IP
                            </th>
                            <th class="span3">
                                <span class="line"></span>服务器商
                            </th>
                            <th class="span3">
                                <span class="line"></span>服务器平台账号
                            </th>
                            <th class="span3">
                                <span class="line"></span>服务器平台密码
                            </th>
                            <th class="span3">
                                <span class="line"></span>服务器账号
                            </th>
                            <th class="span3">
                                <span class="line"></span>服务器密码
                            </th>
                            <th class="span3">
                                <span class="line"></span>到期时间
                            </th>
                            <th class="span3">
                                <span class="line"></span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <tr class="first" v-for="(item, index) in items">
                            <td>
                                <input type="checkbox" />
                                {{--<div class="img">--}}
                                    {{--<img src="img/table-img.png" />--}}
                                {{--</div>--}}
                                <a href="#" class="name">@{{ item.id }} </a>
                            </td>
                            <td class="description">
                                @{{ item.owner }}
                            </td>
                            <td class="description">
                                @{{ item.ip }}
                            </td>
                            <td class="description">
                                @{{ item.provider_name }}
                            </td>
                            <td class="description">
                                @{{ item.provider_account }}
                            </td>
                            <td class="description">
                                @{{ item.provider_pwd }}
                            </td>
                            <td class="description">
                                @{{ item.server_account }}
                            </td>
                            <td class="description">
                                @{{ item.server_pwd }}
                            </td>
                            <td class="description">
                                @{{ item.deadline }}
                            </td>
                            <td>
                                {{--<span class="label label-success">Active</span>--}}
                                <ul class="actions">
                                    <li><a :href="'{{ url('/addServer') }}/'+item.id">编辑</a></li>
                                    <li class="last"><a href="javascript:void(0)" v-on:click="delServer(item.id, index)">删除</a></li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="pagination pull-right" v-html="pageHtml"></div>
                    {{--<ul>--}}
                    {{--<li><a href="#">&#8249;</a></li>--}}
                    {{--<li><a class="active" href="#">1</a></li>--}}
                    {{--<li><a href="#">2</a></li>--}}
                    {{--<li><a href="#">3</a></li>--}}
                    {{--<li><a href="#">4</a></li>--}}
                    {{--<li><a href="#">&#8250;</a></li>--}}
                    {{--</ul>--}}
                </div>
            </div>
            <!-- end products table -->

        </div>
    </div>
</div>
<!-- end main container -->

<!-- scripts -->
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/theme.js"></script>
<script src="js/vue.min.js"></script>
<script src="https://cdn.bootcss.com/layer/3.0.1/layer.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</body>
</html>

<script>
    new Vue({
        el: '#serverTable',
        data: {
            items: '',
            pageHtml: '',
            selected: 'id',
            options: [
                {text: 'ID',value: 'id'},
                {text: '持有者',value: 'owner'}
            ],
            condition: ''
        },
        mounted: function () {
            axios.post('/serverList').then((response) => {
                // console.log(response.data.data);
                let d = response.data.data;
                this.items = d.data;
                this.pageHtml = d.pageHtml;
                // let d = response.data;
                // if(d.code === 1) {
                //     this.name = d.data.name;
                //     this.password = d.data.pwd;
                //     this.remember = 1;
                // }else {
                //     this.$message.error(d.message);
                // }
            });
        },
        methods: {
            anotherPage: function () {
                alert(1111);
                axios.post('/serverList').then((response) => {
                    console.log(response);
                })
            },
            delServer: function (id, index) {
                let it = this.items;
                layer.confirm('确认删除吗？', {
                    btn: ['确认', '取消']
                }, function () {
                    axios.get('/delServer', {
                        params: {
                            id: id
                        }
                    }).then((response) => {
                        let d = response.data;
                        if(d.code === 1) {
                            layer.msg(d.message, {icon: 1, time: 1000}, function () {
                                it.splice(index, 1);
//                                location.reload();
                            });
                        }else {
                            layer.msg(d.message, {icon: 2,time: 1000});
                        }
                    });

                })
            },
            show: function () {
                alert(this.selected);
            }
        }
    });
</script>