<!DOCTYPE html>
<html>
<head>
    <title>巨开管理后台</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap/bootstrap-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap/bootstrap-overrides.css') }}" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/elements.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icons.css') }}" />

    <!-- libraries -->
    <link href="{{ asset('css/lib/font-awesome.css') }}" type="text/css" rel="stylesheet" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="{{ asset('css/compiled/tables.css') }}" type="text/css" media="screen" />

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
                        <h4>客户</h4>
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
                        <input type="text" class="search" v-on:keyup.13="showData" v-model="condition"/>
                        <a class="btn-flat new-product" href="{{ url('/addCustomer') }}">+ 添加</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                ID
                            </th>
                            <th class="span3">
                                <span class="line"></span>名称
                            </th>
                            <th class="span3">
                                <span class="line"></span>持有者
                            </th>
                            <th class="span3">
                                <span class="line"></span>上级ID
                            </th>
                            <th class="span3">
                                <span class="line"></span>域名商
                            </th>
                            <th class="span3">
                                <span class="line"></span>域名平台账号
                            </th>
                            <th class="span3">
                                <span class="line"></span>域名平台密码
                            </th>
                            <th class="span3">
                                <span class="line"></span>到期时间
                            </th>
                            <th class="span3">
                                <span class="line"></span>使用者
                            </th>
                            <th class="span3">
                                <span class="line"></span>使用期限
                            </th>
                            <th class="span3">
                                <span class="line"></span>备注
                            </th>
                            <th class="span3">
                                <span class="line"></span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <tr class="first" v-for="(item, index) in items">
                            <td class="description">
                                @{{ item.id }}
                            </td>
                            <td class="description">
                                @{{ item.name }}
                            </td>
                            <td class="description">
                                @{{ item.customer_name }}
                            </td>
                            <td class="description">
                                @{{ item.pid }}
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
                                @{{ item.deadline }}
                            </td>
                            <td class="description">
                                @{{ item.user }}
                            </td>
                            <td class="description">
                                @{{ item.resolution_at }}——@{{ item.live_at }}
                            </td>
                            <td class="description">
                                @{{ item.remark }}
                            </td>
                            <td>
                                <ul class="actions">
                                    <li><a :href="'{{ url('/addCustomer') }}/'+item.id">编辑</a></li>
                                    <li class="last"><a href="javascript:void(0)" v-on:click="delCustomer(item.id, index)">删除</a></li>
                                    {{--<li><a href="javascript:void(0)" v-on:click="more">更多</a></li>--}}
                                    <div class="ui-select span8">
                                        <select v-model="more_selected" v-on:change="more(item.id)">
                                            <option v-for="m in more_options" v-bind:value="m.value">
                                                @{{ m.text }}
                                            </option>
                                        </select>
                                    </div>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    {{--<input type="hidden" id="id" value="{{ $id }}"/>--}}
                    <div class="pagination pull-right" v-html="pageHtml" v-on:click="anotherPage(event)"></div>
                </div>
            </div>
            <!-- end products table -->

        </div>
    </div>
</div>
<!-- end main container -->

<!-- scripts -->
<script src="{{ asset('js/jquery-latest.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script src="{{ asset('js/vue.min.js') }}"></script>
<script src="https://cdn.bootcss.com/layer/3.0.1/layer.min.js"></script>
<script src="https://cdn.bootcss.com/axios/0.16.2/axios.min.js"></script>

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
                {text: '名称',value: 'name'},
                {text: '来源', value: 'source'},
                {text: '负责人', value: 'principal'}
            ],
            condition: '',
            more_selected: 'action',
            more_options: [
                {text: '更多操作', value: 'action'},
                {text: '添加服务器', value: 'add_server'},
                {text: '添加域名', value: 'add_domain'}
            ]
        },
        mounted: function () {
            this.condition = $('#id').val();
            this.showData(1);
        },
        methods: {
            anotherPage: function (event) {
                if(event.target.nodeName === 'A'){
                    this.$emit('anotherPage');
                    let url = event.target.getAttribute('data-url');
                    let page = url.split("=")[1];
                    this.showData(page);
                }
            },
            delCustomer: function (id, index) {
                let it = this.items;
                layer.confirm('确认删除吗？', {
                    btn: ['确认', '取消']
                }, function () {
                    axios.get('/delCustomer', {
                        params: {
                            id: id
                        }
                    }).then((response) => {
                        let d = response.data;
                        if(d.code === 1) {
                            layer.msg(d.message, {icon: 1, time: 1000}, function () {
                                it.splice(index, 1);
                            });
                        }else {
                            layer.msg(d.message, {icon: 2,time: 1000});
                        }
                    });

                })
            },
            showData: function (p) {
                axios.post('/customerList', {
                    [this.selected]: this.condition,
                    page: p
                }).then((response) => {
//                    console.log(response);
                    let d = response.data.data;
                    this.items = d.data;
                    this.pageHtml = d.pageHtml;
                });
            },
            more: function (id) {
                switch (this.more_selected) {
                    case 'add_server':
                        location.href = '{{ url('/addServer') }}/' + id;
                        break;
                    case 'add_domain':
                        location.href = '{{ url('/addDomain') }}';
                        break;
                }
            }
        }
    });
</script>