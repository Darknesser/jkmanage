//添加服务器
new Vue({
    el: '#addServer',
    data: {
        owner: '',
        ip: '',
        provider_name: '',
        provider_account: '',
        provider_pwd: '',
        server_account: '',
        server_pwd: ''
    },
    mounted: function () {
        let id = $('#id').val();
        if(id) {
            axios.get('/oneServer', {
                params: {
                    id: id
                }
            }).then((response) => {
                // console.log(response.data.data);
                let data = response.data.data;
                this.owner = data.owner;
                this.ip = data.ip;
                this.provider_name = data.provider_name;
                this.provider_account = data.provider_account;
                this.provider_pwd = data.provider_pwd;
                this.server_account = data.server_account;
                this.server_pwd = data.server_pwd;
                $('.datepicker').val(data.deadline);
            })
        }
    },
    methods: {
        addServer: function () {
            axios.post('/updServer', {
                owner: this.owner,
                ip: this.ip,
                provider_name: this.provider_name,
                provider_account: this.provider_account,
                provider_pwd: this.provider_pwd,
                server_account: this.server_account,
                server_pwd: this.server_pwd,
                deadline: $('.datepicker').val(),
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
        }
    }
});


