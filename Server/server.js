

var http = require('http');
var fs = require('fs');
var $ = require('jquery');


var contents = fs.readFileSync('public/index.html', 'utf8');
var goals = fs.readFileSync('public/goals.html', 'utf8');
var contentsCSS = fs.readFileSync('public/style.css', 'utf8');
var contentsJSS = fs.readFileSync('public/index.js', 'utf8');
var chart = fs.readFileSync('public/images/chart.png');
var set_nutrtition = fs.readFileSync('public/set_nutrition.html', 'utf8');


http.createServer(function (req, res) {
     if (req.url =='/index.html'||req.url =='/' || req.url == '/index') {
        res.statusCode = 200;
        console.log("== status code of index:", res. statusCode);
        res.write(contents);
        res.end();
        }
        else if (req.url == '/goals.html') {
            res.statusCode = 200;
            console.log("== Status code of CSS:", res. statusCode);
            res.write(goals);
            res.end();
        }
        else if (req.url == '/set_nutrition.html') {
            res.statusCode = 200;
            console.log("== Status code of CSS:", res. statusCode);
            res.write(set_nutrtition);
            res.end();
        }
        else if (req.url == '/style.css') {
            res.statusCode = 200;
            console.log("== Status code of CSS:", res. statusCode);
            res.write(contentsCSS);
            res.end();
        }
        else if (req.url == '/index.js') {
            res.statusCode = 200;
            console.log("== Status code JS:", res. statusCode);
            res.write(contentsJSS);
            res.end();
        }
        else if (req.url =='/chart.png'){
            res.statusCode = 200;
            console.log("== Status code JS:", res. statusCode);
            res.write(chart);
            res.end();
        }
        
    res.writeHead(200, {
        'Content-Type': 'text/plain',
        'Access-Control-Allow-Origin' : '*'
    });
    res.end('Hello World\n');
}).listen(3000);


