import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import ShowUsers from "../views/ShowUsers.vue";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/showusers",
    name: "showusers",
    component: ShowUsers,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
