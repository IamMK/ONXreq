import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import TaskFirst from "../views/TaskFirst.vue";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/taskfirst",
    name: "taskfirst",
    component: TaskFirst,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
