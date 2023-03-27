import { Customer } from "@/types/userStoreTypes";
import { defineStore } from "pinia";

export const useUserStore = defineStore("app", {
  state() {
    return {
      users: null as null | Customer[],
    };
  },
  actions: {
    async request() {
      const request = await fetch(
        `https://vuetask-1ea6b-default-rtdb.europe-west1.firebasedatabase.app/customers.json`
      );

      if (!request.ok) {
        const error = new Error("Database connection error");
        throw error;
      }

      const response = await request.json();
      console.log(response);

      this.users = response;
    },
  },
});
