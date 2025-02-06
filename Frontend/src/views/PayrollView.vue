<template>
  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container mt-5">
      <h2 class="text-center">Payroll Management</h2>
      <br>
      <!-- Payroll Table -->
      <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
          <tr>
            <th>Employee ID</th>
            <th>Hours Worked</th>
            <th>Overtime Hours</th>
            <th>Leave Deductions</th>
            <th>Incentives (R)</th>
            <th>Tax Rate (%)</th>
            <th>Monthly Salary (R)</th>
            <th>Annual Salary (R)</th>
            <th>PaySlip</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(payroll, index) in payrolls" :key="payroll.employeeId">
            <td>{{ payroll.employeeId }}</td>
            <td>{{ payroll.hoursWorked }}</td>
            <td>{{ payroll.overtimeHours }}</td>
            <td>{{ payroll.leaveDeductions }}</td>
            <td>R {{ payroll.incentives }}</td>
            <td>{{ payroll.taxRate }}%</td>
            <td>R {{ payroll.finalSalary }}</td>
            <td>R {{ payroll.annualSalary }}</td>
            <td>
              <button class="btn btn-dark" @click="generatePayslip(index)">
                Display Payslip
              </button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Payslip Modal -->
      <div
        class="modal fade"
        id="payslipModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="payslipModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content text-center">
            <div class="modal-header bg-dark text-white">
              <h5 class="modal-title" id="payslipModalLabel">Employee Payslip</h5>
              <button
                type="button"
                class="close"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Payslip Details -->
              <div class="payslip">
                <h4 class="text-center mb-4">ModernTech Company</h4>
                <p>
                  <strong>Employee ID:</strong> {{ selectedPayslip?.employeeId }}
                </p>
                <p>
                  <strong>Hours Worked:</strong> {{ selectedPayslip?.hoursWorked
                  }} hrs
                </p>
                <hr />
                <!-- Earnings Section -->
                <h5>Earnings</h5>
                <p>
                  <strong>Base Salary:</strong> R {{ selectedPayslip?.baseSalary
                  }}
                </p>
                <p>
                  <strong>Overtime ({{ selectedPayslip?.overtimeHours }} hrs):</strong>
                  R {{ selectedPayslip?.overtimePay }}
                </p>
                <p>
                  <strong>Incentives:</strong> R {{ selectedPayslip?.incentives }}
                </p>
                <hr />
                <!-- Deductions Section -->
                <h5>Deductions</h5>
                <p>
                  <strong>Leave Deductions:</strong> R
                  {{ selectedPayslip?.leaveDeductionsAmount }}
                </p>
                <p>
                  <strong>Tax ({{ selectedPayslip?.taxRate }}%):</strong> R
                  {{ selectedPayslip?.taxAmount }}
                </p>
                <hr />
                <!-- Final Salary -->
                <h4 class="text-end">
                  <strong>Net Salary:</strong> R {{ selectedPayslip?.netSalary }}
                </h4>
                <h4 class="text-end">
                  <strong>Annual Salary:</strong> R
                  {{ selectedPayslip?.annualSalary }}
                </h4>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-dark"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button
                type="button"
                class="btn btn-dark"
                data-bs-dismiss="modal"
              >
                Email payslip
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      payrolls: [
    {
        "employeeId": 1,
        "hoursWorked": 160,
        "overtimeHours": 10,
        "leaveDeductions": 8,
        "baseSalary": 70000,
        "incentives": 2000,
        "taxRate": 10,
        "finalSalary": 69500
    },
    {
        "employeeId": 2,
        "hoursWorked": 150,
        "overtimeHours": 5,
        "leaveDeductions": 10,
        "baseSalary": 75000,
        "incentives": 1500,
        "taxRate": 12,
        "finalSalary": 79000
    },
    {
        "employeeId": 3,
        "hoursWorked": 170,
        "overtimeHours": 8,
        "leaveDeductions": 4,
        "baseSalary": 60000,
        "incentives": 1800,
        "taxRate": 11,
        "finalSalary": 54800
    },
    {
        "employeeId": 4,
        "hoursWorked": 165,
        "overtimeHours": 7,
        "leaveDeductions": 6,
        "baseSalary": 62000,
        "incentives": 1600,
        "taxRate": 10,
        "finalSalary": 59700
    },
    {
        "employeeId": 5,
        "hoursWorked": 158,
        "overtimeHours": 9,
        "leaveDeductions": 5,
        "baseSalary": 61000,
        "incentives": 1500,
        "taxRate": 12,
        "finalSalary": 57850
    },
    {
        "employeeId": 6,
        "hoursWorked": 168,
        "overtimeHours": 12,
        "leaveDeductions": 2,
        "baseSalary": 64000,
        "incentives": 1700,
        "taxRate": 10,
        "finalSalary": 64800
    },
    {
        "employeeId": 7,
        "hoursWorked": 175,
        "overtimeHours": 15,
        "leaveDeductions": 3,
        "baseSalary": 67000,
        "incentives": 2000,
        "taxRate": 11,
        "finalSalary": 71800
    },
    {
        "employeeId": 8,
        "hoursWorked": 160,
        "overtimeHours": 6,
        "leaveDeductions": 0,
        "baseSalary": 55000,
        "incentives": 1500,
        "taxRate": 12,
        "finalSalary": 56000
    },
    {
        "employeeId": 9,
        "hoursWorked": 155,
        "overtimeHours": 5,
        "leaveDeductions": 5,
        "baseSalary": 58000,
        "incentives": 1600,
        "taxRate": 11,
        "finalSalary": 61500
    },
    {
        "employeeId": 10,
        "hoursWorked": 162,
        "overtimeHours": 9,
        "leaveDeductions": 4,
        "baseSalary": 59000,
        "incentives": 1500,
        "taxRate": 10,
        "finalSalary": 57750
    },
     // Add all the other payroll objects here
     ].map((payroll) => {
        // Calculate annual salary for each employee
        const leaveDeductionsAmount = payroll.leaveDeductions * 100; // Assume 100R per leave day
        const overtimePay = payroll.overtimeHours * 150; // Assume 150R per overtime hour
        const grossSalary = payroll.baseSalary + overtimePay + payroll.incentives;
        const taxAmount = (payroll.taxRate / 100) * grossSalary;
        const netSalary = grossSalary - leaveDeductionsAmount - taxAmount;
        return {
          ...payroll,
          annualSalary: netSalary * 12, // Calculate annual salary
        };
      }),
      selectedPayslip: null,
    };
  },
  methods: {
    generatePayslip(index) {
      const payroll = this.payrolls[index];
      
      // Calculate all details dynamically
      const leaveDeductionsAmount = payroll.leaveDeductions * 100; // Assume 100R per leave day
      const overtimePay = payroll.overtimeHours * 150; // Assume 150R per overtime hour
      const grossSalary = payroll.baseSalary + overtimePay + payroll.incentives;
      const taxAmount = (payroll.taxRate / 100) * grossSalary;
      const netSalary = grossSalary - leaveDeductionsAmount - taxAmount;
      const annualSalary = netSalary*12;
      this.selectedPayslip = {
        ...payroll,
        leaveDeductionsAmount,
        overtimePay,
        taxAmount,
        netSalary,
        annualSalary,
      };

      // Shows the pay slip of 
      const modal = new bootstrap.Modal(document.getElementById("payslipModal"));
      modal.show();
    },
  },
};
</script>
<style>
.container {
  max-width: 1000px;
}

.payslip {
  font-size: 1rem;
  line-height: 1.8;
}

.payslip h5, h4 {
  margin-top: 10px;
}
</style>
