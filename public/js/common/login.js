//登录
new Vue({
    el: '#loginForm',
    data: {
        name: '',
        password: '',
        remember: 0
    },
    mounted: function () {
        axios.get('/remember')
            .then((response) => {
                console.log(response);
                let data = response.data;
                this.name = data.name;
                this.password = data.password;
                this.remember = 1;
            }).catch((error) => {

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