
<div class="flex justify-between items-center gap-2 w-[96%] mx-auto">
    <nav class="grow-[96] flex justify-around items-center flex-no-wrap mb-3 mt-2 bg-gray-300 text-white shadow-lg rounded border-b-[1px] border-b-gray-900">
        <a @click="navFocus(1)" :class="['menu-item',{'border-b-gray-900 bg-gray-500/70 border-l-[#898F9BFF] border-r-[#898F9BFF] text-white':nav_focus1}]" href="/">
            <i class="feather-home"></i>
        </a>
        <a @click="navFocus(2)" :class="['menu-item',{'border-b-gray-900 bg-gray-500/70 border-l-[#898F9BFF] border-r-[#898F9BFF] text-white':nav_focus2}]" href="/about">
            <i class="feather-info"></i>
        </a>
        <a @click="navFocus(3)" :class="['menu-item',{'border-b-gray-900 bg-gray-500/70 border-l-[#898F9BFF] border-r-[#898F9BFF] text-white':nav_focus3}]" href="/contact">
            <i class="feather-message-square"></i>
        </a>
        <a @click="navFocus(4)" :class="['menu-item',{'border-b-gray-900 bg-gray-500/70 border-l-[#898F9BFF] border-r-[#898F9BFF] text-white':nav_focus4}]" href="/orders">
            <i class="feather-phone-outgoing"></i>
        </a>
        <a @click="navFocus(5)" :class="['menu-item',{'border-b-gray-900 bg-gray-500/70 border-l-[#898F9BFF] border-r-[#898F9BFF] text-white':nav_focus5}]" href="/customers">
            <i class="feather-user "></i>
        </a>
    </nav>
    <div :class="['text-[35px] grow-[4] py-[3px] mb-[3px] rounded-xl border-[2px] border-gray-800 dark:border-gray-100 hover:bg-gray-500/30 flex justify-center items-center w-[4%] relative',{'ring-2':ismore}]" @click="more"><i class="feather-more-vertical dark:text-white"></i>
        <ul :class="['absolute top-[2.7rem] right-[0rem] w-[10vw] bg-gray-300 dark:bg-gray-700 text-lg rounded-lg px-3 py-2',{'hidden' : !ismore}]">
            <li>
                <button onclick="dMode()" class="text-gray-800 text-[35px]">
                    <img src="../../resources/svg/night-mode-svgrepo-com.svg" alt="" class="w-[35px] h-[35px]">
                </button>
            </li>
            <li>Profile</li>
        </ul>

    </div>
</div>

