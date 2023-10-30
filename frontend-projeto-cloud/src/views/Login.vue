<template>

    <div class="container mt-5">
        <div class="card" v-if="this.haveAccount == true">
            <div class="card-header">
                <h4>
                    Login
                </h4>
            </div>
            <div class="card-body">
                <div class="input mb-3">
                    <label for="">E-mail</label>
                    <input type="email" v-model="model.user.email" class="form-control"/>
                </div>
                <div class="input mb-4">
                    <label for="">Password</label>
                    <input type="password" v-model="model.user.password" class="form-control"/>
                </div>
                
            </div>
            <div class="card-footer">
                <div class="login_button mb-3 mt-3">
                    <button type="button" @click="authUser" class="btn btn-primary">Login</button>
                </div>
                <div class="login_button mb-3 mt-3">
                    <button type="button" @click="changeHaveAccount(false)" class="btn btn-outline-secondary">New account</button>
                </div>
            </div>
        </div>
        <div class="card" v-if="this.haveAccount == false">
            <div class="card-header">
                <h4>
                    New account
                </h4>
            </div>
            <div class="card-body">
                <div class="input mb-3">
                    <label for="">Name</label>
                    <input type="text" v-model="model.createUser.name" class="form-control"/>
                </div>
                <div class="input mb-3">
                    <label for="">E-mail</label>
                    <input type="email" v-model="model.createUser.email" class="form-control"/>
                </div>
                <div class="input mb-4">
                    <label for="">Password</label>
                    <input type="password" v-model="model.createUser.password" class="form-control"/>
                </div>
                
            </div>
            <div class="card-footer">
                <div class="login_button mb-3 mt-3">
                    <button type="button" @click="registerUser" class="btn btn-primary">Register</button>
                </div>
                <div class="login_button mb-3 mt-3">
                    <button type="button" @click="changeHaveAccount(true)" class="btn btn-outline-secondary">Login</button>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

.container{
    display: flex;
    justify-content: center;
    align-items: center; 
}

.card{
    width: 50%;
}

.card-header{
    display: flex;
    justify-content: center;
    align-items: center;
}

.login_button{
    display: flex;
    justify-content: center;
    align-items: center;
}

.input{
    display: flex;
    align-content: center;
    flex-direction: column;
    flex-wrap: wrap;
}

.form-control{
    width: 80%;
}

.btn{
    width: 40%;
}
</style>

<script>
import axios from 'axios';

// localStorage.setItem('logged', false);

export default{
    name: 'login',
    data(){
        return{
            haveAccount: true,
            model:{
                user:{
                    email:'',
                    password:''
                },
                createUser:{
                    name:'',
                    email:'',
                    password:''
                }
            }
        }
    },
    methods: {
        authUser(){
            axios.post('http://localhost:8000/api/login', this.model.user).then(response =>{
                console.log(response.data)
                alert(response.data.data);
                localStorage.setItem('token_id', response.data.token_id);
                localStorage.setItem('auth_token', response.data.auth_token);
                this.model.user = {
                    email:'',
                    password:''
                }
                location.href = "http://localhost:5173/projects"
            }).catch( function (error) {
                if (error.response) {
                    if(error.response.status == 401){
                        console.log(error.response.data);
                        alert(error.response.data.data);
                        localStorage.setItem('logged',false);
                    }
                }
            });
        },
        registerUser(){
            axios.post('http://localhost:8000/api/user', this.model.createUser).then(response =>{
                console.log(response.data)
                alert(response.data.data);
                this.model.createUser = {
                    name:'',
                    email:'',
                    password:''
                }
                this.haveAccount = true;
            }).catch( function (error) {
                if (error.response) {
                    if(error.response.status == 400){
                        console.log(error.response.data);
                        alert(error.response.data.data);
                        this.haveAccount = false;
                    }else if(error.response.status == 500){
                        console.log(error.response.data);
                        alert(error.response.data.data);
                        this.haveAccount = false;
                    }
                }
            });
        },
        changeHaveAccount(param){
            if(param == true){
                this.haveAccount = true;
            }else{
                this.haveAccount = false;
            }
        }
    }
}

</script>