export interface Customer {
  id: string;
  name: string;
  employeeId: string;
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
