<script setup>
import BreezeAuthenticatedLayout from '../Layouts/Authenticated.vue';

import { Head } from '@inertiajs/inertia-vue3';

import { ref , watchEffect} from 'vue';

import {getDevises , getPaires,addPaires, addDevises, deleteDevises, updateDevises,updatePaires, deletePaires} from "../admin/services.js"

const devises = ref([]);
const paires = ref([]);

const showModal = ref(false);
const showUpdateModal = ref(false);
const showPaireModal = ref(false);
const showPaireUpdateModal = ref(false);

const deviseName = ref("");
const devise_1 = ref("");
const devise_2 = ref("");
const taux = ref("");

const editData = {};
 

const addDevise =()=>{
    addDevises(deviseName, showModal)
    getDevises(devises); //actualisation de la liste de devise

}
const addPaire =()=>{
    addPaires(devise_1,devise_2, taux, showPaireModal)
    getPaires(paires);//actualisation de la liste des paires

}

const deletePaire =async(id)=>{
    const confirmation = confirm('Êtes-vous sûr de vouloir supprimer cette paire de devises ?');
    if(confirmation){
        await deletePaires(id);
        getPaires(paires);
        toast.fire({icon: "success", title: "paire removed successfully"});

    }else return ;
}
const deleteDevise =async (id)=>{
    const confirmation = confirm('Êtes-vous sûr de vouloir supprimer cette devise de devises ?');
    if(confirmation){
        await deleteDevises(id);
        getDevises(devises);
        toast.fire({icon: "success", title: "devise removed successfully"});

    }else return ;
}

const updateDevise = (id)=>{
    updateDevises(id, editData);
    showUpdateModal.value= false;

    editData.value = null;
    getDevises(devises);

}

const updatePaire = (id)=>{
    updatePaires(id, editData);
    showPaireUpdateModal.value= false;

    editData.value = null;
    getPaires(paires);
}



const updateDeviseModal =(devise)=>{
    showUpdateModal.value= true;
    editData.value = devise
}

const updatePaireModal =(paire)=>{
    showPaireUpdateModal.value= true;
    editData.value = paire
}



watchEffect(() => {
    getPaires(paires);
getDevises(devises);

},paires, devises);

</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>


        <div class="py-12 relative">
            <!--modal servant à l'ajout d'une devise-->
            <div class="modal" v-show="showModal">
                <button type="button" @click="showModal = false" class="font-bold ml-auto p-2 bg-red-500 rounded block cursor-pointer">X</button>

                <form @submit.prevent="addDevise" class="flex flex-col mx-auto align-center mt-4 justify-center">

                    <input type="text" placeholder="add devise" class="form-input" v-model="deviseName"  name="name">
                    <button type="submit"
                        class="bg-green-800 text-white font-bold uppercase mx-auto w-[15em] p-2 mt-3 rounded-md">add</button>

                </form>
            </div>
            <!--modal servant à l'ajout d'une paire-->
           
            <!--modal servant à l'ajout d'une paire-->
            <div class="modal" v-show="showPaireModal">
                <button type="button" @click="showPaireModal = false" class="font-bold ml-auto p-2 bg-red-500 rounded block cursor-pointer">X</button>
                <form @submit.prevent="addPaire" class="flex flex-col gap-4 mx-auto align-center justify-center">

                    <input type="text" max="3" placeholder="Devise 1" required class="form-input" v-model="devise_1" 
                        name="devise_1">
                        <input type="text" max="3" placeholder="Devise 2" required class="form-input" v-model="devise_2"
                        name="devise_2">
                        <input type="text" placeholder="Taux" required class="form-input" v-model="taux" name="taux">
                    <button type="submit"
                        class="bg-green-800 text-white font-bold uppercase mx-auto w-[15em] p-2 mt-3 rounded-md">add paire</button>

                </form>
            </div>
            <!--modal servant à l'ajout d'une paire-->
            
             
            <!--modal servant à la mise à jour d'une devise--> 
            <div class="modal" v-if="showUpdateModal">
                <button type="button" @click="showUpdateModal = false" class="font-bold ml-auto p-2 bg-red-500 rounded block cursor-pointer">X</button>

                <form @submit.prevent="updateDevise(editData.value.id)" class="flex flex-col mx-auto align-center mt-4 justify-center">

                    <input type="text" placeholder="devise" class="form-input" v-model="editData.name"  name="name">
                    <button type="submit"
                        class="bg-green-800 text-white font-bold uppercase mx-auto w-[15em] p-2 mt-3 rounded-md">update</button>

                </form>
            </div>
            <!--modal servant à la mise à jour d'une devise--> 

            <!--modal servant à la mise à jour d'une paire-->
            <div class="modal" v-if="showPaireUpdateModal">
                <button type="button" @click="showPaireUpdateModal = false" class="font-bold ml-auto p-2 bg-red-500 rounded block cursor-pointer">X</button>
                <form @submit.prevent="updatePaire(editData.value.id)" class="flex flex-col gap-4 mx-auto align-center justify-center">

                    <input type="text" max="3" placeholder="Devise 1" required class="form-input" v-model="editData.devise_1" 
                        name="devise_1">
                        <input type="text" max="3" placeholder="Devise 2" required class="form-input" v-model="editData.devise_2"
                        name="devise_2">
                        <input type="number" step="0.01" placeholder="Taux" required class="form-input" v-model="editData.taux" name="taux">
                    <button type="submit"
                        class="bg-green-800 text-white font-bold uppercase mx-auto w-[15em] p-2 mt-3 rounded-md">update</button>

                </form>
            </div>
            <!--modal servant à la mise à jour d'une paire-->
            

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
                                <tr v-for="devise in devises.response" :key="devise.id">
                             
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ devise.id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ devise.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-4">
                                            <button @click.prevent="deleteDevise(devise.id)"
                                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                                                delete
                                            </button>
                                            <button @click.prevent="updateDeviseModal(devise)"
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
                            <button @click="showPaireModal = true" class="bg-green-800 text-white font-bold uppercase ml-auto w-[15em] p-2 rounded-md">add
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
                                        Count
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
                                        {{ paire.conversionNumber }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-4">
                                            <button @click.prevent="deletePaire(paire.id)"
                                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                                                delete
                                            </button>
                                            <button @click="updatePaireModal(paire)"
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