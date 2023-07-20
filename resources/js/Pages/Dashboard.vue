<script setup>
import axios from 'axios';
import BreezeAuthenticatedLayout from '../Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { ref , watch} from 'vue';

const devises = ref([]);
const paires = ref([]);
const showModal = ref(false);
const deviceName = ref("");
const alertMsg = ref("");

const getDevices = async()=>{
   try {
    const {data} = await axios('/api/device')
    devises.value = data;
   } catch (error) {
    console.log(error)
   }
}

const getPaires = async()=>{
   try {
    const {data} = await axios('/api/paire')
    paires.value = data;
   } catch (error) {
    console.log(error)
   }
}
getPaires();

const addDevises = async()=>{
   try {
    const data = await axios.post('/api/device',{name: deviceName.value})
    console.log(data);
    deviceName.value="";
    showModal.value = false;
    getDevices();
   } catch (error) {
    console.log(error)
   }
}

const deleteDevises = async(id) =>{
    try {
        const {data} = await axios.delete('/api/device/'+ id);
        
        setTimeout(alertMsg.value = data.message, 3000);
        getDevices();
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
            <div class="modal absolute bg-white z-20 top-0 bottom-0 left-0 right-0 p-5 w-[35rem] border-sky-300 border" v-show="showModal">
                <form @submit.prevent="addDevises" class="flex flex-col mx-auto align-center justify-center">
                   
                    <input type="text" placeholder="add devise" class="form-input" v-model="deviceName" value="name" name="name">
                    <button type="submit" class="bg-green-800 text-white font-bold uppercase mx-auto w-[15em] p-2 mt-3 rounded-md">add</button>

                </form>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden flex align-middle justify-center gap-3 shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b w-[100%] max-w-2xl border-gray-500">
                            <div class="header flex">
                                <h1 class="capitalize font-semibold text-[1.2rem]">Listes des devises</h1>
                                <button @click="showModal = true" class="bg-green-800 text-white font-bold uppercase ml-auto w-[15em] p-2 rounded-md">add devises</button>
                            </div>
                        <hr>
                        <table class="table-auto  text-center mt-5 w-[100%]">
                            <thead class="border">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th colspan="3">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="devise in devises" :key="devise.id">
                                    <td>{{ devise.id }}</td>
                                    <td class="uppercase font-bold">{{ devise.name }}</td>
                                    <td>
                                        <button @click.prevent="deleteDevises(devise.id)" class="actionBtn bg-red-700 p-2 capitalize font-semibold text-white">delete</button>
                                        <button class="actionBtn bg-blue-400 p-2 ml-5 text-white">update</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="p-6 mt-12 bg-white border-b w-[100%] max-w-2xl border-gray-500">
                            <div class="header flex">
                                <h3 class="text-[1.2rem] font-semibold">Listes des paires</h3>
                                <button class="bg-green-800 text-white font-bold uppercase ml-auto w-[15em] p-2 rounded-md">add paires</button>
                            </div>
                        <hr>
                        <table class="table-auto mt-5 w-[100%] text-center">
                            <thead class="border">
                                <tr>
                                    <th>Id</th>
                                    <th>Devise 1</th>
                                    <th>Devise 2</th>
                                    <th>Taux</th>
                                    <th colspan="5">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="paire in paires.response" :key="paire.id">
                                    <td>{{ paire.id }}</td>
                                    <td class="uppercase font-bold">{{ paire.devise_1 }}</td>
                                    <td class="uppercase font-bold">{{ paire.devise_2 }}</td>
                                    <td class="uppercase font-bold">{{ paire.taux }}</td>
                                    <td><button class="actionBtn bg-red-700 p-2 capitalize font-semibold text-white">delete</button>
                                        <button class="actionBtn bg-blue-400 p-2 text-white ml-5">update</button></td>
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
    .actionBtn{
        width: 7rem;
        font-size: 14px;
        border-radius: 25px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>