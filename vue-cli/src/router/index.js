import { createWebHistory, createRouter } from "vue-router";
import MusicLab from "../views/MusicLab.vue";
import Recent from "../views/Recent.vue";
import Favourite from "../views/Favourite.vue";
import Playlist from "../views/Playlist.vue";
import About from "../views/About.vue";
import Post from "../views/Post.vue";
import AddUser from "../views/AddUser.vue";
import FileUpload from "../views/FileUpload.vue"
import Dashboard from  "../views/Dashboard.vue";

const routes = [
    {
        path: "/",
        name: "Music Lab",
        component: MusicLab,
    },
    {
        path: "/recent",
        name: "Recent",
        component: Recent,
    },
    {
        path: "/favourites",
        name: "Favourite",
        component: Favourite,
    },
    {
        path: "/playlists",
        name: "Playlist",
        component: Playlist,
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
    },
    {
        path: "/dashboard/post",
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
    {
        path: "/about",
        name: "About",
        component: About,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;