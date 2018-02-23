const express = require("express");
const hello = require("./routes/hello.js");
const port = 3000;
var app = express();
app.use("/", hello);
app.listen(port,() => console.log("Listening to port " + port));


