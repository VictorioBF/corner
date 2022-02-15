import React from "react";
import { Box, TextField, Button, Typography, Paper, Grid, Divider } from "@mui/material";
import Logo from "../components/SubComponents/Logo";

const Home = () => {
  return (
    <Box
      sx={{
        width: "35%",
        margin: "5% auto"
      }}
    >
      <Paper
        variant="outlined"
        sx={{
          padding: "5%"
        }}
      >
        <Grid container spacing={2}>
          <Grid item xs={5}>
            <Box
              sx={{
                
              }}
            >
              <Typography
                variant="h6"
                align='center'
                sx={{
                  height: "100%",
                  lineHeight: "2.5",
                  verticalAlign: "middle"
                }}
              >
                Login
              </Typography>
            </Box>
          </Grid>
          <Grid item xs={2}>
            <Divider orientation="vertical" sx={{ width: 0, m: "auto"}} />
          </Grid>
          <Grid item xs={5}>
            <Logo SS />
          </Grid>
          <Grid item xs={12}>
            <TextField
              id="crn-user"
              fullWidth
              label="Usuário"
              variant="outlined"
            />
          </Grid>
          <Grid item xs={12}>
            <TextField
              id="crn-password"
              fullWidth
              label="Senha"
              variant="outlined"
            />
          </Grid>
          <Grid item xs={6}>
            <Typography as="a" href="/">
              Esqueci a senha
            </Typography>
          </Grid>
          <Grid item xs={6} align="right">
            <Typography as="a" href="/signup">
              Cadastrar
            </Typography>
          </Grid>
          <Grid item xs={12}>
            <Button variant="outlined" fullWidth type="submit">
              Login
            </Button>
          </Grid>
        </Grid>
      </Paper>
    </Box>
  );
};

export default Home;
