import {
  a as h,
  c as M,
  b as D,
  u as V,
  d as k,
  o as N,
  e as c,
  f as i,
  F as S,
  r as j,
  g as B,
  t as U,
  h as x,
  i as _,
  j as s,
  w as f,
  v as $,
  k as P,
  l as L,
  m as g,
  n as w,
  p as m,
  q as E,
  s as O,
  x as R,
  y as b,
  z as T,
  A as q,
} from "./vendor.b30c4864.js";
const z = function () {
  const e = document.createElement("link").relList;
  if (e && e.supports && e.supports("modulepreload")) return;
  for (const o of document.querySelectorAll('link[rel="modulepreload"]')) r(o);
  new MutationObserver((o) => {
    for (const t of o)
      if (t.type === "childList")
        for (const u of t.addedNodes)
          u.tagName === "LINK" && u.rel === "modulepreload" && r(u);
  }).observe(document, { childList: !0, subtree: !0 });
  function a(o) {
    const t = {};
    return (
      o.integrity && (t.integrity = o.integrity),
      o.referrerpolicy && (t.referrerPolicy = o.referrerpolicy),
      o.crossorigin === "use-credentials"
        ? (t.credentials = "include")
        : o.crossorigin === "anonymous"
        ? (t.credentials = "omit")
        : (t.credentials = "same-origin"),
      t
    );
  }
  function r(o) {
    if (o.ep) return;
    o.ep = !0;
    const t = a(o);
    fetch(o.href, t);
  }
};
z();
const G = (n) => new Promise((e) => setTimeout(e, n));
var H = {
    state: { songs: [], loading: !1 },
    getters: {
      songNames(n) {
        return n.songs.map((e) => e.name);
      },
    },
    mutations: {
      set(n, e) {
        n.songs = e;
      },
      setLoading(n, e) {
        n.loading = e;
      },
    },
    actions: {
      async get({ commit: n }) {
        n("setLoading", !0),
          await h
            .get("http://localhost:8000/api/songs")
            .then((e) => n("set", e.data))
            .catch((e) => console.log(e)),
          G(1e3),
          n("setLoading", !1);
      },
    },
  },
  I = M({
    namespaced: !0,
    plugins: [D],
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: { Songs: H },
  });
const K = { class: "grid grid-cols-1 gap-1 px-3 py-2 mt-3" },
  W = {
    setup(n) {
      const e = V();
      let a = k(() => e.state.Songs.songs);
      return (
        k(() => e.getters.songNames),
        N(() => {
          e.dispatch("get");
        }),
        (r, o) => (
          c(),
          i("div", K, [
            (c(!0),
            i(
              S,
              null,
              j(
                B(a),
                (t) => (
                  c(),
                  i(
                    "div",
                    { class: "w-full h-[35px] px-2 bg-teal-500", key: t.id },
                    U(t.id) + ". " + U(t.name),
                    1
                  )
                )
              ),
              128
            )),
          ])
        )
      );
    },
  },
  J = {
    setup(n) {
      return (e, a) => (c(), x(W));
    },
  };
var v = (n, e) => {
  const a = n.__vccOpts || n;
  for (const [r, o] of e) a[r] = o;
  return a;
};
const Q = { name: "Recent.vue" };
function X(n, e, a, r, o, t) {
  return null;
}
var Y = v(Q, [["render", X]]);
const Z = { name: "Favourite.vue" };
function ee(n, e, a, r, o, t) {
  return null;
}
var te = v(Z, [["render", ee]]);
const se = { name: "Playlist.vue" };
function oe(n, e, a, r, o, t) {
  return null;
}
var ne = v(se, [["render", oe]]);
const ae = { name: "About" },
  re = { class: "text-center" };
