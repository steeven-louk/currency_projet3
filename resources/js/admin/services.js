import axios from "axios";

const addDevises = async (deviceName, showModal) => {
    try {
        const data = await axios.post('/api/device', { name: deviceName.value })
        console.log(data);
        deviceName.value = "";
        showModal.value = false;
        getDevises();
    } catch (error) {
        console.log(error)
    }
}


const getDevises = async (devises) => {
    try {
        const { data } = await axios('/api/device')
        devises.value = data;
        console.log(data)
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
        const { data } = await axios.delete('/api/device/' + id);

        setTimeout(alertMsg.value = data.message, 3000);
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

export  {addDevises, getDevises, getPaires, deleteDevises, deletePaires, updatePaires, updateDevises};