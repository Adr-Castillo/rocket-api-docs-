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
            <div v-if="isOpen" class="flex flex-col col-span-2 gap-6">
                <button @click="is_selected = 'getting_started'" class="border-transparent hover:bg-gray-400/10 hover:border-gray-400/10 rounded-md px-2 py-2 text-sm text-left" :class="{'bg-purple-100 border-purple-400 text-purple-700': is_selected === 'getting_started'}">Getting Started</button>
                <div v-for="(items, category) in sidebar_categories" :key="category" class="flex flex-col gap-1" >
                    <p>{{ category }}</p>
                    <div v-for="item in items" :key="item.code">
                        <button @click="is_selected = item.code" class="border-transparent hover:bg-gray-400/10 hover:border-gray-400/10 rounded-md px-2 py-2 text-sm text-left" :class="{'bg-purple-100 border-purple-400 text-purple-700': is_selected === item.code}">
                            {{ item.name }}
                        </button>
                    </div>
                </div>
            </div>
            <!--navbar | content-->
            <div v-if="is_selected" class="col-span-8">
                <div v-for="section in sections[is_selected]" :key="section.type" class="grid gap-4">
                    <h1 v-if="section.type === 'header'" class="text-2xl font-semibold border-l-2 border-purple-700 pl-4">{{ section.value }}</h1>
                    <div v-if="section.type === 'text'" class="text-gray-500">{{ section.value }}</div>
                    <div v-if="section.type === 'code'" class="text-gray-500">{{ section.value }}</div>
                </div>
                
            </div>
        </div>
    </div>
                    <!-- <div class="text-2xl font-semibold border-l-2 border-purple-700 pl-4">Getting Started</div>
                <h1 class="text-xl font-semibold">Welcome to the <span class="text-red-500 font-medium">Rocket MGA</span> - API Partner Documentation</h1>
                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div> -->
</template>

<script>

import { Icon } from '@iconify/vue/dist/iconify.js';

export default {
    name: "Home",
    data() {
        console.log("Hi,", this.is_selected);
        return {
            isOpen: true,
            is_selected: "",

            sidebar_categories: {
                
                "Authentication": [
                    {
                        name: "Get Auth Token",
                        code: "g_auth_token",
                    },
                ],
                "Quotes": [
                    {
                        name: "Create Launch Lead",
                        code: "c_launch_lead",
                    },
                    {
                        name: "Get Lead Quotes",
                        code: "g_lead_quote",
                    },
                    {
                        name: "Webhooks",
                        code: "webhook",
                    },
                ]
            },

            sections: {
                g_auth_token: [
                    {
                        type: "header",
                        value: "Create Launch Lead",
                    },
                    {
                        type: "text",
                        value: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    }
                ],
                c_launch_lead: [
                    {
                        type: "header",
                        value: "Create Launch Lead",
                    },
                    {
                        type: "text",
                        value: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    },
                    {
                        type: "code",
                        value: '```json\n{\n    "name": "John Doe",\n    "email": "john.doe@example.com"\n}\n```',
                    },
                    {
                        type: "header",
                        value: "Create Launch Lead",
                    },
                ]
            }
        }
    },
    methods: {
        get_content_title(code) {
            const titles = {
                "getting_started": "Getting Started",
                "g_auth_token": "Get Auth Token",
                "c_launch_lead": "Create Launch Lead",
                "g_lead_quote": "Get Lead Quotes",
                "webhook": "Webhooks",
            }
            return titles[code];
        }
    },
    components: {
        Icon,
    }
};
</script>