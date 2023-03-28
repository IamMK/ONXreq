<template>
  <h1>Add user</h1>
  <p v-for="error in errors" :key="error">{{ error }}</p>
  <form class="adduserForm" @submit.prevent="addUser">
    <label for="name">Imię:</label>
    <input type="text" id="name" name="name" v-model.trim="userData.name" />
    <label for="surname">Nazwisko:</label>
    <input
      type="text"
      id="surname"
      name="surname"
      v-model.trim="userData.surname"
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
    <input type="submit" value="Dodaj klienta" />
  </form>
</template>

<script setup lang="ts">
import { useUserStore } from "@/store/users";
import { reactive, ref } from "vue";
// import validate from "validate.js";
import { UserData } from "@/types/userStoreTypes";
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

let errors = ref([] as string[]);

const findErrors = (data: UserData) => {
  errors.value = [];
  if (
    data.name === "" ||
    data.car.color === "" ||
    data.car.make === "" ||
    data.car.model === "" ||
    data.car.year === 0
  )
    errors.value.push("All fields must countains any value");
  if (data.car.year < 1885)
    errors.value.push("First car was invented in 1885!");
  if (data.car.year > new Date().getFullYear())
    errors.value.push("From where you have car younger than present year?");
};

const addUser = () => {
  const data = {
    name: userData.name + " " + userData.surname,
    car: {
      color: userData.car.color,
      make: userData.car.make,
      model: userData.car.model,
      year: userData.car.year,
    },
  } as UserData;
  findErrors(data);

  if (errors.value.length === 0) userStore.addUser(data);
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
