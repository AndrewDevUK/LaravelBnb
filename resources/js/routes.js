import { createRouter ,createWebHistory } from "vue-router";
import Bookables from "./bookables/Bookables.vue";
import Bookable from "./bookable/Bookable.vue";

const routes = [
    {
        path: "/",
        component: Bookables,
        name: "home",
    },
    {
        path: "/bookable/:id",
        component: Bookable,
        name: "bookable",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes, //short for `routes: routes`,
});

export default router;
