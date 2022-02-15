import "./styles.css";
import { Routes, Route, BrowserRouter } from "react-router-dom";
import PropTypes from "prop-types";

import CrnTheme from "./utils/Crn-Theme";

import Home from "./views/Home";
import OpenPost from "./views/OpenPost";
import Login from "./views/Login";
import SignUp from "./views/SignUp";
import Test from "./views/Test";

import NotFound from "./components/NotFound";

const Corner = () => {
  return (
    <div className="App">
      <CrnTheme>
        <BrowserRouter>
          <Routes>
            <Route path="/" exact element={<Home data={staticData} />} />
            <Route path="/home" element={<Home data={staticData} />} />
            <Route path="/post" element={<OpenPost data={staticData} />} />
            <Route path="/login" element={<Login />} />
            <Route path="/signup" element={<SignUp />} />
            <Route
              path="*"
              element={
                <NotFound />
              }
            />

          </Routes>
        </BrowserRouter>
      </CrnTheme>
    </div>
  );
};

Corner.propTypes = {
  children: PropTypes.func
};

export default Corner;
