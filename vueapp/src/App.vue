<template>
  <nav>
    <router-link :to="{ name: 'showusers' }">Show users</router-link>
    <router-link :to="{ name: 'adduser' }">Add user</router-link>
    <router-link :to="{ name: 'modifyuser' }">Modify user</router-link>
  </nav>
  <router-view />
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useUserStore } from "./store/users";

const userStore = useUserStore();

const getUsers = async () => {
  await userStore.getUsers();
};

onMounted(() => {
  getUsers();
});
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
  a {
    font-weight: bold;
    color: #2c3e50;
    padding: 0 20px;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
