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
            Faiz
          </template>
          <div class="container">
            <b-button variant="info" size="sm">Administrator</b-button>
            <b-button variant="outline-danger" size="sm" class="mt-1">Sign Out</b-button>
          </div>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
  </template>
  
  <style scoped>
  
  .router-link-exact-active .nav-link {
    color: #69ca99;
  }

  a { text-decoration: none; }

  .title:hover {
    color: #3b805d;
  }
  

  </style>