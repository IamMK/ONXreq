import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import ShowUsers from "../views/ShowUsers.vue";
import AddUser from "../views/AddUser.vue";
import ModifyUser from "../views/ModifyUser.vue";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/showusers/:id?",
    name: "showusers",
    component: ShowUsers,
    props: true,
  },
  {
    path: "/adduser",
    name: "adduser",
    component: AddUser,
  },
  {
    path: "/modifyuser",
    name: "modifyuser",
    component: ModifyUser,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
