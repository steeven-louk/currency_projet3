<script setup>
import axios from 'axios';
import BreezeAuthenticatedLayout from '../Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { ref , watch} from 'vue';

const devices = ref([]);
const getDevices = async()=>{
   try {
    const {data} = await axios('/api/device')
    devices.value = data;
   } catch (error) {
    console.log(error)
   }
}

watch(() => {
    getDevices();
});

</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="  overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                            <div class="header flex">
                                <h3>Listes des devises</h3>
                                <button class="bg-green-800 text-white font-bold uppercase ml-auto w-[15em] p-2 rounded-md">add devises</button>
                            </div>
                        <hr>
                        <table class="table-auto w-[35em] text-center">
                            <thead class="border">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th colspan="5">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="device in devices" :key="device.id">
                                    <td>{{ device.id }}</td>
                                    <td class="uppercase font-bold">{{ device.name }}</td>
                                    <td><button class="bg-red-700 p-2 capitalize font-semibold text-white">delete</button>
                                        <button class="bg-blue-400 p-2 text-white">update</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="p-6 mt-12 bg-white border-b border-gray-200">
                            <div class="header flex">
                                <h3>Listes des paires</h3>
                                <button class="bg-green-800 text-white font-bold uppercase ml-auto w-[15em] p-2 rounded-md">add paires</button>
                            </div>
                        <hr>
                        <table class="table-auto w-[35em] text-center">
                            <thead class="border">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th colspan="5">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="device in devices" :key="device.id">
                                    <td>{{ device.id }}</td>
                                    <td class="uppercase font-bold">{{ device.name }}</td>
                                    <td><button class="bg-red-700 p-2 capitalize font-semibold text-white">delete</button>
                                        <button class="bg-blue-400 p-2 text-white">update</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
