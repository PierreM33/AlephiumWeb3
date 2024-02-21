import AxiosInstance from "./AxiosInstance";


export const getPopulationPlanet = async (Logger, id, setLoading, refresh = false ) => {
    if (!refresh)
    {
        setLoading(true);
    }
    try {
        const result = await AxiosInstance(Logger).get('/api/population/' + id);
        setLoading(false);
        return result

    } catch (error) {
        console.error("Impossible de charger la population :", error);
        setLoading(false);
        return "Impossible de charger la population ";
    }
}
