import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue"
import UserDetails from "../views/UserDetails.vue"
import Login from "../views/Login.vue"

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
        path: "/login",
        name: "login",
        component: Login,
      },
  ],
});

export default router;