function le(n, e, a, r, o, t) {
  return c(), i("h1", re, "About Page");
}
var ce = v(ae, [["render", le]]);
const ie = { class: "flex justify-center mt-2" },
  de = ["onSubmit"],
  ue = s(
    "h3",
    { class: "text-center dark:text-gray-100 font-bold text-lg text-blue-600" },
    "Upload Song",
    -1
  ),
  pe = { class: "w-[90%] mx-auto grid grid-cols-1" },
  _e = { class: "grid grid-cols-2 gap-2 px-1" },
  ge = s("option", { value: "Pop", selected: "" }, "Pop", -1),
  me = s("option", { value: "Classic", selected: "" }, "Classic", -1),
  he = [ge, me],
  fe = s("option", { value: "Myanmar", selected: "" }, "Myanmar", -1),
  ve = s("option", { value: "English" }, "English", -1),
  ye = [fe, ve],
  be = s(
    "button",
    { type: "submit", class: "btn-blue my-4 rounded w-1/3" },
    "Upload",
    -1
  ),
  xe = {
    setup(n) {
      const e = _(""),
        a = _(""),
        r = _(""),
        o = _("Pop"),
        t = _("Myanmar"),
        u = _({ name: e, singer: a, composer: r, type: o, language: t });
      async function C() {
        await h
          .post("http://localhost:8000/api/post-song", u.value)
          .then((p) => console.log(p.data))
          .catch((p) => console.log(p)),
          await F(),
          (e.value = a.value = r.value = ""),
          (o.value = "Pop"),
          (t.value = "Myanmar");
      }
      const y = _(null);
      function A(p) {
        (y.value = p.target.files), console.log(y.value);
      }
      function F() {
        const p = new FormData();
        for (let l = 0; l < y.value.length; l++) {
          let d = y.value[l];
          p.append("files[" + l + "]", d);
        }
        h.post("http://localhost:8000/save", p, {
          header: { "Content-Type": "multipart/form-data" },
        })
          .then((l) => console.log(l.data))
          .catch((l) => console.log(l));
      }
      return (p, l) => (
        c(),
        i("div", ie, [
          s(
            "form",
            { onSubmit: L(C, ["prevent"]), class: "text-center" },
            [
              ue,
              s("div", pe, [
                s("div", null, [
                  f(
                    s(
                      "input",
                      {
                        "onUpdate:modelValue":
                          l[0] || (l[0] = (d) => (e.value = d)),
                        type: "text",
                        class: "rounded-lg mt-3",
                        placeholder: "Song name",
                      },
                      null,
                      512
                    ),
                    [[$, e.value]]
                  ),
                ]),
                s("div", _e, [
                  f(
                    s(
                      "input",
                      {
                        "onUpdate:modelValue":
                          l[1] || (l[1] = (d) => (a.value = d)),
                        type: "text",
                        class: "rounded-lg mt-3",
                        placeholder: "Singer",
                      },
                      null,
                      512
                    ),
                    [[$, a.value]]
                  ),
                  f(
                    s(
                      "input",
                      {
                        "onUpdate:modelValue":
                          l[2] || (l[2] = (d) => (r.value = d)),
                        type: "text",
                        class: "rounded-lg mt-3",
                        placeholder: "Composer",
                      },
                      null,
                      512
                    ),
                    [[$, r.value]]
                  ),
                  f(
                    s(
                      "select",
                      {
                        "onUpdate:modelValue":
                          l[3] || (l[3] = (d) => (o.value = d)),
                        name: "",
                        id: "song-type",
                        class: "rounded-lg mt-3",
                      },
                      he,
                      512
                    ),
                    [[P, o.value]]
                  ),
                  f(
                    s(
                      "select",
                      {
                        "onUpdate:modelValue":
                          l[4] || (l[4] = (d) => (t.value = d)),
                        name: "",
                        id: "song-language",
                        class: "rounded-lg mt-3",
                      },
                      ye,
                      512
                    ),
                    [[P, t.value]]
                  ),
                ]),
                s("div", null, [
                  s(
                    "input",
                    {
                      onChange: A,
                      type: "file",
                      name: "file",
                      accept: "*/*",
                      class: "file-input mt-3 w-full",
                      multiple: "",
                    },
                    null,
                    32
                  ),
                ]),
              ]),
              be,
            ],
            40,
            de
          ),
        ])
      );
    },
  },
  $e = {
    setup(n) {
      return (e, a) => (c(), x(xe));
    },
  },
  we = { name: "AddPost" },
  ke = { class: "text-center" };
