import AxiosInstance from "./AxiosInstance";


export const getTechnologyUser = async (Logger, id, setLoading, refresh = false ) => {
    if (!refresh)
    {
        setLoading(true);
    }
    try {
        const result = await AxiosInstance(Logger).get('/api/technologyUser/' + id);
        setLoading(false);
        return result

    } catch (error) {
        console.error("Impossible de charger les technologies :", error);
        setLoading(false);
        return "Impossible de charger les technologies ";
    }
}

export const getTechnology = async (Logger, id, setLoading, refresh = false ) => {
    if (!refresh)
    {
        setLoading(true);
    }
    try {
        const result = await AxiosInstance(Logger).get('/api/technology/' + id);
        setLoading(false);
        return result

    } catch (error) {
        console.error("Impossible de charger les technologies :", error);
        setLoading(false);
        return "Impossible de charger les technologies ";
    }
}

export const updateTechnology = async (Logger, userId, technologyId, data, setLoading, refresh = false ) => {
    if (!refresh)
    {
        setLoading(true);
    }
    try {

        const body = {
            "costGold": 500,
            "costMetals": 120,
            "costEnergy": 200,
            "level": 1,
            "timeUpgrade": 3
        };

        const result = await AxiosInstance(Logger).put('/api/technologyUser/' + userId + "/" + technologyId, body);
        setLoading(false);
        return result;


    } catch (error) {
        console.error("Impossible de charger les technologies :", error);
        setLoading(false);
        return "Impossible de charger les technologies ";
    }
}

