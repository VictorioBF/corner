import React from "react";
import { Typography } from "@mui/material";

import CropFreeRoundedIcon from "@mui/icons-material/CropFreeRounded";

const Logo = ({ link, align, Margin, LL, MM, MS, SS, XS }) => {
  return (
    <Typography
      sx={{
        textDecoration: "none",
        fontSize: LL ? 60 : MM ? 40 : MS ? 30 : SS ? 20 : XS ? 16 : "default",
        display: "flex",
        m: Margin ? Margin : 1,
        fontWeight: "bold"
      }}
      color="inherit"
      variant="h6"
      component="div"
      justifyContent="center"
      alignItems={ align ? align : "center" }
      as={link ? "a" : "default"}
      href={link ? "/home" : "default"}
    >
      <CropFreeRoundedIcon 
        sx={{ 
          mr: 0.5,
          fontSize: "large",
        }} 
      />
      corner
    </Typography>
  );
};

export default Logo;
