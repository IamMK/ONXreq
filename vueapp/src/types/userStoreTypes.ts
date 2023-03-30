export interface Customer {
  id: string;
  name: string;
  employee: string;
  car: {
    make: string;
    model: string;
    year: number;
    color: string;
  };
  purchases: {
    id: string;
    name: string;
    price: number;
  }[];
}

export interface UserData {
  id?: string;
  name: string;
  car: {
    color: string;
    make: string;
    model: string;
    year: number;
  };
  employee?: string;
}
