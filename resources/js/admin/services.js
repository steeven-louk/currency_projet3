import axios from "axios";

//fonction permettant d'ajouter une devise
const addDevises = async (deviseName, showModal) => {
    try {
        const data = await axios.post('/api/devise', { name: deviseName.value })
        deviseName.value = "";
        showModal.value = false;

    } catch (error) {
        console.log(error)
    }
}

//fonction permettant d'ajouter une paire
const addPaires = async (devise_1,devise_2, taux, showPaireModal) => {
    try {
        const data = await axios.post('/api/paire', { devise_1: devise_1.value, devise_2: devise_2.value,taux: taux.value})
        console.log('data',data);
        devise_1.value = "";
        devise_2.value = "";
        taux.value = "";
        showPaireModal.value = false;
    } catch (error) {
        console.log(error)
    }
}


//fonction permettant de recuperer la liste des devise
const getDevises = async (devises) => {
    try {
        const { data } = await axios('/api/devise')
        devises.value = data;
    } catch (error) {
        console.log(error)
    }
}

//fonction permettant de recuperer la liste des paires
const getPaires = async (paires) => {
    try {
        const { data } = await axios('/api/paire')
        paires.value = data;
    } catch (error) {
        console.log(error)
    }
}

//fonction permettant de supprimer une devise
const deleteDevises = async (id) => {
    try {
      await axios.delete('/api/devise/' + id);

        getDevises();

    } catch (error) {
        console.log(error);
    }
}

//fonction permettant de modifier une devises
const updateDevises = async (id) => {
    try {
        const { data } = await axios.put('/api/paire/' + id);
    } catch (error) {
        console.log(error);
    }
}

//fonction permettant de supprimer une paires
const deletePaires = async (id, paires) => {
    try {
        const { data } = await axios.delete('/api/paire/' + id);

        getPaires(paires);
    } catch (error) {
        console.log(error);
    }
}

//fonction permettant de modifier une paires
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