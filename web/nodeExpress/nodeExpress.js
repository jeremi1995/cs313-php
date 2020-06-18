const express = require('express');
const url = require('url');
const app = express();
const port = 3000;

app.use(express.static('public'));

app.set("views", "views");
app.set("view engine", "ejs");

app.use(express.urlencoded());

// So the main ones are "get", "post", "put", and "delete"
app.get('/', (req, res) => {
    console.log('received request for ' + req.url);
    res.send('Hello World!');
});

//Control
app.get('/home', (req, res) => {
    console.log('received request for ' + req.url);
    let userName = "Jeremy";
    let email = "jeremibq@gmail.com";

    let params = {userName: userName, email: email};
    res.render("home", params);
});

app.post('/add', (req, res) => {
    console.log('received request for ' + req.url);
    const num = add2Nums(req);

    let param = {addResult: num};

    res.render("addResultDisplay", param);
});

app.listen(port, () => console.log(`Example app listening at http://localhost:${port}`));

function add2Nums(req) {
    return Number(req.body.n1) + Number(req.body.n2);
}