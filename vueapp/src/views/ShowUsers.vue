<template>
  <section>
    <h1>Users</h1>
    <section class="users">
      <section v-for="user in userStore.users" :key="user.id">
        <router-link :to="{ name: 'showusers', params: { id: user.id } }">
          <h2>{{ user.name }}</h2>
        </router-link>
      </section>
    </section>
    <section v-if="userDetails" class="details">
      <h3>{{ userDetails.name }}</h3>
      <h4>Employee:</h4>
      <p>{{ userDetails.employeeId }}</p>
      <h4>Last purchases:</h4>
      <section>
        <p v-for="purchase in userDetails.purchases" :key="purchase.id">
          {{ purchase.name }} - {{ purchase.price }}PLN
        </p>
      </section>
      <h4>User Total Spend:</h4>
      <p>{{ userTotalSpend }}PLN</p>
    </section>
  </section>
</template>

<script setup lang="ts">
import { useUserStore } from "@/store/users";
import { computed, onMounted } from "vue";
import { useRoute } from "vue-router";

const userStore = useUserStore();

const userDetails = computed(() => {
  const data = userStore.users;
  const userId = useRoute().params.id;
  let userData = null;
  if (data) {
    userData = data.find((customer) => customer.id === userId);
  }
  return userData;
});

const userTotalSpend = computed(() => {
  let spend = 0;
  if (userDetails.value) {
    userDetails.value.purchases.forEach((element) => {
      spend += element.price;
    });
  }
  return spend;
});
const getUsers = async () => {
  await userStore.request();
};

onMounted(() => {
  getUsers();
});
</script>

<style lang="scss">
.users {
  width: 80%;
  margin: auto;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
</style>
