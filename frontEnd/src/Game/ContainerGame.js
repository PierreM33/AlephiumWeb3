import React, {useEffect, useState} from 'react';

const ContainerAmount = ({  }) => {

    const [selected, setSelected] = useState("")
    const [random, setRandom] = useState("")
    const [locked, setLocked] = useState(false)
    const [count, setCount] = useState(3)
    const [resultGame, setResultGame] = useState(0)
    const [infosResult, setInfosResult] = useState([])
    const [resultDisplay, setResultDisplay] = useState("");

    useEffect(() => {
        const interval = setInterval(() => {
            if (locked) {
                if (count > 0) {
                    setCount(count - 1)
                }
            }
        }, 1000);
        return () => clearInterval(interval);
    }, [count, locked]);

    useEffect( () => {

        if (count === 0) {
            const resultRandom = randomPlayer()


            if (resultRandom === selected) { //egalité
                setResultGame(0)
            }
            if (resultRandom === "pierre" && selected === "feuille") { //gagné
                setResultGame(1)
            }
            if (resultRandom === "pierre" && selected === "ciseaux") { //perdu
                setResultGame(2)
            }
            if (resultRandom === "feuille" && selected === "ciseaux") { //gagné
                setResultGame(1)
            }
            if (resultRandom === "feuille" && selected === "pierre") { //perdu
                setResultGame(2)
            }
            if (resultRandom === "ciseaux" && selected === "pierre") { //gagné
                setResultGame(1)
            }
            if (resultRandom === "ciseaux" && selected === "feuille") { //perdu
                setResultGame(2)
            }

            setRandom(resultRandom)
            setLocked(false)
            setCount(3)
            setInfosResult([
                {valueYou: selected},
                {valueRandom: resultRandom},
            ])
            setRandom("")
            setSelected("")

        }

    }, [count])

    const randomPlayer = () => {
        const options = ['pierre', 'feuille', 'ciseaux'];
        return options[Math.floor(Math.random() * options.length)]
    }

    const select = (value) => {
        setSelected(value)
    }

    const valid = () => {
        setLocked(true)
    }

    useEffect(() => {
        const getResultGame = (state) => {
            switch (state) {
                case 0:
                    return "Egalité ! Vous avez joué " + infosResult[0].valueYou + " et votre adversaire " + infosResult[1].valueRandom + " aussi.";
                case 1:
                    return "Vous avez gagné, votre adversaire a joué " + infosResult[1].valueRandom + " et vous " + infosResult[0].valueYou + ".";
                case 2:
                    return "Vous avez perdu, votre adversaire a joué " + infosResult[1].valueRandom + " et vous " + infosResult[0].valueYou + ".";
                default:
                    return "En attente";
            }
        }

        if (infosResult.length === 2 && resultGame !== null) {
            const message = getResultGame(resultGame);
            setResultDisplay(message);
        }
    }, [infosResult, resultGame]);

    return (
        <div style={{ display: 'flex', justifyContent: "center", alignItems: "center", height: "100%" }}>
            <div style={{padding: 20, backgroundColor: "grey", border: "1px solid white"}}>
                <div style={{ display: 'flex', flexDirection: 'column', width: "100%" }}>
                    <span style={{margin: 50}}>Choisir</span>
                    {selected && <span style={{margin: 10}}>Vous avez choisit {selected}</span>}
                    <div style={{ display: "flex", flexDirection: "row", marginTop: 50}}>
                        <button style={{marginTop: 0}} onClick={ () => select("pierre")} disabled={locked} >Pierre</button>
                        <button style={{marginTop: 0}} onClick={ () => select("feuille")} disabled={locked} >Feuille</button>
                        <button style={{marginTop: 0}} onClick={ () => select("ciseaux")} disabled={locked} >Ciseaux</button>
                    </div>
                        <button style={{marginTop: 10}} onClick={valid} >Valider le choix</button>
                </div>
                <span style={{margin: 50}}>Début de partie dans : {locked ? count : "0"}</span>
                <span style={{margin: 50}}>Resultat: {resultDisplay ? resultDisplay : "Pas de résultat"}</span>
            </div>
        </div>
    );

};

export default ContainerAmount;

