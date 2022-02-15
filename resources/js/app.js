import { StrictMode } from "react";
import ReactDOM from "react-dom";

import Corner from "./Corner";

const rootElement = document.getElementById("root");
ReactDOM.render(
  <StrictMode>
    <Corner />
  </StrictMode>,
  rootElement
);
