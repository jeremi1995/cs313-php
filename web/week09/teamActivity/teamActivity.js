const express = require('express');
const app = express();
const port = 3000;
app.set('port', (process.env.PORT || 5000));
app.use(express.static('public'));

//view
app.set("views", "views");
app.set("view engine", "ejs");

app.use(express.urlencoded());


//control
app.get('/', (req, res) => {
    console.log('received request for ' + req.url);
    res.send('Team Activity!');
});

app.post('/math', (req, res) => {
    console.log('received request for ' + req.url);
    const num = add2Nums(req);

    let param = {addResult: num};

    res.render("addResultDisplay", param);
});

app.post('/math_service', (req, res) => {
    console.log('received request for ' + req.url);
    const num = add2Nums(req);

    let param = {addResult: num};

    res.render("addResultJSON", param);
});

app.listen(port, () => console.log(`Example app listening at http://localhost:${port}`));

//model
function add2Nums(req) {
    return Number(req.body.n1) + Number(req.body.n2);
}