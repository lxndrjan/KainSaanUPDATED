import { createRouter, createWebHistory } from "vue-router";

import AdminDashboard from "../views/admin/Dashboard.vue";
import AdminAnalytics from "../views/admin/Analytics.vue";
import AdminUsers from "../views/admin/Users.vue";
import AdminFoodEstablishments from "../views/admin/FoodEstablishments.vue";
import AdminReportsReviews from "../views/admin/ReportsReviews.vue";
import UserHome from "../views/user/Home.vue";
import UserFoodEstablishments from "../views/user/FoodEstablishments.vue";
import UserMap from "../views/user/Map.vue";
import UserSettings from "../views/user/Settings.vue";

const routes = [
  {
    path: "/",
    name: "SignIn",
    meta: { hasUser: true },
    component: () => import("../views/auth/SignIn.vue"),
  },
  {
    path: "/register",
    name: "Register",
    component: () => import("../views/auth/Register.vue"),
  },
  {
    path: "/admin",
    name: "AdminIndex",
    meta: { isAdmin: true, requiresLogin: true },
    rediect: "/admin/dashboard",
    component: () => import("../views/admin/Index.vue"),
    children: [
      {
        path: "dashboard",
        name: "AdminDashboard",
        components: { AdminDashboard: AdminDashboard },
      },
      {
        path: "analytics",
        name: "AdminAnalytics",
        components: { AdminDashboard: AdminAnalytics },
      },
      {
        path: "users",
        name: "AdminUsers",
        components: { AdminDashboard: AdminUsers },
      },
      {
        path: "foodestablishments",
        name: "AdminFoodEstablishments",
        components: { AdminDashboard: AdminFoodEstablishments },
      },
      {
        path: "reportsreviews",
        name: "AdminReportsReviews",
        components: { AdminDashboard: AdminReportsReviews },
      },
    ],
  },
  {
    path: "/user",
    name: "UserIndex",
    meta: { isUser: true, requiresLogin: true },
    rediect: "/user/home",
    component: () => import("../views/user/Index.vue"),
    children: [
      {
        path: "home",
        name: "UserHome",
        components: { UserHome: UserHome },
      },
      {
        path: "food-establishments",
        name: "UserFoodEstablishments",
        components: { UserFoodEstablishments: UserFoodEstablishments },
      },
      {
        path: "map",
        name: "UserMap",
        components: { UserMap: UserMap },
      },
      {
        path: "settings",
        name: "UserSettings",
        components: { UserSettings: UserSettings },
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  base: import.meta.env.BASE_URL,
  routes,
  scrollBehavior(to, from, savedPosition) {
    return { top: 0, behavior: "smooth" };
  },
});

router.beforeEach((to, from, next) => {
  if (
    to.matched.some((record) => record.meta.requiresLogin) &&
    !localStorage.getItem("auth")
  ) {
    next({ name: "SignIn" });
  } else if (
    to.matched.some((record) => record.meta.hasUser) &&
    localStorage.getItem("auth") &&
    localStorage.getItem("isAdmin")
  ) {
    next({ name: "AdminIndex" });
  } else {
    next();
  }
});
export default router;
