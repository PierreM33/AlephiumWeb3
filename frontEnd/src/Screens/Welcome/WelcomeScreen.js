import React, {useEffect, useState} from 'react';
import Navigation from "../../Navigation/Navigation";
import {connect} from "react-redux";
import ContainerAmount from "../../Game/ContainerAmount";
import ContainerGame from "../../Game/ContainerGame";

const WelcomeScreen = ({ dispatch }) => {

    const [startGame, setStartGame] = useState(false);

    const onPress = (state) => {
    }

    return (
        <section className="containerWelcomeScreen">
            <headerNavigation className="headerWelcomeScreen">
                <Navigation
                    onPress={ (state) => onPress(state)}
                />
            </headerNavigation>

            <div style={{display: "flex", flexDirection: "row", height: "100%", justifyContent: "space-around", alignItems: "center"}}>
                <ContainerAmount setStartGame={ (state) => {setStartGame(state)}} />
                {startGame && <ContainerGame />}
            </div>
        </section>
    );
};


const mapStateToProps = (state) => {
    return {
        Logger: state.Logger,
    }
}
const mapDispatchToProps = (dispatch) => {
    return {
        dispatch: (action) => { dispatch(action) }
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(WelcomeScreen);
