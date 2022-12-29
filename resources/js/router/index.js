import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue"
import UserDetails from "../views/UserDetails.vue"
import Login from "../views/Login.vue"
import Register from "../views/Register.vue"
import ManageAllUsers from "../views/ManageAllUsers.vue"

Vue.use(VueRouter);

const router = new VueRouter({
  mode: "history",
  routes: [
    {
      path: "/",
      name: "home",
      component: Home,
    },
    {
        path: "/details",
        name: "user-details",
        component: UserDetails,
      },
      {
        path: "/details/:id",
        name: "user-details-id",
        component: UserDetails,
      },
      {
        path: "/login_page",
        name: "login",
        component: Login,
      },
      {
        path: "/register",
        name: "register",
        component: Register,
      },
      {
        path: "/all_users",
        name: "all_users",
        component: ManageAllUsers,
      },
  ],
});

export default router;
