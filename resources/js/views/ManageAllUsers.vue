<template>
  <div class="container">
    <navbar-component :users="users" />

    <div class="text-center">
      <h4>Here is All Users Data</h4>
    </div>

    <table class="table mt-3">
      <thead>
        <th>No</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
      </thead>
      <tbody>
        <tr v-for="(item, index) in items" :key="item.id">
          <td>{{ index + 1 }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.address }}</td>
          <td>{{ item.phone_number }}</td>
          <td>{{ item.email }}</td>
          <td>{{ (item.role_id == 1) ? 'Administrator' : 'User' }}</td>
          <td>
            <router-link :to="'/details/' + item.id">
              <b-button
                class="btn btn-sm ml-1"
                variant="outline-warning"
                @click="editData(item.id)"
                ><b-icon icon="pen"></b-icon
              ></b-button>
            </router-link>
              <b-button
                class="btn btn-sm ml-1"
                variant="outline-danger"
                @click="deleteData(item.id)"
                ><b-icon icon="trash"></b-icon
              ></b-button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
  
  <script>

  import router from "../router"
  
export default {
  data() {
    return {
      token: "",
      items: [],
      users: {
        id: null,
        name: "",
        role_id: "",
      },
    };
  },

  methods: {
    async syncData() {
      const config = {
        headers: { Authorization: `Bearer ${this.token}` },
      };

      const api = "http://127.0.0.1:8000/api/users";
      this.axios
        .get(api, config)
        .then((response) => {
          this.items = response.data;
        })
        .catch(function (error) {
          if (error.response.status == 401) {
            router.push({ name: "login" });
          }
        });
    },

    deleteData(id) {
      const config = {
        headers: { Authorization: `Bearer ${this.token}` },
      };

      const api = "http://127.0.0.1:8000/api/users/" + id;
      this.axios
        .delete(api, config)
        .then((response) => {
          if(response.data.status == true) {
            this.syncData()
          }
        })
        .catch(function (error) {
          if (error.response.status == 401) {
            router.push({ name: "login" });
          }
        });
    }
  },

  mounted() {
    this.token = localStorage.token;
    this.users.id = localStorage.userID;

    const config = {
      headers: { Authorization: `Bearer ${this.token}` },
    };

    const api = "http://127.0.0.1:8000/api/users/" + this.users.id;
    this.axios
      .get(api, config)
      .then((response) => {
        this.users.id = response.data.id;
        this.users.name = response.data.name;
        this.users.role_id = response.data.role_id;

        this.syncData();
      })
      .catch(function (error) {
        if (error.response.status == 401) {
          router.push({ name: "login" });
        }
      });
  },
};
</script>