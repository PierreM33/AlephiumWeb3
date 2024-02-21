import AsyncStorage from '@react-native-community/async-storage';
import { combineReducers } from "redux";
import { configureStore } from "@reduxjs/toolkit";
import { persistReducer, persistStore } from "redux-persist";
import thunk from 'redux-thunk';
import {AppState} from "../reducers/appReducer";
import {Logger} from "../reducers/authReducer";

const persistConfig = {
    key: "ExpeditionWars",
    storage: AsyncStorage
};

const rootReducer = combineReducers({
    Logger,
    AppState
});

const persistedReducer = persistReducer(persistConfig, rootReducer);

export const store = configureStore({
    reducer: persistedReducer,
    middleware: [thunk]
});

export const persistor = persistStore(store);
