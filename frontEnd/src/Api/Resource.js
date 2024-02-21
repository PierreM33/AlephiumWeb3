import AxiosInstance from "./AxiosInstance";


export const getResource = async (Logger, id, setLoading, refresh = false ) => {
    if (!refresh)
    {
        setLoading(true);
    }
    console.log("JE RENTRE DANS LE GET RESOURCE AVANT LE TRY")
    try {
        const result = await AxiosInstance(Logger).get('/api/resource/' + id);
        console.log("RESULT GET RESSOURCES ===", result)
        setLoading(false);
        return result

    } catch (error) {
        console.error("Impossible de charger les ressources :", error);
        setLoading(false);
        return "Impossible de charger les ressources ";
    }


}

export const addResource = async (Logger, id, resources, setLoading, refresh = false ) => {
    if (!refresh)
    {
        setLoading(true);
    }
    try {
        const data =
            {
                metals: resources.metals,
                gold: resources.gold,
                orinia: resources.orinia,
                orinium: resources.orinium,
                energy: resources.energy,
            }
        const result = await AxiosInstance(Logger).put('/api/updateResource/' + id, data);
        console.log("RESULT ADD RESSOURCES ===", result)
        setLoading(false);
        return result

    } catch (error) {
        console.error("IMPOSSIBLE D'AJOUTER DES RESSOURCES :", error);
        setLoading(false);
        return "IMPOSSIBLE D'AJOUTER DES RESSOURCES";
    }
}

