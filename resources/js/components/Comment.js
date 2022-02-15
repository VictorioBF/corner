import React from "react";

import {
  Paper,
  Typography,
  Grid,
  Container,
  Box,
  IconButton,
  Menu,
  MenuItem
} from "@mui/material";
import MoreVertSharpIcon from "@mui/icons-material/MoreVertSharp";

const Comment = ({ author, content, permission }) => {
  const [anchorEl, setAnchorEl] = React.useState(null);

  const handleClick = (event) => {
    setAnchorEl(event.currentTarget);
  };

  const handleClose = () => {
    setAnchorEl(null);
  };

  return (
    <Container sx={{ paddingBottom: 0.5, paddingTop: 0.5 }}>
      <Container>
        <Paper variant="outlined" sx={{ padding: 3 }}>
          <Grid container spacing={2}>
            <Grid item xs={permission ? 12 : 24}>
              <Typography variant="subtitle2">{author}</Typography>
            </Grid>
            {
              permission ?
                <Grid item xs={12} align="right">
                  <Box
                    sx={{ display: "flex", height: "100%" }}
                    alignItems="center"
                    justifyContent="right"
                  >
                    <IconButton onClick={handleClick}>
                      <MoreVertSharpIcon sx={{ verticalAlign: "middle" }} />
                    </IconButton>
                    <Menu
                      anchorEl={anchorEl}
                      keepMounted
                      open={Boolean(anchorEl)}
                      onClose={handleClose}
                    >
                      <MenuItem onClick={handleClose}>Excluir Comentário</MenuItem>
                      {/* <MenuItem onClick={handleClose}>Excluir postagem</MenuItem> */}
                    </Menu>
                  </Box>
                </Grid>
                :
                null
            }
            <Grid item xs={24}>
              <Typography paragraph align="justify">
                {content}
              </Typography>
            </Grid>
          </Grid>
        </Paper>
      </Container>
    </Container>
  );
};

export default Comment;
