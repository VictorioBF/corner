import { Grid } from "@mui/material";
import React from "react";
import Sidebar from "../components/Sidebar";
// import Footer from '../components/Footer'
import Post from "../components/Post";

const Home = ({ data }) => {
  
  return (
    <>
      <Grid container columns={24}>
        <Grid item xs={3}>
          <Sidebar />
        </Grid>
        <Grid item xs={21}>
          <Post
            title={data.title}
            topic={data.topic}
            content={data.content}
            comments={data.comments}
            permission
          />
          <Post
            title={data.title}
            topic={data.topic}
            content={data.content}
            comments={data.comments}
          />
          <Post
            title={data.title}
            topic={data.topic}
            content={data.content}
            comments={data.comments}
            permission
          />
          <Post
            title={data.title}
            topic={data.topic}
            content={data.content}
            comments={data.comments}
            permission
          />
          <Post
            title={data.title}
            topic={data.topic}
            content={data.content}
            comments={data.comments}
          />
          <Post
            title={data.title}
            topic={data.topic}
            content={data.content}
            comments={data.comments}
          />
        </Grid>
      </Grid>
    </>
  );
};

export default Home;
