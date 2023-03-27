import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import ShowUsers from "../views/ShowUsers.vue";
// import ShowUserDetails from "@/components/ShowUserDetails.vue";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/showusers/:id?",
    name: "showusers",
    component: ShowUsers,
    props: true,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
