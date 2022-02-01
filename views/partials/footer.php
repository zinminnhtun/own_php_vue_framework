</div>
<script>
    let dark = document.getElementsByTagName("html");
    dark = Array.from(dark);
    dark = dark[0];
    console.log(dark);


    function dMode() {
        dark.classList.toggle("dark");

        let isDark = document.querySelector(".dark");

        isDark === null ? isDark = 0 : isDark = 1;
        localStorage.setItem('isDark', isDark);
    }

    //onload
    let localIsDark = localStorage.getItem('isDark');

    if (Number(localIsDark)) {
        dMode();
    }

    //let a = <?php //print_r(json_encode($users,JSON_UNESCAPED_UNICODE)); ?>//;
    //    console.log(a);
axios({
    method: 'get',
    url : "/api/all"
}).then(res=>console.log(res)).catch(err=>console.log(err));


    new Vue({
        el: "#app",
        data: {
            userData  : "",
            message: 'how are you? Sleep now',
            ismore: false,
            nav_focus1: false,
            nav_focus2: false,
            nav_focus3: false,
            nav_focus4: false,
            nav_focus5: false,
            DMode: null,
        },
        methods: {
            more() {
                this.ismore = !this.ismore;
            },
            navFocus(x) {
                if (x == 1) {
                    this.nav_focus1 = true;
                    localStorage.setItem("nav_active", "nav_focus1");
                    this.nav_focus2 = false;
                    this.nav_focus3 = false;
                    this.nav_focus4 = false;
                    this.nav_focus5 = false;
                } else if (x == 2) {
                    this.nav_focus2 = true;
                    localStorage.setItem("nav_active", "nav_focus2");
                    this.nav_focus1 = false;
                    this.nav_focus3 = false;
                    this.nav_focus4 = false;
                    this.nav_focus5 = false;
                } else if (x == 3) {
                    this.nav_focus3 = true;
                    localStorage.setItem("nav_active", "nav_focus3");
                    this.nav_focus1 = false;
                    this.nav_focus2 = false;
                    this.nav_focus4 = false;
                    this.nav_focus5 = false;
                } else if (x == 4) {
                    this.nav_focus4 = true;
                    localStorage.setItem("nav_active", "nav_focus4");
                    this.nav_focus1 = false;
                    this.nav_focus2 = false;
                    this.nav_focus3 = false;
                    this.nav_focus5 = false;
                } else if (x == 5) {
                    this.nav_focus5 = true;
                    localStorage.setItem("nav_active", "nav_focus5");
                    this.nav_focus1 = false;
                    this.nav_focus2 = false;
                    this.nav_focus3 = false;
                    this.nav_focus4 = false;
                }

            },
            isDark() {
                let isDark = localStorage.getItem('isDark');
                isDark = Number(isDark);
                isDark ? this.DMode = true : this.DMode = false;
            }
        },
        mounted() {

            let x = localStorage.getItem("nav_active");
            if (x == 'nav_focus1') {
                this.nav_focus1 = true;
            } else if (x == 'nav_focus2') {
                this.nav_focus2 = true;
            } else if (x == 'nav_focus3') {
                this.nav_focus3 = true;
            } else if (x == 'nav_focus4') {
                this.nav_focus4 = true;
            } else if (x == 'nav_focus5') {
                this.nav_focus5 = true;
            }
            this.isDark();

        }
    });


</script>

</body>
</html>