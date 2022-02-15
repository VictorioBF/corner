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

const CommentButton = () => {
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
              Novo Comentário
            </Typography>
          </Grid>

          <Grid item container spacing={2} xs={24}>

            <Grid item xs={24} sx={{}}>
              <TextField
                id="crn_comment"
                label="Conteúdo do Comentário"
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
                Comentar!
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
          textTransform: "none"
        }}
      >
        Comentar
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

export default CommentButton;