<template>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>
          Projects
          <RouterLink to="/projects/create" class="btn btn-outline-primary float-end">
            Add Project
          </RouterLink>
        </h4>  
      </div>
      <div class="card-body">
        <table class="table table">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Value</th>
              <th>Start date</th>
              <th>End date</th>
              <th>Status</th>
              <th><!--Action--></th>
            </tr>
          </thead>
          <tbody v-if="this.projects.length > 0">
            <tr v-for="(project, index) in this.projects" :key="index">
              <td>{{ project.id }}</td>
              <td>{{ project.name }}</td>
              <td>{{ project.value }}</td>
              <td>{{ project.start_date }}</td>
              <td>{{ project.end_date }}</td>
              <td>{{ project.status }}</td>
              <td>
                <RouterLink :to="{ path:'/projects/'+project.id+'/edit'}" class="btn btn-outline-secondary">
                  Edit
                </RouterLink>
                <button type="button" @click="deleteProject(project.id)" class="btn btn-danger">Delete</button>
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr>
              <td colspan="7">Loading...</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<style>

</style>

<script>
import axios from 'axios'


export default{
  name: 'projects',
  data(){
    return{
      projects: []
    }
  },
  mounted(){
    // console.log('opa');
    this.getProjects();
  },
  methods: {
    getProjects(){
      axios.get('http://localhost:8000/api/project').then(response => {
        this.projects = response.data.data;
      });
    },
    deleteProject(projectId){
      if(confirm('Are you sure you want to delete this project?')){
        axios.delete('http://localhost:8000/api/project/'+projectId).then(response =>{
          console.log(response.data)
          alert(response.data.data);
          location.reload()
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
}

</script>
