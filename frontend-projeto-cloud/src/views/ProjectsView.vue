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
        <table class="table table" id="projectsTable">
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
          <tbody v-if="this.projects.length > 0"  id="table">
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
        <tfoot>
          <div>
            <pagination :source="pagination" @navigate="navigate"></pagination>  
          </div>
        </tfoot>
      </div>
      <button type="button" @click="logout()" class="btn_logout btn btn-light float-end">Logout</button>
    </div>
  </div>
  
</template>

<style scoped>



</style>

<script>
import axios from 'axios'
import pagination from '../components/Pagination.vue'

console.log(localStorage)

export default{
  name: 'projects',
  components:{
    pagination
  },
  data(){
    return{
      projects: [],
      pagination: {},
      model:{
        logout:{
          token_id:localStorage.getItem('token_id')
        }
      }

    }
  },
  mounted(){
    this.getProjects();
  },
  methods: {
    getProjects(page = null){
      if(page != null){
        axios.get('http://localhost:8000/api/project?page='+page, {
                headers: {
                  "Authorization": 'Bearer '+localStorage.getItem('auth_token')
                }
              }).then(response => {
          this.projects = response.data.data.data;
          this.pagination = response.data.data;
        });
      }else{
        axios.get('http://localhost:8000/api/project', {
                headers: {
                  "Authorization": 'Bearer '+localStorage.getItem('auth_token')
                }
              }).then(response => {
          this.projects = response.data.data.data;
          this.pagination = response.data.data;
          
        }).catch( function (error) {
            if (error.response) {
                if(error.response.status == 401){
                    alert("You need to be logged to see the projects");
                }
            }
        });
      }
    },
    navigate(page){
      // console.log(page);
      this.getProjects(page);
    },
    deleteProject(projectId){
      if(confirm('Are you sure you want to delete this project?')){
        axios.delete('http://localhost:8000/api/project/'+projectId, {
          headers: {
            "Authorization": 'Bearer '+localStorage.getItem('auth_token')
          }
        }).then(response =>{
            console.log(response.data)
            alert(response.data.data);
            location.reload();
        })
      }
    },
    logout(){
      console.log(localStorage)
      //
      axios.post('http://localhost:8000/api/logout', this.model.logout ,{
        headers: {
          "Authorization": 'Bearer '+localStorage.getItem('auth_token')
        }}).then(response =>{
          console.log(response.data)
          alert(response.data.data);
          location.href = "http://localhost:5173"
        });
    }
  }
}

</script>
