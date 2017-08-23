// Vue.component('owner-list', {
//     template: '<select>'
//               +'<option v-for="option in options" v-bind:value="option.name">'
//               +'{{ option.name }}'
//               +'</option>'
//               +'</select>',
//     data: function () {
//         return {
//             options: ''
//         }
//     },
//     mounted: function () {
//         this.getOwnerList();
//     },
//     methods: {
//         getOwnerList: function () {
//             axios.get('/getOwnerList').then((response) => {
//                 // console.log(response.data.data);
//                 let d = response.data.data;
//                 this.options = d;
//             });
//         }
//     }
// });

new Vue({
    el: '#addServer',
    data: {
        // owner: '',
        ip: '',
        provider_name: '',
        provider_account: '',
        provider_pwd: '',
        server_account: '',
        server_pwd: '',
        remark: ''
    },
    mounted: function () {
        let id = $('#id').val();
        this.oneServer(id);
    },
    methods: {
        addServer: function () {
            axios.post('/updServer', {
                customer_id: $('#cid').val(),
                ip: this.ip,
                provider_name: this.provider_name,
                provider_account: this.provider_account,
                provider_pwd: this.provider_pwd,
                server_account: this.server_account,
                server_pwd: this.server_pwd,
                deadline: $('.datepicker').val(),
                remark: this.remark,
                id: $('#id').val()
            }).then((response) => {
                let data = response.data;
                if (data.code === 0) {
                    layer.msg(data.message);
                }else{
                    location.href = '/server';
                }
            }).catch((error) => {
                let data = error.response.data;
                for (let i in data) {
                    layer.msg(data[i][0]);
                    return false;
                }
            });
        },
        oneServer: function (id) {
            if(id) {
                axios.get('/oneServer', {
                    params: {
                        id: id
                    }
                }).then((response) => {
                    // console.log(response.data.data);
                    let data = response.data.data;
                    // this.owner = data.owner;
                    this.ip = data.ip;
                    this.provider_name = data.provider_name;
                    this.provider_account = data.provider_account;
                    this.provider_pwd = data.provider_pwd;
                    this.server_account = data.server_account;
                    this.server_pwd = data.server_pwd;
                    $('.datepicker').val(data.deadline);
                    this.remark = data.remark
                })
            }
        }
    }
});




