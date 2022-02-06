import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import About from "../views/About.vue";
import Post from "../views/Post.vue";
import AddUser from "../views/AddUser.vue";
import FileUpload from "../views/FileUpload.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
    {
        path: "/post",
        name: "Post",
        component: Post,
    },
    {
        path: "/add-user",
        name: "AddUser",
        component: AddUser,
    },
    {
        path: "/file-upload",
        name: "FileUpload",
        component: FileUpload,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;