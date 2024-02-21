import React, {useEffect, useRef, useState} from "react";
import {BrowserRouter, Navigate, Route, Routes} from "react-router-dom";
import WelcomeScreen from "./Screens/Welcome/WelcomeScreen";
import {connect, useDispatch} from "react-redux";
import {logout} from "./Redux/actions/authActions";
import HomeScreen from "./Screens/Home/HomeScreen";
import ControlsScreen from "./Screens/Home/ControlsScreen";

function MyWebSite (props) {

    const isAuthenticated = !!props.Logger.user && !!props.Logger.token && (props.Logger.userId !== null);
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={isAuthenticated ? <Navigate to="/" /> : <WelcomeScreen />} />
                <Route path="*" element={isAuthenticated ? <Navigate to="/" /> : <WelcomeScreen />} />
                <Route path="/controls" element={isAuthenticated ? <HomeScreen><ControlsScreen /></HomeScreen> : <Navigate to="/" />} />
                {/*<Route path="/population" element={isAuthenticated ? <HomeScreen><PopulationScreen /></HomeScreen> : <WelcomeScreen />} />*/}
                {/*<Route path="/batiment" element={isAuthenticated ? <HomeScreen><BuildingScreen /></HomeScreen> : <WelcomeScreen />} />*/}
                {/*<Route path="/technology" element={isAuthenticated ? <HomeScreen><TechnologyScreen /></HomeScreen> : <WelcomeScreen />} />*/}
            </Routes>
        </BrowserRouter>
    );

}


const mapStateToProps = (state) => {
    return state
}
const mapDispatchToProps = (dispatch) => {
    return {
        dispatch: (action) => { dispatch(action) }
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(MyWebSite);


/*


    const isAuthenticated = !!props.Logger.user && !!props.Logger.token;

    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={isAuthenticated ? <Navigate to="/internal-home" /> : <WelcomeScreen />} />
                <Route path="/" element={isAuthenticated ? <Navigate to="/internal-home" /> : <ModalWelcome />} />
                <Route
                    path="/internal-home"
                    element={isAuthenticated ? <HomeScreen /> : <Navigate to="/" />}
                />
            </Routes>
        </BrowserRouter>
    );
 */


/*

    if (isAuthenticated) {
        return (
            <BrowserRouter>
                <Routes>
                    <Route path="/internal-home" element={<HomeScreen logged={logged} username={props.Logger.username} />} />
                    <Route path="*" element={<Navigate to="/internal-home" />} />
                </Routes>
            </BrowserRouter>
        );
    }
    if (!isAuthenticated) {
        return (
            <div style={{flex: 1}}>
                <BrowserRouter>
                    <Routes>
                        <Route path="/" element ={<WelcomeScreen /> }/>
                        <Route path="/internal-home" element={<HomeScreen />} />
                        <Route path="*" element ={<WelcomeScreen /> }/>
                    </Routes>
                </BrowserRouter>
            </div>
        )
    }
 */
