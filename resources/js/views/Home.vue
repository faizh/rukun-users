<template>
  <div class="container">
    <navbar-component :users="users" />
    <div class="row mb-5">
      <div class="col-md-6 order-first">
        <div class="d-flex align-items-center h-100">
          <div class="container">
            <h2 class="text-welcome">
              Hi, <strong>{{ users.name }}</strong><br/>
              Welcome to
              <span class="color-primary"><strong>RoeKoen</strong></span>
            </h2>
            <p class="motto text-align-justify">
              Your Personal Assistance to Managing Users Data!
            </p>
            <router-link class="btn btn-primary" to="/details">Manage your data</router-link
            >
            <router-link class="btn btn-primary" to="/all_users" v-if="users.role_id == 1">Manage all data</router-link>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <img
          src="images/profile-details.svg"
          width="100%"
          class="p-5 img-hero"
        />
      </div>
    </div>
  </div>
</template>

<style scoped>
.btn-primary {
  background-color: #69ca99;
  border-color: #69ca99;
}

.btn-primary:hover {
  background-color: white;
  border-color: #69ca99;
  color: #69ca99;
}
</style>

<script>
import router from "../router";

export default {
  data() {
        return {
            users: {
                id: null,
                name: '',
                role_id: ''
            }
        }
    },

  mounted() {
        const token = localStorage.token
        this.users.id = localStorage.userID

        const config = {
            headers: { Authorization: `Bearer ${token}` }
        };

        const api = "http://127.0.0.1:8000/api/users/" + this.users.id;
        this.axios.get(api, config).then((response) => {
            this.users.id = response.data.id
            this.users.name = response.data.name
            this.users.role_id = response.data.role_id
        }).catch(function(error){
          if (error.response.status == 401) {
              router.push({name: 'login'})
          }
        });
    }
}
</script>