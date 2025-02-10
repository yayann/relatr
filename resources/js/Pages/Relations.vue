<script setup>
import {Head, Link} from '@inertiajs/vue3';

import NetworkGraph from "@/Components/NetworkGraph.vue";

const props = defineProps({
    allProviders: Array,
    allConsumers: Array,
    providers: Array,
})
</script>

<template>
    <div>
        <Head title="Welcome to Relatr"/>
        <div class="bg-gray-50 text-black/50 ">
            <div
                class="relative flex min-h-screen flex-col items-center justify-center  selection:bg-[#FF2D20] selection:text-white"
            >
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <main class="grid grid-cols-5">
                        <div class="col-span-4">
                            <NetworkGraph :data="providers"/>
                        </div>
                        <div>
                            <div v-for="consumer in allConsumers" :key="consumer.id" class="text-xs">
                                <div>{{ consumer.name }}</div>
                            </div>
                        </div>
                    </main>

                    <footer
                        class="py-16 text-center text-sm text-black dark:text-white/70"
                    >
                    </footer>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
