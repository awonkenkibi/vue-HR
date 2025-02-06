<template>
  <div class="container mt-4">
    <!-- Search bar -->
    <form class="d-flex flex-column flex-md-row align-items-center" role="search" @submit.prevent="searchEmployee">
      <input
        v-model="searchQuery"
        class="form-control mb-2 mb-md-0 me-md-2"
        type="search"
        placeholder="Search for Employee..."
        aria-label="Search"
      />
      <button class="btn btn-dark" type="submit">Search</button>
    </form>
  </div>
  <br>

  <!-- Employee Table -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-dark">
        <tr>
          <th>Employee ID</th>
          <th>Name</th>
          <th>Position</th>
          <th>Department</th>
          <th>Salary (in Rands)</th>
          <th>Employment History</th>
          <th>Contact</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(employee, index) in filteredEmployees" :key="employee.employeeId">
          <td>{{ employee.employeeId }}</td>
          <td>{{ employee.name }}</td>
          <td>{{ employee.position }}</td>
          <td>{{ employee.department }}</td>
          <td>{{ employee.salary }}</td>
          <td>{{ employee.employmentHistory }}</td>
          <td>{{ employee.contact }}</td>
          <td>
            <button class="btn btn-warning btn-sm me-1" @click="editEmployee(index)">Edit</button>
            <button class="btn btn-danger btn-sm" @click="deleteEmployee(index)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <br>

  <!-- Add/Edit Employee Form -->
  <div class="container">
    <h4 class="mb-3">Add and Edit Employee</h4>
    <form @submit.prevent="addEmployee">
      <div class="row g-3">
        <div class="col-12 col-md-4">
          <label for="employeeId" class="form-label">Employee ID</label>
          <input v-model="newEmployee.employeeId" type="number" class="form-control" placeholder="ID" required />
        </div>
        <div class="col-12 col-md-4">
          <label for="name" class="form-label">Name</label>
          <input v-model="newEmployee.name" type="text" class="form-control" placeholder="Name" required />
        </div>
        <div class="col-12 col-md-4">
          <label for="position" class="form-label">Position</label>
          <input v-model="newEmployee.position" type="text" class="form-control" placeholder="Position" required />
        </div>
        <div class="col-12 col-md-4">
          <label for="department" class="form-label">Department</label>
          <input v-model="newEmployee.department" type="text" class="form-control" placeholder="Department" required />
        </div>
        <div class="col-12 col-md-4">
          <label for="salary" class="form-label">Salary</label>
          <input v-model="newEmployee.salary" type="number" class="form-control" placeholder="Salary" required />
        </div>
        <div class="col-12 col-md-4">
          <label for="employmentHistory" class="form-label">Employment History</label>
          <input
            v-model="newEmployee.employmentHistory"
            type="text"
            class="form-control"
            placeholder="History"
            required
          />
        </div>
        <div class="col-12 col-md-6">
          <label for="contact" class="form-label">Contact</label>
          <input v-model="newEmployee.contact" type="text" class="form-control" placeholder="Contact" required />
        </div>
      </div>
      <button type="submit" class="btn btn-dark mt-3">Add Employee</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      searchQuery: "",
      Employees:  [
        {
            "employeeId": 1,
            "name": "Sibongile Nkosi",
            "position": "Software Engineer",
            "department": "Development",
            "salary": 70000,
            "employmentHistory": "Joined in 2015, promoted to Senior in 2018",
            "contact": "sibongile.nkosi@moderntech.com"
        },
        {
            "employeeId": 2,
            "name": "Lungile Moyo",
            "position": "HR Manager",
            "department": "HR",
            "salary": 80000,
            "employmentHistory": "Joined in 2013, promoted to Manager in 2017",
            "contact": "lungile.moyo@moderntech.com"
        },
        {
            "employeeId": 3,
            "name": "Thabo Molefe",
            "position": "Quality Analyst",
            "department": "QA",
            "salary": 55000,
            "employmentHistory": "Joined in 2018",
            "contact": "thabo.molefe@moderntech.com"
        },
        {
            "employeeId": 4,
            "name": "Keshav Naidoo",
            "position": "Sales Representative",
            "department": "Sales",
            "salary": 60000,
            "employmentHistory": "Joined in 2020",
            "contact": "keshav.naidoo@moderntech.com"
        },
        {
            "employeeId": 5,
            "name": "Zanele Khumalo",
            "position": "Marketing Specialist",
            "department": "Marketing",
            "salary": 58000,
            "employmentHistory": "Joined in 2019",
            "contact": "zanele.khumalo@moderntech.com"
        },
        {
            "employeeId": 6,
            "name": "Sipho Zulu",
            "position": "UI/UX Designer",
            "department": "Design",
            "salary": 65000,
            "employmentHistory": "Joined in 2016",
            "contact": "sipho.zulu@moderntech.com"
        },
        {
            "employeeId": 7,
            "name": "Naledi Moeketsi",
            "position": "DevOps Engineer",
            "department": "IT",
            "salary": 72000,
            "employmentHistory": "Joined in 2017",
            "contact": "naledi.moeketsi@moderntech.com"
        },
        {
            "employeeId": 8,
            "name": "Farai Gumbo",
            "position": "Content Strategist",
            "department": "Marketing",
            "salary": 56000,
            "employmentHistory": "Joined in 2021",
            "contact": "farai.gumbo@moderntech.com"
        },
        {
            "employeeId": 9,
            "name": "Karabo Dlamini",
            "position": "Accountant",
            "department": "Finance",
            "salary": 62000,
            "employmentHistory": "Joined in 2018",
            "contact": "karabo.dlamini@moderntech.com"
        },
        {
            "employeeId": 10,
            "name": "Fatima Patel",
            "position": "Customer Support Lead",
            "department": "Support",
            "salary": 58000,
            "employmentHistory": "Joined in 2016",
            "contact": "fatima.patel@moderntech.com"
        }
    ],
      newEmployee: {
        employeeId: "",
        name: "",
        position: "",
        department: "",
        salary: "",
        employmentHistory: "",
        contact: "",
      },
    };
  },
  computed: {
    filteredEmployees() {
      return this.Employees.filter((emp) =>
        Object.values(emp).some((val) =>
          val.toString().toLowerCase().includes(this.searchQuery.toLowerCase())
        )
      );
    },
  },
  methods: {
    addEmployee() {
      this.Employees.push({ ...this.newEmployee });
      this.resetForm();
    },
    editEmployee(index) {
      this.newEmployee = { ...this.Employees[index] };
      this.Employees.splice(index, 1);
    },
    deleteEmployee(index) {
      this.Employees.splice(index, 1);
    },
    resetForm() {
      this.newEmployee = {
        employeeId: "",
        name: "",
        position: "",
        department: "",
        salary: "",
        employmentHistory: "",
        contact: "",
      };
    },
    searchEmployee() {
      console.log("Searching for:", this.searchQuery);
    },
  },
};
</script>

<style scoped>
.table {
  background-color: #fff;
  border-radius: 8px;
}
.btn {
  border-radius: 4px;
}
.btn:hover {
  opacity: 0.9;
}
.form-label {
  font-weight: bold;
}
@media (max-width: 768px) {
  .table-responsive {
    overflow-x: auto;
  }
  form {
    flex-direction: column;
  }
}
</style>