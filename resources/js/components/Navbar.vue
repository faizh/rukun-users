<template>
  <div class="container">
    <b-navbar toggleable="lg">
      <b-navbar-brand>
        <router-link to="/" class="color-primary title">RoeKoen</router-link>
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <!-- Right aligned nav items -->
        <b-navbar-nav class="ms-auto">
          <b-nav-item-dropdown>
            <!-- Using 'button-content' slot -->
            <template #button-content>
              {{ name }}
            </template>
            <div class="container">
              <b-button variant="info" size="sm">Administrator</b-button>
              <b-button variant="outline-danger" size="sm" class="mt-1" @click="logout"
                >Sign Out</b-button
              >
            </div>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>
  
<style scoped>

.color-primary {
    color: #69ca99;
}

.router-link-exact-active .nav-link {
  color: #69ca99;
}

a {
  text-decoration: none;
}

.title:hover {
  color: #3b805d;
}
</style>

<script>
import router from "../router";

export default {
    props: ["name"],

    methods: {
        logout() {
            const config = {
                headers: { Authorization: `Bearer ${this.token}` }
            }

            const api = "http://127.0.0.1:8000/api/logout";
        this.axios.post(api, null, config).then((response) => {
            if (response.data.status == true) {
                router.push({name: 'login'})
            }
        });
        }
    },

    mounted() {
        this.token = localStorage.token
    }
}
</script>