import { Customer } from "@/types/userStoreTypes";
import { defineStore } from "pinia";

export const useUserStore = defineStore("users", {
  state() {
    return {
      users: null as null | Customer[],
    };
  },
  actions: {
    async syncUsers() {
      await fetch(
        `https://vuetask-1ea6b-default-rtdb.europe-west1.firebasedatabase.app/customers.json`,
        {
          method: "PUT",
          body: JSON.stringify(this.users),
        }
      );
    },
    async deleteUser(id: string) {
      const index = this.users?.findIndex((user) => user.id === id) as number;
      if (index > -1)
        fetch(
          `https://vuetask-1ea6b-default-rtdb.europe-west1.firebasedatabase.app/customers/${index}.json`,
          {
            method: "DELETE",
          }
        ).then(() => {
          this.users?.splice(index, 1);
          this.syncUsers();
        });
    },
    async getUsers() {
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
