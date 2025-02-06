import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
// import EmployeesView from '@/components/EmployeesComp.vue'
import PayrollView from '@/views/PayrollView.vue'
import LeaveRequestView from '@/views/LeaveRequestView.vue'
import AttendanceView from '@/views/AttendanceView.vue'
import LogInView from '@/views/LogInView.vue'
// import LoginView from '@/components/LoginComp.vue'


const routes = [
  {
    path: '/home',
    name: 'home',
    component: HomeView
  },
  // {
  //   path: '/employees',
  //   name: 'employees',
  //   component: EmployeesView
  // },
  {
    path: '/payroll',
    name: 'payroll',
    component: PayrollView
  },
  {
    path: '/leaveRequest',
    name: 'leaveRequest',
    component: LeaveRequestView
  },
  {
    path: '/login',
    name: 'login',
    component: LogInView
  },
  {
    path: '/attendance',
    name: 'attendance',
    component: AttendanceView
  },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
