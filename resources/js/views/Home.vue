<!-- resources/js/views/Home.vue -->

<template>
    <div class="h-fit grid grid-cols-10 bg-white">
        <div class="col-span-2 flex justify-between">
            <!--navbar | logo-->
            <div class="h-[50px] w-[50px]">
                <img src="/var/www/html/rocket-api-docs/resources/images/rocket_api_logo.png" alt="rocket_logo">
            </div>

            <!--navbar | arrow button-->
            <div class="h-[50px] w-[50px]">
                <Icon class="h-full w-full" icon="material-symbols-light:keyboard-double-arrow-right-rounded" />
            </div>
        </div>

        <!--navbar | search bar & directory-->
        <div class="col-span-8 bg-red-500/40 flex place-content-center">
            <div class="grid grid-cols-5 ">
                <div class="col-span-3 ">
                    <input type="text" placeholder="Search" class="w-full">
                </div>
                <div class="flex col-span-2 justify-around">
                    <p>Directory</p>
                    <p>Directory</p>
                    <p>Directory</p>
                    <p>Directory</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { Icon } from '@iconify/vue/dist/iconify.js';

export default {
    name: "Home",
    components: {
        Icon,
    }
};
</script>