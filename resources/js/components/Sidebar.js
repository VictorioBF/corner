import React from "react";

import {
  Box,
  Button,
  Divider,
  Drawer,
  Grid,
  List,
  ListItem,
  ListItemText,
  Typography,
  Modal,
  Paper,
  Select,
  MenuItem,
  TextField
} from "@mui/material";

import Logo from "./SubComponents/Logo";
import NewPostButton from "./SubComponents/NewPostButton";

const Sidebar = () => {
  return (
    <Box
      sx={{
        width: "100%"
      }}
    >
      <Drawer
        anchor="left"
        variant="permanent"
        sx={{ width: "100%" }}
        elevation={0}
      >
        <Logo link SS />
        <Divider />
        <Typography align="center" sx={{ m: 1 }}>
          Usuário
        </Typography>
        <Divider />

        <Box sx={{ overflow: "auto" }}>
          <NewPostButton />
          <Divider />
          <List sx={{ padding: 0 }}>
            {[
              "Assunto 01",
              "Assunto 02",
              "Assunto 03",
              "Assunto 04",
              "Assunto 05",
              "Assunto 06",
              "Assunto 07",
              "Assunto 08",
              "Assunto 09",
              "Assunto 10",
              "Assunto 11",
              "Assunto 12",
              "Assunto 13"
            ].map((text, index) => (
              <ListItem button as="a" href="home" key={text} alignItems="center">
                <ListItemText primary={text} sx={{ textAlign: "center", textDecoration: "none", color: "black" }} />
              </ListItem>
            ))}
          </List>
        </Box>
      </Drawer>
    </Box>
  );
};

export default Sidebar;
