import React, {useEffect, useState} from 'react';

const ContainerAmount = ({ setStartGame }) => {

    const [amount, setAmount] = useState(0);
    const [validAmount, setValidAmount] = useState(false);

    const sendAmount = () => {
        if (amount > 0) {
            setValidAmount(true);
            setStartGame(true);
        }
    }

    const reset = () => {
        setAmount(0)
        setValidAmount(false)
    }

    return (
        <div style={{ display: 'flex', justifyContent: "center", alignItems: "center", height: "100%" }}>
            <div style={{padding: 20, backgroundColor: "grey", border: "1px solid white"}}>
                <div style={{ display: 'flex', flexDirection: 'column', width: "100%" }}>
                    <span style={{margin: 50}}>Montant Validé: {validAmount ? amount : "en cours"}</span>
                    <input
                        type="number"
                        placeholder="Montant"
                        min={0}
                        max={10}
                        width={"20%"}
                        style={{marginTop: 10}}
                        onChange={(e) => setAmount(e.target.value)}
                        value={amount}
                    />
                    <button style={{marginTop: 10}} onClick={sendAmount} disabled={validAmount} >Valider la mise</button>
                    <button style={{marginTop: 10}} onClick={reset}  >Reset</button>
                </div>
            </div>
        </div>
    );

};

export default ContainerAmount;

