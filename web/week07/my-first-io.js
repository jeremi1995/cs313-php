const fs = require ('fs');
let fileName = process.argv[2];
let numEl = (fs.readFileSync(fileName)).toString().split('\n').length - 1;

console.log(numEl);
/*
let sum = 0;

for (i = 0; myString[i]; i++) {
    if (myString[i] == '\n') {
        sum++;
    }
}

console.log(sum);
*/