function Se(n, e, a, r, o, t) {
  return c(), i("h1", ke, "Add User");
}
var Ue = v(we, [["render", Se]]);
const Pe = { class: "mx-auto mt-12 flex justify-center items-center" },
  Le = ["onSubmit"],
  Ce = s("button", { type: "submit", class: "btn-blue ml-3" }, "Upload", -1),
  Ae = {
    setup(n) {
      const e = _(null);
      function a(o) {
        (e.value = o.target.files), console.log(e.value);
      }
      function r() {
        const o = new FormData();
        for (let t = 0; t < e.value.length; t++) {
          let u = e.value[t];
          o.append("files[" + t + "]", u);
        }
        h.post("http://localhost:8000/save", o, {
          header: { "Content-Type": "multipart/form-data" },
        })
          .then((t) => console.log(t.data))
          .catch((t) => console.log(t));
      }
      return (o, t) => (
        c(),
        i("div", Pe, [
          s(
            "form",
            { onSubmit: L(r, ["prevent"]), class: "h-screen mx-auto" },
            [
              s(
                "input",
                {
                  onChange: a,
                  type: "file",
                  name: "file",
                  accept: "*/*",
                  class: "file-input",
                  multiple: "",
                },
                null,
                32
              ),
              Ce,
            ],
            40,
            Le
          ),
        ])
      );
    },
  },
  Fe = s("h1", { class: "text-center" }, "File Upload", -1),
  Me = {
    setup(n) {
      return (e, a) => (c(), i(S, null, [Fe, g(Ae)], 64));
    },
  },
  De = {
    class:
      "my-3 grid grid-cols-[minmax(min-content,1fr)] px-3 row-auto gap-y-6",
  },
  Ve = s(
    "div",
    {
      class:
        "grid grid-cols-[minmax(min-content,1fr)_minmax(min-content,1fr)] gap-x-2",
    },
    [
      s(
        "div",
        {
          class:
            "bg-amber-400 hover:bg-amber-600 text-center ring-2 py-2 ring-amber-600 rounded-lg shadow-lg shadow-amber-500",
        },
        "Users"
      ),
      s(
        "div",
        {
          class:
            "bg-amber-400 hover:bg-amber-600 text-center ring-2 py-2 ring-amber-600 rounded-lg shadow-lg shadow-amber-500",
        },
        "Viewers"
      ),
    ],
    -1
  ),
  Ne = {
    class:
      "grid grid-cols-[minmax(min-content,1fr)_minmax(min-content,1fr)] gap-4 gap-y-6 ring-2 p-2 py-5",
  },
  je = s(
    "div",
    {
      class:
        "px-2 py-1 bg-fuchsia-400 hover:bg-fuchsia-600 rounded-lg ring-2 ring-fuchsia-600 shadow-lg shadow-fuchsia-400",
    },
    "Post Songs",
    -1
  ),
  Be = s(
    "div",
    {
      class:
        "px-2 py-1 bg-fuchsia-400 hover:bg-fuchsia-600 rounded-lg ring-2 ring-fuchsia-600 shadow-lg shadow-fuchsia-400",
    },
    "Graphs",
    -1
  ),
  Ee = s(
    "div",
    {
      class:
        "px-2 py-1 bg-fuchsia-400 hover:bg-fuchsia-600 rounded-lg ring-2 ring-fuchsia-600 shadow-lg shadow-fuchsia-400",
    },
    "Edit Songs",
    -1
  ),
  Oe = s(
    "div",
    {
      class:
        "px-2 py-1 bg-fuchsia-400 hover:bg-fuchsia-600 rounded-lg ring-2 ring-fuchsia-600 shadow-lg shadow-fuchsia-400",
    },
    "Delete Songs",
    -1
  ),
  Re = {
    setup(n) {
      return (e, a) => {
        const r = w("router-link");
        return (
          c(),
          i("div", De, [
            Ve,
            s("div", Ne, [
              g(r, { to: "/dashboard/post" }, { default: m(() => [je]), _: 1 }),
              Be,
              Ee,
              Oe,
            ]),
          ])
        );
      };
    },
  },
  Te = {
    setup(n) {
      return (e, a) => (c(), x(Re));
    },
  },
  qe = [
    { path: "/", name: "Music Lab", component: J },
    { path: "/recent", name: "Recent", component: Y },
    { path: "/favourites", name: "Favourite", component: te },
    { path: "/playlists", name: "Playlist", component: ne },
    { path: "/dashboard", name: "Dashboard", component: Te },
    { path: "/dashboard/post", name: "Post", component: $e },
    { path: "/add-user", name: "AddUser", component: Ue },
    { path: "/file-upload", name: "FileUpload", component: Me },
    { path: "/about", name: "About", component: ce },
  ],
  ze = E({ history: O(), routes: qe });
