//登录
new Vue({
    el: '#loginForm',
    data: {
        name: '',
        password: '',
        remember: 1
    },
    mounted: function () {
        axios.get('/remember').then((response) => {
            console.log(response);
            let d = response.data;
            if(d.code === 1) {
                this.name = d.data.name;
                this.password = d.data.pwd;
                this.remember = 1;
            }else {
                this.$message.error(d.message);
            }
        });
    },
    methods: {
        login: function () {
            axios.post('/login', {
                name: this.name,
                password: this.password,
                remember: this.remember
            }).then((response) => {
                let data = response.data;
                if (data.code === 0) {
                    this.$message.error(data.message);
                }else{
                    location.href = '/home';
                }
            }).catch((error) => {
                let data = error.response.data;
                for (let i in data) {
                    this.$message.error(data[i][0]);
                    return false;
                }
            });
        }
    }
});

