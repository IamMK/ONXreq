<template>
  <h1>Add user</h1>
  <form class="adduserForm" @submit.prevent="addUser">
    <label for="name">Imię:</label>
    <input type="text" id="name" name="name" v-model="userData.name" />
    <label for="surname">Nazwisko:</label>
    <input type="text" id="surname" name="surname" v-model="userData.surname" />
    <label for="car_make">Marka samochodu:</label>
    <input
      type="text"
      id="car_make"
      name="car_make"
      v-model="userData.car.make"
    />
    <label for="car_model">Model samochodu:</label>
    <input
      type="text"
      id="car_model"
      name="car_model"
      v-model="userData.car.model"
    />
    <label for="car_year">Rok produkcji samochodu:</label>
    <input
      type="number"
      id="car_year"
      name="car_year"
      v-model="userData.car.year"
    />
    <label for="car_color">Kolor samochodu:</label>
    <input
      type="text"
      id="car_color"
      name="car_color"
      v-model="userData.car.color"
    />
    <input type="submit" value="Dodaj klienta" />
  </form>
</template>

<script setup lang="ts">
import { useUserStore } from "@/store/users";
import { reactive } from "vue";

const userStore = useUserStore();

const userData = reactive({
  name: "",
  surname: "",
  car: {
    color: "",
    make: "",
    model: "",
    year: 0,
  },
});

const addUser = () => {
  const data = {
    name: userData.name + " " + userData.surname,
    car: {
      color: userData.car.color,
      make: userData.car.make,
      model: userData.car.model,
      year: userData.car.year,
    },
  };
  userStore.addUser(data);
};
</script>

<style lang="scss">
.adduserForm {
  padding: 20px;
  max-width: 800px;
  margin: auto;
  display: flex;
  flex-direction: column;
}
</style>
