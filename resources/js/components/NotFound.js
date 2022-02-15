import React from "react";

import { Paper, Typography, Grid, Container } from "@mui/material";
import MoreVertSharpIcon from "@mui/icons-material/MoreVertSharp";

const NotFound = () => {
  return (
    <Container sx={{ paddingBottom: 0.5, paddingTop: 0.5 }}>
      <Paper variant="outlined" sx={{ padding: 7}}>
        <Grid container spacing={4}>
          <Grid item xs={12} align="center">
            <Typography variant="h2">404</Typography>
          </Grid>
          <Grid item xs={12} align="center">
            <Typography variant="h4">Essa página não existe ou é restrita!</Typography>
          </Grid>
        </Grid>
      </Paper>
    </Container>
  );
};

export default NotFound;