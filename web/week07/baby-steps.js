let i = 2;
let sum = 0;
while (process.argv[i]) {
    sum += Number(process.argv[i]);
    i++;
}

console.log(sum);