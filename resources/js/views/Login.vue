<template>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img
            src="images/forms.svg"
            class="img-fluid"
            alt="Sample image"
          />
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <h3 class="color-primary text-center mb-3 mt-4">RoeKoen</h3>
          
          <!-- SIGN IN -->
          <form @submit="onSubmitLogin">
            <div
              class="
                d-flex
                flex-row
                align-items-center
                justify-content-center justify-content-lg-start
              "
            ></div>

            <!-- Email input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="form3Example3"
                >Email address</label
              >
              <input
                type="email"
                id="form3Example3"
                class="form-control form-control"
                placeholder="Enter a valid email address"
                v-model="users.email"
              />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
              <input
                type="password"
                id="form3Example4"
                class="form-control form-control"
                placeholder="Enter password"
                v-model="users.password"
              />
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button
                type="submit"
                class="btn btn-primary"
                style="padding-left: 2.5rem; padding-right: 2.5rem"
              >
                Login
              </button>
              <p class="small fw-bold mt-2 pt-1 mb-0">
                Don't have an account?
                <router-link to="/register">Sign Up here</router-link>
              </p>
            </div>
          </form>

        </div>
      </div>
    </div>
    <div
      class="
        d-flex
        flex-column flex-md-row
        text-center text-md-start
        justify-content-between
        py-4
        px-4 px-xl-5
        bottom
      "
    >
      <!-- Copyright -->
      <div class="mb-md-0">
        Copyright © 2022. All rights reserved.
      </div>
      <!-- Copyright -->

      <!-- Right -->
      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
      <!-- Right -->
    </div>
  </section>
</template>

<style scoped>

.color-primary {
    color: #69ca99;
}

.bg-primary {
  background-color: #69ca99;
}

.btn-primary {
  background-color: #69ca99;
  border: 0;
}

.btn-primary:hover {
  background-color: #3b805d;
  border: 0;
}

.divider:after,
.divider:before {
  content: "";
  flex: 1;
  height: 1px;
  background: #eee;
}
.h-custom {
  height: calc(100% - 73px);
}
@media (max-width: 450px) {
  .h-custom {
    height: 100%;
  }
}
</style>

<script>
import router from "../router";

export default {
    data() {
        return {
            isLoginPage: true,
            users: {
                email: "",
                password: "",
            }
        }
    },

    methods: {
        onSubmitLogin(event) {
            event.preventDefault()
            const api = "http://127.0.0.1:8000/api/login"
              this.axios.post(api, this.users).then((response) => {
                  if(response.data.status == true){
                    localStorage.setItem('userID', response.data.data.id)
                    localStorage.setItem('token', response.data.token)

                    router.push({name: 'home'})
                  }else{
                    console.log(response.data.messages)
                  }
              })
        },
    }
}
</script>