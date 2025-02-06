<template>
    <div class="container mt-4">
      <h1 class="text-center mb-4">Employee Attendance Management</h1>
      <!-- Main Employee Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>Employee ID</th>
              <th>Name</th>
              <th>Attendance</th>
              <th>Leave Request</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="employee in attendanceAndLeave" :key="employee.employeeId">
              <td>{{ employee.employeeId }}</td>
              <td>{{ employee.name }}</td>
              <td>
                <!-- Attendance Table -->
                <div class="table-responsive">
                  <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light">
                      <tr>
                        <th>Date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="attendance in employee.attendance" :key="attendance.date">
                        <td>{{ attendance.date }}</td>
                        <td>{{ attendance.status }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
              <td>
                <!-- Leave Requests Table -->
                <div class="table-responsive">
                  <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light">
                      <tr>
                        <th>Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="leaveRequest in employee.leaveRequests" :key="leaveRequest.date">
                        <td>{{ leaveRequest.date }}</td>
                        <td>{{ leaveRequest.reason }}</td>
                        <td>
                          <span
                            :class="{
                              'text-success': leaveRequest.status === 'Approved',
                              'text-danger': leaveRequest.status === 'Denied',
                              'text-warning': leaveRequest.status === 'Pending'
                            }"
                          >
                            {{ leaveRequest.status }}
                          </span>
                        </td>
                        <td>
                          <button
                            class="btn btn-sm btn-success me-2"
                            @click="approveLeave(employee.employeeId, leaveRequest.date)"
                          >
                            Approve
                          </button>
                          <button
                            class="btn btn-sm btn-danger"
                            @click="denyLeave(employee.employeeId, leaveRequest.date)"
                          >
                            Deny
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
<script>
export default {
    data() {
        return {
           
    attendanceAndLeave: [
        {
            "employeeId": 1,
            "name": "Sibongile Nkosi",
            "attendance": [
                {
                    "date": "2024-11-25",
                    "status": "Present"
                },
                {
                    "date": "2024-11-26",
                    "status": "Absent"
                },
                {
                    "date": "2024-11-27",
                    "status": "Present"
                },
                {
                    "date": "2024-11-28",
                    "status": "Present"
                },
                {
                    "date": "2024-11-29",
                    "status": "Present"
                }
            ],
            "leaveRequests": [
                {
                    "date": "2024-11-22",
                    "reason": "Sick Leave",
                    "status": "Approved"
                },
                {
                    "date": "2024-12-01",
                    "reason": "Personal",
                    "status": "Pending"
                }
            ]
        },
        {
            "employeeId": 2,
            "name": "Lungile Moyo",
            "attendance": [
                {
                    "date": "2024-11-25",
                    "status": "Present"
                },
                {
                    "date": "2024-11-26",
                    "status": "Present"
                },
                {
                    "date": "2024-11-27",
                    "status": "Absent"
                },
                {
                    "date": "2024-11-28",
                    "status": "Present"
                },
                {
                    "date": "2024-11-29",
                    "status": "Present"
                }
            ],
            "leaveRequests": [
                {
                    "date": "2024-11-15",
                    "reason": "Family Responsibility",
                    "status": "Denied"
                },
                {
                    "date": "2024-12-02",
                    "reason": "Vacation",
                    "status": "Approved"
                }
            ]
        },
        {
            "employeeId": 3,
            "name": "Thabo Molefe",
            "attendance": [
                {
                    "date": "2024-11-25",
                    "status": "Present"
                },
                {
                    "date": "2024-11-26",
                    "status": "Present"
                },
                {
                    "date": "2024-11-27",
                    "status": "Present"
                },
                {
                    "date": "2024-11-28",
                    "status": "Absent"
                },
                {
                    "date": "2024-11-29",
                    "status": "Present"
                }
            ],
            "leaveRequests": [
                {
                    "date": "2024-11-10",
                    "reason": "Medical Appointment",
                    "status": "Approved"
                },
                {
                    "date": "2024-12-05",
                    "reason": "Personal",
                    "status": "Pending"
                }
            ]
        },
        {
            "employeeId": 4,
            "name": "Keshav Naidoo",
            "attendance": [
                {
                    "date": "2024-11-25",
                    "status": "Absent"
                },
                {
                    "date": "2024-11-26",
                    "status": "Present"
                },
                {
                    "date": "2024-11-27",
                    "status": "Present"
                },
                {
                    "date": "2024-11-28",
                    "status": "Present"
                },
                {
                    "date": "2024-11-29",
                    "status": "Present"
                }
            ],
            "leaveRequests": [
                {
                    "date": "2024-11-20",
                    "reason": "Bereavement",
                    "status": "Approved"
                }
            ]
        },
        {
            "employeeId": 5,
            "name": "Zanele Khumalo",
            "attendance": [
                {
                    "date": "2024-11-25",
                    "status": "Present"
                },
                {
                    "date": "2024-11-26",
                    "status": "Present"
                },
                {
                    "date": "2024-11-27",
                    "status": "Absent"
                },
                {
                    "date": "2024-11-28",
                    "status": "Present"
                },
                {
                    "date": "2024-11-29",
                    "status": "Present"
                }
            ],
            "leaveRequests": [
                {
                    "date": "2024-12-01",
                    "reason": "Childcare",
                    "status": "Pending"
                }
            ]
        },
        {
            "employeeId": 6,
            "name": "Sipho Zulu",
            "attendance": [
                {
                    "date": "2024-11-25",
                    "status": "Present"
                },
                {
                    "date": "2024-11-26",
                    "status": "Present"
                },
                {
                    "date": "2024-11-27",
                    "status": "Absent"
                },
                {
                    "date": "2024-11-28",
                    "status": "Present"
                },
                {
                    "date": "2024-11-29",
                    "status": "Present"
                }
            ],
            "leaveRequests": [
                {
                    "date": "2024-11-18",
                    "reason": "Sick Leave",
                    "status": "Approved"
                }
            ]
        },
        {
            "employeeId": 7,
            "name": "Naledi Moeketsi",
            "attendance": [
                {
                    "date": "2024-11-25",
                    "status": "Present"
                },
                {
                    "date": "2024-11-26",
                    "status": "Present"
                },
                {
                    "date": "2024-11-27",
                    "status": "Present"
                },
                {
                    "date": "2024-11-28",
                    "status": "Absent"
                },
                {
                    "date": "2024-11-29",
                    "status": "Present"
                }
            ],
            "leaveRequests": [
                {
                    "date": "2024-11-22",
                    "reason": "Vacation",
                    "status": "Pending"
                }
            ]
        },
        {
            "employeeId": 8,
            "name": "Farai Gumbo",
            "attendance": [
                {
                    "date": "2024-11-25",
                    "status": "Present"
                },
                {
                    "date": "2024-11-26",
                    "status": "Absent"
                },
                {
                    "date": "2024-11-27",
                    "status": "Present"
                },
                {
                    "date": "2024-11-28",
                    "status": "Present"
                },
                {
                    "date": "2024-11-29",
                    "status": "Present"
                }
            ],
            "leaveRequests": [
                {
                    "date": "2024-12-02",
                    "reason": "Medical Appointment",
                    "status": "Approved"
                }
            ]
        },
        {
            "employeeId": 9,
            "name": "Karabo Dlamini",
            "attendance": [
                {
                    "date": "2024-11-25",
                    "status": "Present"
                },
                {
                    "date": "2024-11-26",
                    "status": "Present"
                },
                {
                    "date": "2024-11-27",
                    "status": "Present"
                },
                {
                    "date": "2024-11-28",
                    "status": "Absent"
                },
                {
                    "date": "2024-11-29",
                    "status": "Present"
                }
            ],
            "leaveRequests": [
                {
                    "date": "2024-11-19",
                    "reason": "Childcare",
                    "status": "Denied"
                }
            ]
        },
        {
            "employeeId": 10,
            "name": "Fatima Patel",
            "attendance": [
                {
                    "date": "2024-11-25",
                    "status": "Present"
                },
                {
                    "date": "2024-11-26",
                    "status": "Present"
                },
                {
                    "date": "2024-11-27",
                    "status": "Absent"
                },
                {
                    "date": "2024-11-28",
                    "status": "Present"
                },
                {
                    "date": "2024-11-29",
                    "status": "Present"
                }
            ],
            "leaveRequests": [
                {
                    "date": "2024-12-03",
                    "reason": "Vacation",
                    "status": "Pending"
                }
            ]
        }
    ]
}
        },
        methods: {
    approveLeave(employeeId, date) {
      const employee = this.attendanceAndLeave.find((e) => e.employeeId === employeeId);
      const leaveRequest = employee.leaveRequests.find((l) => l.date === date);
      if (leaveRequest) {
        leaveRequest.status = "Approved";
      }
    },
    denyLeave(employeeId, date) {
      const employee = this.attendanceAndLeave.find((e) => e.employeeId === employeeId);
      const leaveRequest = employee.leaveRequests.find((l) => l.date === date);
      if (leaveRequest) {
        leaveRequest.status = "Denied";
      }
    }
  }
    }
</script>

<style>
/* Additional Media Queries for Custom Responsiveness */
@media (max-width: 768px) {
  h1 {
    font-size: 1.5rem;
  }
  .table {
    font-size: 0.875rem;
  }
  .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
  }
}
</style>
