<template>
  <section>
    <h1>Users</h1>
    <section v-for="user in users" :key="user.id">
      <section>
        <h2>{{ user.name }}</h2>
      </section>
    </section>
  </section>
</template>

<script setup lang="ts">
import { useUserStore } from "@/store/users";
import { onMounted } from "vue";

const userStore = useUserStore();
const users = useUserStore().users;

const getUsers = async () => {
  await userStore.request();
};

onMounted(() => {
  getUsers();
});
</script>
