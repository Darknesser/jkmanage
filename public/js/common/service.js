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
        server_pwd: '',
        deadline: '08/08/2017'
    },
    methods: {
        addServer: function () {
            console.log(this.deadline);
            // axios.post('/updServer', {
            //     owner: this.owner,
            //     ip: this.ip,
            //     provider_name: this.provider_name,
            //     provider_account: this.provider_account,
            //     provider_pwd: this.provider_pwd,
            //     server_account: this.server_account,
            //     server_pwd: this.server_pwd,
            //     deadline: this.deadline
            // }).then((response) => {
            //     let data = response.data;
            //     if (data.code === 0) {
            //         layer.msg(data.message);
            //     }else{
            //         location.href = '/server';
            //     }
            // }).catch((error) => {
            //     let data = error.response.data;
            //     for (let i in data) {
            //         layer.msg(data[i][0]);
            //         return false;
            //     }
            // });
        }
    }
});