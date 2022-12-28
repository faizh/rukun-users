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
          <form v-if="isLoginPage" @submit="onSubmitLogin">
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
              />
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button
                type="button"
                class="btn btn-primary"
                style="padding-left: 2.5rem; padding-right: 2.5rem"
              >
                Login
              </button>
              <p class="small fw-bold mt-2 pt-1 mb-0">
                Don't have an account?
                <a href="#" @click="setLogin(false)" class="link-danger">Sign Up here</a>
              </p>
            </div>
          </form>


          <!-- SIGN UP -->
          <form v-if="!isLoginPage" @submit="onSubmitSignUp">
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
              <label class="form-label" for="form3Example3"
                >Fullname</label
              >
              <input
                type="text"
                id="form3Example3"
                class="form-control form-control"
                placeholder="Enter your fullname"
              />
            </div>

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
              />
            </div>

            <!-- Phone number input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="form3Example3"
                >Phone number</label
              >
              <input
                type="number"
                id="form3Example3"
                class="form-control form-control"
                placeholder="Enter a valid phone number"
              />
            </div>

            <!-- Phone number input -->
            <div class="form-outline mb-2">
              <label class="form-label" for="form3Example3"
                >Address</label
              >
              <b-form-textarea
                id="textarea-small"
                placeholder="Enter your address"
                name="address"
            ></b-form-textarea>
            </div>
           

            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
              <input
                type="password"
                id="form3Example4"
                class="form-control form-control"
                placeholder="Enter password"
              />
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button
                type="button"
                class="btn btn-primary"
                style="padding-left: 2.5rem; padding-right: 2.5rem"
              >
                Sign Up
              </button>
              <p class="small fw-bold mt-2 pt-1 mb-0">
                Already have an account?
                <a href="#" @click="setLogin(true)" class="link-danger">Sign Up here</a>
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
export default {
    data() {
        return {
            isLoginPage: true
        }
    },

    methods: {
        setLogin(isLogin){
            console.log("asdasd");
            this.isLoginPage = isLogin
        },

        onSubmitLogin(event) {
            event.preventDefault()
        },

        onSubmitSignUp(event) {
            event.preventDefault()
        }
    }
}
</script>