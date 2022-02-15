import { Box, Container, Grid, Paper, Typography } from "@mui/material";
import React from "react";
import Comment from "../components/Comment";
import Sidebar from "../components/Sidebar";
import CommentButton from "../components/SubComponents/CommentButton";

const OpenPost = ({ data }) => {
  return (
    <>
      <Grid container columns={24}>
        <Grid item xs={3}>
          <Sidebar />
        </Grid>
        <Grid item xs={21}>
          <Container sx={{ padding: 1 }}>
            <Paper variant="outlined" sx={{ padding: 3 }}>
              <Grid container spacing={2}>
                <Grid item xs={14} sx={{ verticalAlign: "middle" }}>
                  <Box
                    sx={{ display: "flex", height: "100%" }}
                    alignItems="center"
                    justifyContent="center"
                  >
                    <Typography variant="h6" align="center">
                      {
                        // POSTAGEM TÍTULO
                        data.title
                      }
                    </Typography>
                  </Box>
                </Grid>
                <Grid item xs={6}>
                  <Box
                    sx={{ display: "flex", height: "100%" }}
                    alignItems="center"
                    justifyContent="center"
                  >
                    <Typography align="center">
                      {
                        // POSTAGEM ASSUNTO
                        data.topic
                      }
                    </Typography>
                  </Box>
                </Grid>
                <Grid item xs={4}>
                  <Box
                    sx={{ display: "flex", height: "100%" }}
                    alignItems="center"
                    justifyContent="center"
                  >
                    <Typography align="center">
                      {
                        // POSTAGEM AUTOR
                        data.author
                      }
                    </Typography>
                  </Box>
                </Grid>
                <Grid item xs={24}>
                  <Typography align="justify">
                    {
                      // POSTAGEM CONTEÚDO
                      data.content
                    }
                  </Typography>
                </Grid>
                <Grid item xs={12}>
                  <Typography align="left">
                    Comentários:{" "}
                    {
                      // POSTAGEM COMENTÁRIOS
                      data.comments
                    }
                  </Typography>
                </Grid>
                <Grid item xs={12} align="right">
                  <CommentButton />
                </Grid>
              </Grid>
            </Paper>
          </Container>
          <Comment author={data.author} content={data.content} />
          <Comment author={data.author} content={data.content} />
          <Comment author={data.author} content={data.content} />
          <Comment author={data.author} content={data.content} />
        </Grid>
      </Grid>
    </>
  );
};

export default OpenPost;
