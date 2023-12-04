import Login from './componets/login/Login.vue'
import Dashboard from './componets/employeesList/Employees.vue'
import AdminPage from './componets/adminPage/AdminPage.vue'
import Inbox from './componets/inbox/Inbox.vue'
const routes = [
    {
        path: "/",
        name: "login",
        component: Login,
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
    },
    {
        path: "/admin",
        name: "admin",
        component: AdminPage,
    },
    {
        path: "/inbox",
        name: "inbox",
        component: Inbox,
    }
];

export default routes;
