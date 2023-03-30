<template>
  <section>
    <h1>Modify User</h1>
    <section class="users">
      <button
        @click="getDataToModify(user.id)"
        v-for="user in userStore.users"
        :key="user.id"
      >
        <h2>{{ user.name }}</h2>
      </button>
    </section>
    <form class="adduserForm" @submit.prevent="modifyUser()">
      <label for="name">Imię i nazwisko:</label>
      <input type="text" id="name" name="name" v-model.trim="userData.name" />
      <label for="name">Pracownik:</label>
      <input
        type="text"
        id="name"
        name="name"
        v-model.trim="userData.employee"
      />
      <label for="car_make">Marka samochodu:</label>
      <input
        type="text"
        id="car_make"
        name="car_make"
        v-model.trim="userData.car.make"
      />
      <label for="car_model">Model samochodu:</label>
      <input
        type="text"
        id="car_model"
        name="car_model"
        v-model.trim="userData.car.model"
      />
      <label for="car_year">Rok produkcji samochodu:</label>
      <input
        type="number"
        id="car_year"
        name="car_year"
        v-model.trim="userData.car.year"
      />
      <label for="car_color">Kolor samochodu:</label>
      <input
        type="text"
        id="car_color"
        name="car_color"
        v-model.trim="userData.car.color"
      />
      <input type="submit" value="Aktualizuj dane" />
    </form>
  </section>
</template>

<script setup lang="ts">
import { useUserStore } from "@/store/users";
import { reactive } from "vue";

const userStore = useUserStore();
const userData = reactive({
  id: "",
  name: "",
  car: {
    color: "",
    make: "",
    model: "",
    year: 0,
  },
  employee: "",
});

const getDataToModify = (id: string) => {
  const data = userStore.users;
  let userToModify = null;
  if (data) {
    userToModify = data.find((customer) => customer.id === id);
  }
  if (userToModify) {
    userData.id = id;
    userData.name = userToModify.name;
    userData.car = userToModify.car;
    userData.employee = userToModify.employee;
  }
};

const modifyUser = () => {
  userStore.updateUser(userData);
};
</script>
