<template>
  <div class="container">
    <navbar-component />
    <div class="row mb-5">
      <div class="col-md-6 order-first">
        <div class="d-flex align-items-center h-100">
          <div class="container">
            <h2 class="text-welcome">
              Hi, <strong>Faiz</strong><br/>
              Welcome to
              <span class="color-primary"><strong>RoeKoen</strong></span>
            </h2>
            <p class="motto text-align-justify">
              Your Personal Assistance to Managing Users Data!
            </p>
            <router-link class="btn btn-primary" to="/details">Manage here</router-link
            >
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