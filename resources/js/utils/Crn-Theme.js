import React from "react";
import { createTheme, ThemeProvider } from "@mui/material/styles";

const crn_theme = createTheme({
  zIndex: {
    drawer: 0
  },
  typography: {
    fontFamily: ["Outfit"]
  }
});

export default function CrnTheme({ children }) {
  return <ThemeProvider theme={crn_theme}>{children}</ThemeProvider>;
}
