<template>
  <section>App</section>
</template>

<script setup lang="ts">
import { onMounted } from "vue";

const request = async () => {
  const request = await fetch(
    `https://vuetask-1ea6b-default-rtdb.europe-west1.firebasedatabase.app/customers`
  );

  if (!request.ok) {
    const error = new Error("Database connection error");
    throw error;
  }

  const response = await request.json();
  console.log(response);

  return response;
};

onMounted(async () => {
  await request();
});
</script>
