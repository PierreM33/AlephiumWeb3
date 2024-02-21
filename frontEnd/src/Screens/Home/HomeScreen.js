import React, {useEffect, useState} from 'react';
import { connect } from 'react-redux';
import { logout } from '../../Redux/actions/authActions';
import BlockBody from "../../Components/Body/BlockBody";

const HomeScreen = ({ dispatch, Logger, children  }) => {


    const handleLogout = () => { //PEUT RENVOYER SUR L'ACCUEIL MAIS PAS NECESSAIRE CAR GERER PAR NAVIGATION
        dispatch(logout());
    };

    return (

        <div style={{ display: 'flex', flexDirection: 'column', height: '100vh', backgroundColor: "var(--black)" }}>
            <BlockBody children={children} title={"test"} />
        </div>

    );
};

const mapStateToProps = (state) => {
    return {
        Logger: state.Logger
    };
};

const mapDispatchToProps = (dispatch) => {
    return {
        dispatch: (action) => {
            dispatch(action);
        },
    };
};

export default connect(mapStateToProps, mapDispatchToProps)(HomeScreen);

