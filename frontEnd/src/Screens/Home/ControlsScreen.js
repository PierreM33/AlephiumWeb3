import React, {useEffect, useState} from 'react';
import { connect } from 'react-redux';
import {getUser} from "../../Api/User";
import {logout} from "../../Redux/actions/authActions";

const ControlsScreen = ({ dispatch, Logger  }) => {

    return (

        <div style={{ display: 'flex', flexDirection: 'column', width: "100%", backgroundColor: "orange" }}>

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

export default connect(mapStateToProps, mapDispatchToProps)(ControlsScreen);

