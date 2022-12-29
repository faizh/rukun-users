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
          
            <!-- SIGN UP -->
            <form @submit.prevent="onSubmitSignUp">
              <div
                class="
                  d-flex
                  flex-row
                  align-items-center
                  justify-content-center justify-content-lg-start
                "
              ></div>
  
              <!-- Name input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="form3Example2"
                  >Fullname</label
                >
                <input
                  type="text"
                  id="form3Example2"
                  class="form-control form-control"
                  placeholder="Enter your fullname"
                  v-model="users.name"
                  required
                />
              </div>
  
              <!-- Email input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="form3Example4"
                  >Email address</label
                >
                <input
                  type="email"
                  id="form3Example4"
                  class="form-control form-control"
                  placeholder="Enter a valid email address"
                  v-model="users.email"
                  required
                />
              </div>
  
              <!-- Phone number input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="form3Example5"
                  >Phone number</label
                >
                <input
                  type="number"
                  id="form3Example5"
                  class="form-control form-control"
                  placeholder="Enter a valid phone number"
                  v-model="users.phone_number"
                  required
                />
              </div>
  
              <!-- Phone number input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="form3Example6"
                  >Address</label
                >
                <b-form-textarea
                  id="form3Example6"
                  placeholder="Enter your address"
                  name="address"
                  required
                  v-model="users.address"
              ></b-form-textarea>
              </div>
             
  
              <!-- Password input -->
              <div class="form-outline mb-3">
                <label class="form-label" for="form3Example7">Password</label>
                <input
                  type="password"
                  id="form3Example7"
                  class="form-control form-control"
                  placeholder="Enter password"
                  v-model="users.password"
                  required
                />
                
              </div>
  
              <div class="text-center text-lg-start mt-4 pt-2">
                <button
                  type="submit"
                  class="btn btn-primary"
                  style="padding-left: 2.5rem; padding-right: 2.5rem"
                >
                  Sign Up
                </button>
                <p class="small fw-bold mt-2 pt-1 mb-0">
                  Already have an account?
                  <router-link to="/login_page">Sign In here</router-link>
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
          Copyright © 2020. All rights reserved.
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
              users: {
                  name: "",
                  email: "",
                  phone_number: 0,
                  address: "",
                  password: "",
                  role_id: 2
              }
          }
      },
  
      methods: {
          onSubmitSignUp() {
              const api = "http://127.0.0.1:8000/api/users"
              this.axios.post(api, this.users).then((response) => {
                  if(response.data.status == true){
                    router.push({name: 'login'})
                  }else{
                    console.log(response)
                  }
              })
          }
      }
  }
  </script>