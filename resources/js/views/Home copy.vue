<!-- resources/js/views/Home.vue -->

<template>
    <!--Navbar and Sidebar-->
    <div class="flex flex-col bg-white h-full py-6 pl-6 pr-20">
        <!--Navbar-->
        <div class="grid grid-cols-10 gap-16">
            <!--navbar | logo & arrow button-->
            <div v-if="isOpen" class="col-span-2 flex justify-between">
                <!--navbar | logo-->
                <button class="h-[42px] w-[42px]">
                    <img src="../../images/rocket_api_logo.png" alt="rocket_logo">
                </button>
                <!--navbar | arrowOpen-->
                <button @click="isOpen = false">
                    <Icon class=" h-[28px] w-fit text-gray-500" icon="material-symbols-light:keyboard-double-arrow-left-rounded" />
                </button>
            </div>
            <div v-else class="flex">
                <!--navbar | arrowClosed-->
                <button @click="isOpen = true">
                    <Icon class="h-[28px] w-fit text-gray-500" icon="material-symbols-light:keyboard-double-arrow-right-rounded" />
                </button>
            </div>

            <!--navbar | search bar & directory-->
            <div class="flex items-center col-span-8">
                <!--navbar | search bar-->
                <button class="basis-1/3 flex w-full h-full text-gray-500 justify-between border rounded-md border-black/10 p-3">
                    <div class="flex items-center  gap-2">
                        <Icon class="h-[28px] w-fit" icon="material-symbols-light:search"/>
                        <p class="text-sm ">Search or ask...</p>
                    </div>
                    <div class="text-xl text-gray-500 place-content-end">/</div> <!--I couldn't get the / to be on the right side of the search bar while keeping all the search icons in the same button div-->
                </button>
                <!--navbar | directory-->
                <div class="basis-2/3 flex items-center gap-6 justify-end text-sm ">
                    <button class="hover:text-gray-500">API Explorer</button>
                    <button class="hover:text-gray-500">Postman Collection</button>
                    <button class="hover:text-gray-500">Rocket MGA | Agent Portal</button>
                    <span class="text-gray-500/30 text-2xl">|</span>
                    <button class="h-fit w-fit text-gray-500 hover:text-gray-800 rounded-full border-2 border-gray-500 p-1"><Icon class="h-[20px] w-fit " icon="ph:sun-light" /> <!--Add a better icon, and add transition from day/night--></button>
                </div>
            </div>
        </div>
        <!--navbar | sidebar & content-->
        <div class="grid grid-cols-10 gap-16 mt-8">
            <!--navbar | sidebar-->
            <div v-if="isOpen" class="col-span-2 flex flex-col gap-4">
                <button v-for="category in categories" @click="selected = category" class="border-transparent hover:bg-gray-400/10 hover:border-gray-400/10 rounded-md px-2 py-2 text-sm text-left" :class="selected === category ? 'bg-purple-100 border border-purple-400 text-purple-700' : ''">{{ category }}</button>
                <p class="no-edit-cursor text-sm text-left font-bold text-gray-800">Authentication</p> 
                <button @click="is_selected = 'g_auth_token'" class="border-transparent hover:bg-gray-400/10 hover:border-gray-400/10 rounded-md px-2 py-2 text-sm text-left ">Get Auth Token</button> 
                <p class="no-edit-cursor text-sm text-left font-bold text-gray-800">Quotes</p>  
                <button @click="is_selected = 'c_launch_lead'" class="border-transparent hover:bg-gray-400/10 hover:border-gray-400/10 rounded-md px-2 py-2 text-sm text-left ">Create Launch Lead</button> 
                <button @click="is_selected = 'g_lead_quote'" class="border-transparent hover:bg-gray-400/10 hover:border-gray-400/10 rounded-md px-2 py-2 text-sm text-left ">Get Lead Quotes</button> 
                <button @click="is_selected = 'webhook'" class="border-transparent hover:bg-gray-400/10 hover:border-gray-400/10 rounded-md px-2 py-2 text-sm text-left ">Webhooks</button>
            </div>
            <!--navbar | content-->
            <div v-if="selected" class="col-span-8">
                <h1 class="text-2xl font-semibold border-l-2 border-purple-700 pl-4">Getting Started {{ selected }}</h1>
            </div>
            <!-- <div v-if="is_selected === 'g_auth_token'" class="col-span-8">
                <h1 class="text-2xl font-semibold border-l-2 border-purple-700 pl-4">Getting Started {{ is_selected }}</h1>
            </div>
            <div v-if="is_selected === 'c_launch_lead'" class="col-span-8">
                <h1 class="text-2xl font-semibold border-l-2 border-purple-700 pl-4">Getting Started {{ is_selected }}</h1>
            </div>
            <div v-if="is_selected === 'g_lead_quote'" class="col-span-8">
                <h1 class="text-2xl font-semibold border-l-2 border-purple-700 pl-4">Getting Started {{ is_selected }}</h1>
            </div>
            <div v-if="is_selected === 'webhook'" class="col-span-8">
                <h1 class="text-2xl font-semibold border-l-2 border-purple-700 pl-4">Getting Started {{ is_selected }}</h1>
            </div> -->
        </div>
    </div>
</template>

<script>

import { Icon } from '@iconify/vue/dist/iconify.js';

export default {
    name: "Home",
    data() {
        return {
            isOpen: true,
            selected: false,

            categories: {
                getting_started: false,
                g_auth_token: false,
                c_launch_lead: false,
                g_lead_quote: false,
                webhook: false,
            }
        }
    },
    components: {
        Icon,
    }
};
</script>