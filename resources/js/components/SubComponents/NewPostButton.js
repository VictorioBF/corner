import React from "react";
import {
  Typography,
  Paper,
  Grid,
  Box,
  TextField,
  Select,
  MenuItem,
  Button,
  Modal,
} from "@mui/material";
//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--//--

const NewPostButton = () => {
  const [open, setOpen] = React.useState(false);

  const handleOpen = () => {
    setOpen(true);
  };

  const handleClose = () => {
    setOpen(false);
  };

  const body = (
    <Box
      sx={{
        width: "75%",
        m: "auto"
      }}
    >
      <Paper variant="outlined" sx={{ padding: 3, mt: 5 }}>
        <Grid container spacing={2}>
          <Grid item xs={24}>
            <Typography id="simple-modal-title" variant="h6">
              Nova Postagem
            </Typography>
          </Grid>

          <Grid item container spacing={2} xs={24}>
            <Grid item xs={12}>
              <TextField
                id="crn_title"
                variant="outlined"
                label="Título"
                sx={{ width: "100%" }}
              />
            </Grid>
            <Grid item xs={12}>
              <Select
                defaultValue=""
                variant="outlined"
                id="crn_topic"
                // label="Assunto"
                sx={{ width: "100%" }}
              >
                <MenuItem value="Assunto 01">
                  <em>Assunto 01</em>
                </MenuItem>
                {[
                  "Assunto 02",
                  "Assunto 03",
                  "Assunto 04",
                  "Assunto 05",
                  "Assunto 06",
                  "Assunto 07",
                  "Assunto 08"
                ].map((text, index) => (
                  <MenuItem key={text} value={text} primary={text}>
                    <em>{text}</em>
                  </MenuItem>
                ))}
              </Select>
            </Grid>

            <Grid item xs={24} sx={{}}>
              <TextField
                id="crn_post"
                label="Conteúdo da Postagem"
                multiline
                rows={6}
                variant="outlined"
                sx={{ width: "100%" }}
              />
            </Grid>
            <Grid item xs={12} sx={{}}>
              <Button
                color="error"
                variant="contained"
                sx={{ width: "100%", textTransform: "none" }}
                onClick={() => handleClose()}
              >
                Cancelar
              </Button>
            </Grid>
            <Grid item xs={12} sx={{}}>
              <Button
                color="primary"
                variant="contained"
                sx={{ width: "100%", textTransform: "none" }}
                onClick={() => handleClose()}
              >
                Postar!
              </Button>
            </Grid>
          </Grid>
        </Grid>
      </Paper>
    </Box>
  );

  return (
    <>
      <Button
        type="button"
        onClick={handleOpen}
        sx={{
          textTransform: "none",
          width: "100%"
        }}
      >
        Postar
      </Button>
      <Modal
        open={open}
        onClose={handleClose}
        aria-labelledby="simple-modal-title"
        aria-describedby="simple-modal-description"
      >
        {body}
      </Modal>
    </>
  );
};

export default NewPostButton;