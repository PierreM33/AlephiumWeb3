import React, {useEffect, useState} from 'react';

const ContainerGame = ({ }) => {



    return (
        <div style={{ display: 'flex', justifyContent: "center", alignItems: "center", height: "100%" }}>
            <div style={{padding: 20, backgroundColor: "grey"}}>
                <div style={{ display: 'flex', flexDirection: 'column', width: "100%" }}>
                    <span>Montant: </span>
                    <input
                        type="number"
                        placeholder="Montant"
                        min={0}
                        max={10}
                        width={"20%"}
                        style={{marginTop: 10}}
                    />
                    <button style={{marginTop: 10}}>Mon bouton</button>
                </div>
            </div>
        </div>
    );

};

export default ContainerGame;

