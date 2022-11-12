import Bookables from "./bookables/Bookables.vue";
import ExampleComponent2 from "./components/ExampleComponent2.vue";
import { createRouter ,createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: Bookables,
        name: "home",
    },
    {
        path: "/contact",
        component: ExampleComponent2,
        name: "contact",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes, //short for `routes: routes`,
});

export default router;
