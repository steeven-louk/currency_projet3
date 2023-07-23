import axios from "axios";

const addDevises = async (deviseName, showModal) => {
    try {
        const data = await axios.post('/api/devise', { name: deviseName.value })
        console.log(data);
        deviseName.value = "";
        showModal.value = false;
        console.log(deviseName)
        console.log(data)
        // getDevises();
    } catch (error) {
        console.log(error)
    }
}

const addPaires = async (devise_1,devise_2, taux, showPaireModal) => {
    try {
        const data = await axios.post('/api/paire', { devise_1: devise_1.value, devise_2: devise_2.value,taux: taux.value})
        console.log('data',data);
        taux.value = "";
        devise_1.value = "";
        devise_2.value = "";
        showPaireModal.value = false;
        // getPaires();
    } catch (error) {
        console.log(error)
    }
}


const getDevises = async (devises) => {
    try {
        const { data } = await axios('/api/devise')
        devises.value = data;
    } catch (error) {
        console.log(error)
    }
}

const getPaires = async (paires) => {
    try {
        const { data } = await axios('/api/paire')
        paires.value = data;
    } catch (error) {
        console.log(error)
    }
}

const deleteDevises = async (id) => {
    try {
      await axios.delete('/api/devise/' + id);

        getDevises();

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

const deletePaires = async (id, paires) => {
    try {
        const { data } = await axios.delete('/api/paire/' + id);

        // setTimeout(alertMsg.value = data.message, 3000);
        getPaires(paires);
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

export  {addDevises, getDevises, getPaires,addPaires, deleteDevises, deletePaires, updatePaires, updateDevises};