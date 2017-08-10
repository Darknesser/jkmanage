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
                // let data = response.data;
                // if (data.code === 0) {
                //     layer.msg(data.message);
                // }else{
                //     location.href = '/server';
                // }
            }).catch((error) => {
                // let data = error.response.data;
                // for (let i in data) {
                //     layer.msg(data[i][0]);
                //     return false;
                // }
            });
        }
    }
});

//服务器列表
new Vue({
    el: '#serverTable',
    data: {
        items: '',
        pageHtml: ''
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
        }
    }
});
