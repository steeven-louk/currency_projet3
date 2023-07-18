<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Login from './Auth/Login.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head title="Home" />
 
    <main >
         <Login />
    </main>
    
</template>

<style scoped>
    .main {
        background-color: darkblue;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

</style>
