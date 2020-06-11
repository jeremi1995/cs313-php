const fs = require ('fs');
const fileName = process.argv[2];


fs.readFile(fileName, function readFileCallBack (err, data) {
    let numEndline = data.toString().split('\n').length - 1;
    console.log(numEndline);
});