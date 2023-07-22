<script setup>
import axios from 'axios';
import BreezeAuthenticatedLayout from '../Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { ref, watch } from 'vue';

const devises = ref([]);
const paires = ref([]);
const showModal = ref(false);
const deviceName = ref("");
const alertMsg = ref("");

const getDevices = async () => {
    try {
        const { data } = await axios('/api/device')
        devises.value = data;
    } catch (error) {
        console.log(error)
    }
}

const getPaires = async () => {
    try {
        const { data } = await axios('/api/paire')
        paires.value = data;
    } catch (error) {
        console.log(error)
    }
}
getPaires();

const addDevises = async () => {
    try {
        const data = await axios.post('/api/device', { name: deviceName.value })
        console.log(data);
        deviceName.value = "";
        showModal.value = false;
        getDevices();
    } catch (error) {
        console.log(error)
    }
}

const deleteDevises = async (id) => {
    try {
        const { data } = await axios.delete('/api/device/' + id);

        setTimeout(alertMsg.value = data.message, 3000);
        getDevices();

    } catch (error) {
        console.log(error);
    }
}


const updateDevises = async (id) => {
    try {
        const { data } = await axios.put('/api/paire/' + id);

        setTimeout(alertMsg.value = data.message, 3000);
        getPaires();
        console.log(data);
    } catch (error) {
        console.log(error);
    }
}

const deletePaires = async (id) => {
    try {
        const { data } = await axios.delete('/api/paire/' + id);

        setTimeout(alertMsg.value = data.message, 3000);
        getPaires();
        console.log(data);
    } catch (error) {
        console.log(error);
    }
}

const updatePaires = async (id) => {
    try {
        const { data } = await axios.put('/api/paire/' + id);

        setTimeout(alertMsg.value = data.message, 3000);
        getPaires();
        console.log(data);
    } catch (error) {
        console.log(error);
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

        <div class="py-12 relative">
            <div class="modal" v-show="showModal">
                <span @click="showModal = false" class="font-bold ml-auto p-2 text-white  block cursor-pointer">X</span>
                <form @submit.prevent="addDevises" class="flex flex-col mx-auto align-center mt-4 justify-center">

                    <input type="text" placeholder="add devise" class="form-input" v-model="deviceName" value="name"
                        name="name">
                    <button type="submit"
                        class="bg-green-800 text-white font-bold uppercase mx-auto w-[15em] p-2 mt-3 rounded-md">add</button>

                </form>
            </div>

            <div class="modal" v-show="showModal">
                <button type="button" @click="showModal = false" class="font-bold ml-auto p-2 bg-red-500 rounded block cursor-pointer">X</button>
                <form @submit.prevent="addDevises" class="flex flex-col gap-4 mx-auto align-center justify-center">

                    <input type="text" placeholder="Devise 1" required class="form-input" v-model="deviceName" value="devise 1"
                        name="devise_1">
                        <input type="text" placeholder="Devise 2" required class="form-input" v-model="deviceName" value="devise 2"
                        name="devise_2">
                        <input type="number" max="3" placeholder="Taux" required class="form-input" v-model="deviceName" value="taux"
                        name="taux">
                    <button type="submit"
                        class="bg-green-800 text-white font-bold uppercase mx-auto w-[15em] p-2 mt-3 rounded-md">add paire</button>

                </form>
            </div>


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden flex flex-wrap align-middle justify-center gap-3 shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white  border-b w-[100%] max-w-[29em] border-gray-500">
                        <div class="header mb-5 flex">
                            <h1 class="capitalize font-semibold text-[1.2rem]">Listes des devises</h1>
                            <button @click="showModal = true"
                                class="bg-green-800 text-white font-bold uppercase ml-auto w-[12em] p-2 rounded-md">add
                                devises</button>
                        </div>
                        <hr>

                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Id
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="devise in devises" :key="devise.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ devise.id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ devise.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-4">
                                            <button @click.prevent="deleteDevises(devise.id)"
                                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                                                delete
                                            </button>
                                            <button @click= "updateDevises(devise.id)"
                                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                                                update
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-6 mt-12   bg-white border-b w-[100%] max-w-2xl border-gray-500">
                        <div class="header flex mb-5">
                            <h3 class="text-[1.2rem] font-semibold">Listes des paires</h3>
                            <button class="bg-green-800 text-white font-bold uppercase ml-auto w-[15em] p-2 rounded-md">add
                                paires</button>
                        </div>
                        <hr>

                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Id
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Devise 1
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Devise 2
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Taux
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="paire in paires.response" :key="paire.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ paire.id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ paire.devise_1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ paire.devise_2 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ paire.taux }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-4">
                                            <button @click.prevent="deletePaires(paire.id)"
                                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                                                delete
                                            </button>
                                            <button @click="updatePaires(paire.id)"
                                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                                                update
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<style scoped>
.modal {
    position: absolute;
    border: 2px solid #ccc;
    border-radius: 20px;
    z-index: 25;
    width: fit-content;
    background: #eee;
    padding: 15px;
    left: 0;
    right: 0;
    margin: auto;
    overflow: hidden;
}

.modal input {
    border-radius: 20px;
    text-transform: uppercase;
}

.modal input::placeholder {
    text-transform: capitalize;
}

</style>