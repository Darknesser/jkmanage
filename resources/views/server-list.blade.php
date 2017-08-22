<!DOCTYPE html>
<html>
<head>
    <title>巨开管理后台</title>

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
                        <input type="text" class="search" v-on:keyup.13="showData" v-model="condition"/>
                        <a class="btn-flat new-product" href="{{ url('/addServer') }}">+ 添加</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                {{--<input type="checkbox" />--}}
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
                            {{--<td>--}}
                                {{--<input type="checkbox" />--}}
                                {{--<a href="#" class="name">@{{ item.id }} </a>--}}
                            {{--</td>--}}
                            <td class="description">
                                @{{ item.id }}
                            </td>
                            <td class="description">
                                <a href="{{ url('/customer/1') }}">@{{ item.owner }}</a>
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
                            <td class="description" v-bind:id="'remark-'+index" v-on:mouseover="showDetail(index)">
                                @{{ item.remark | replace }}
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
                    <div class="pagination pull-right" v-html="pageHtml" v-on:click="anotherPage(event)"></div>
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
                            });
                        }else {
                            layer.msg(d.message, {icon: 2,time: 1000});
                        }
                    });

                })
            },
            showData: function (p) {
                axios.post('/serverList', {
                    [this.selected]: this.condition,
                    page: p
                }).then((response) => {
                    let d = response.data.data;
                    this.items = d.data;
                    this.pageHtml = d.pageHtml;
                });
            },
            showDetail: function (index) {
                let data = this.items[index].remark;
                data = !data ? '暂无备注' : data;
                layer.tips(data, '#remark-'+index, {tips: 4});
            }
        },
        filters: {
            replace: function (value) {
                let strlen = 0;
                let s = '';
                if(!value) {
                    return "";
                }
                for(let i = 0; i < value.length; i++) {
                    if(value.charCodeAt(i) > 128) {
                        strlen += 2;
                    } else {
                        strlen ++;
                    }
                    s += value.charAt(i);
                    if(strlen >= 10) {
                        return s + '...';
                    }
                }
                return s;
            }
        }
    });
</script>