const Ge = {
    class:
      "bg-gradient-to-br from-sky-200 to-emerald-300 dark:bg-gradient-to-br dark:from-gray-700 dark:to-gray-500",
  },
  He = { class: "container mx-auto min-h-screen" },
  Ie = { class: "grid grid-cols-1 gap-3" },
  Ke = { class: "mt-2 flex justify-between items-center px-3" },
  We = b("Music Lab"),
  Je = { class: "flex gap-12 justify-between items-center" },
  Qe = {
    class:
      "hover:transform hover:-translate-x-[.1rem] transition-all duration-100 text-white ring-1 bg-sky-900 rounded-full px-2 text-[12px]",
  },
  Xe = s("span", { class: "hover:text-amber-500" }, "DB", -1),
  Ye = { key: 0 },
  Ze = { key: 1 },
  et = s(
    "div",
    {
      class:
        "w-full h-[0.08rem] my-0 dark:bg-sky-500 bg-gray-600 rounded shadow-lg shadow-sky-700",
    },
    null,
    -1
  ),
  tt = { class: "flex justify-around items-center" },
  st = b("Recent"),
  ot = b("Favourites"),
  nt = b("PlayLists"),
  at = {
    setup(n) {
      const e = _(!1),
        a = () => (e.value = !e.value);
      return (r, o) => {
        const t = w("router-link"),
          u = w("router-view");
        return (
          c(),
          i(
            "div",
            { class: R({ dark: e.value }) },
            [
              s("div", Ge, [
                s("div", He, [
                  s("div", Ie, [
                    s("div", Ke, [
                      g(
                        t,
                        { class: "font-bold dark:text-gray-100", to: "/" },
                        { default: m(() => [We]), _: 1 }
                      ),
                      s("div", Je, [
                        s("div", Qe, [
                          g(
                            t,
                            { to: "/dashboard" },
                            { default: m(() => [Xe]), _: 1 }
                          ),
                        ]),
                        s(
                          "div",
                          {
                            class: "dark:text-gray-100 font-bold btn-sm-blue",
                            onClick: a,
                          },
                          [
                            e.value
                              ? (c(), i("span", Ze, "light"))
                              : (c(), i("span", Ye, "dark")),
                          ]
                        ),
                      ]),
                    ]),
                    et,
                    s("div", tt, [
                      g(
                        t,
                        {
                          class: "font-bold dark:text-gray-100",
                          to: "/recent",
                        },
                        { default: m(() => [st]), _: 1 }
                      ),
                      g(
                        t,
                        {
                          class: "font-bold dark:text-gray-100",
                          to: "/favourites",
                        },
                        { default: m(() => [ot]), _: 1 }
                      ),
                      g(
                        t,
                        {
                          class: "font-bold dark:text-gray-100",
                          to: "/playlists",
                        },
                        { default: m(() => [nt]), _: 1 }
                      ),
                    ]),
                  ]),
                  g(u),
                ]),
              ]),
            ],
            2
          )
        );
      };
    },
  };
T(at).use(q, h).use(I).use(ze).mount("#app");
