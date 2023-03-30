import { Customer, UserData } from "@/types/userStoreTypes";
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
    async addUser(user: UserData) {
      let id = "1";
      let userNumber = null;
      if (this.users) {
        id = (parseInt(this.users[this.users?.length - 1].id) + 1).toString();
        userNumber = this.users.length.toString();
      }
      const userData = {
        ...user,
        id,
        purchases: [],
        employee: "Damian z Onx",
      } as Customer;
      await fetch(
        `https://vuetask-1ea6b-default-rtdb.europe-west1.firebasedatabase.app/customers/${userNumber}.json`,
        {
          method: "PUT",
          body: JSON.stringify(userData),
        }
      );
      this.users?.push(userData);
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
    async updateUser(data: UserData) {
      await fetch(
        `https://vuetask-1ea6b-default-rtdb.europe-west1.firebasedatabase.app/customers/${data.id}.json`,
        {
          method: "PATCH",
          body: JSON.stringify(data),
        }
      ).then(() => {
        this.getUsers();
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
      this.users = response;
    },
  },
});
