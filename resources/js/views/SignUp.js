import React from "react";
import {
  Box,
  TextField,
  Button,
  Typography,
  Paper,
  Grid,
  Divider
} from "@mui/material";
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
          <Grid item xs={12}></Grid>
          <Grid item xs={5}>
              <Typography
                variant="h6"
                align='center'
                sx={{
                  height: "100%",
                  lineHeight: "2.5",
                  verticalAlign: "middle"
                }}
              >
                Criar Conta
              </Typography>
          </Grid>
          <Grid item xs={2}>
            <Divider orientation="vertical" sx={{ width: 0, m: "auto"}} />
          </Grid>
          <Grid item xs={5}>
            <Logo SS />
          </Grid>

          <Grid item xs={12}>
            <TextField
              id="crn-username"
              fullWidth
              label="Nome de Usuário"
              placeholder="João Gameplays"
              variant="outlined"
            />
          </Grid>

          <Grid item xs={12}>
            <TextField
              id="crn-user"
              fullWidth
              label="Usuário"
              placeholder="JoaoGameplays"
              variant="outlined"
            />
          </Grid>

          <Grid item xs={6}>
            <TextField
              id="crn-password"
              type="password"
              fullWidth
              label="Senha"
              placeholder="********"
              variant="outlined"
            />
          </Grid>

          <Grid item xs={6}>
            <TextField
              id="crn-repeat-password"
              type="password"
              fullWidth
              label="Repita a Senha"
              placeholder="********"
              variant="outlined"
            />
          </Grid>

          <Grid item xs={12}>
            <Divider variant="middle" />
          </Grid>

          <Grid item xs={6}>
            <Button variant="outlined" color="error" fullWidth href="/login">
              Cancelar
            </Button>
          </Grid>

          <Grid item xs={6}>
            <Button variant="outlined" fullWidth type="submit">
              Criar conta
            </Button>
          </Grid>
        </Grid>
      </Paper>
    </Box>
  );
};

export default Home;
