<template>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Projects
                    <RouterLink to="/projects" class="btn btn-outline-primary float-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                    </RouterLink>
                </h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" v-model="model.project.name" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Value</label>
                    <input type="number" v-model="model.project.value" step="0.01" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Start date</label>
                    <input type="date" v-model="model.project.start_date" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">End date</label>
                    <input type="date" v-model="model.project.end_date" class="form-control"/>
                </div>
                <div class="mb-0">
                    <label for="">Status</label>
                </div>
                <div class="mb-4">
                    <input type="checkbox" id="checkbox" v-model="model.project.status" />
                </div>
                
                <div class="mb-3">
                    <button type="button" @click="updateProject" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import axios from 'axios';

export default{
    name: 'projectEdit',
    data(){
        return{
            errorList: '',
            model:{
                project:{
                    name:'',
                    start_date:'',
                    end_date:'',
                    value:'',
                    status:''
                }
            }
        }
    },
    mounted(){
        this.getProjectData(this.$route.params.id);
        this.projectId = this.$route.params.id;
    },
    methods: {
        getProjectData(projectId){
            axios.get('http://localhost:8000/api/project/'+projectId, {
                headers: {
                  "Authorization": 'Bearer '+localStorage.getItem('auth_token')
                }}).then(response =>{
                console.log(response.data.data);
                this.model.project.name = response.data.data.name;
                this.model.project.start_date = response.data.data.start_date;
                this.model.project.end_date = response.data.data.end_date;
                this.model.project.value = response.data.data.value;
                this.model.project.status = response.data.data.status == 1 ? true : false;
            }).catch( function (error) {
                if (error.response) {
                    if(error.response.status == 404){
                        alert(error.response.data.data);
                    }
                }
            });
        },
        updateProject(){
            var $this = this;
            axios.put('http://localhost:8000/api/project/'+this.projectId, this.model.project,{
                headers: {
                  "Authorization": 'Bearer '+localStorage.getItem('auth_token')
                }} ).then(response =>{
                
                console.log(response.data)
                alert(response.data.data);

                this.model.project = { 
                    name:'',
                    start_date:'',
                    end_date:'',
                    value:'',
                    status:''
                }
                location.href = "http://localhost:5173/projects"
            }).catch( function (error) {
                if (error.response) {
                    if(error.response.status == 404){
                        alert(error.response.data.data);
                    }
                }
            });
        }

    }
}

</script>