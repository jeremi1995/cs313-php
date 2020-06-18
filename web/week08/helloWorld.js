const http = require('http');
const url = require('url');

function onRequest(request, response) {
    console.log("Reveived a request for: " + request.url);
    var pattern = /\/add?/;

    if (request.url == "/home") {

        response.writeHead(200, {"Content-Type":"text/html"});
        response.write("<h1>Welcome to home page</h1>");
        response.end();
    }
    else if (request.url == "/getData") {

        response.writeHead(200, {"Content-Type":"application/json"});
        response.write('{"name":"Jeremy Duong", "class":"cs313"}');
        response.end();
    }
    
    else if (pattern.test(request.url)) {
        const queryObject = url.parse(request.url, true).query;
        let num = Number(queryObject.n1) + Number(queryObject.n2);

        response.writeHead(200, {"Content-Type":"text/html"});
        response.write(num.toString());
        response.end();
    }

    else {
        response.write('<h1>404: page not found</h1>');
        response.end();
    }
}

var server = http.createServer(onRequest);
server.listen(5000);