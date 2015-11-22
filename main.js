var textfile = "test.txt";
var datafile = "data.json";

var ready = false;
var datar = false;
var jsonr = false;

var data;
var val;
var count = 0;

$.get(textfile,function(txt){
	data = txt.split("\n");
	datar = true;
	start();
}); 
$.getJSON(datafile, function(json) {
	val = json;
	jsonr = true;
	start();
});

$(document).ready(function(){
	ready = true;
	start();
});

function start(){
	console.log("tes");
	if(ready && jsonr && datar){
		if(val[0] == -123){
			initJson();
		}
		
		for (var i=0; i < val.length; i++) {
			if(val[i] == 0){
				count = i;
				show();
				break;
			}
		}
	}
}

function show(){
	$("#sentence").html(data[count]);
}

$("#button-positif").click(function() {
	val[count] = 1;
	save(val);
	
	count++;
	show();
});

$("#button-negatif").click(function() {
	val[count] = -1;
	save(val);
	
	count++;
	show();
});

function save(tabledata){
	$.ajax({
		type: "GET",
		dataType : 'json',
		async: false,
		url: 'save.php',
		data: { data: JSON.stringify(tabledata) },
		success: function () {alert("Thanks!"); },
		failure: function() {alert("Error!");}
	});	
}


function initJson(){
	val = [];
	for(var i = 0; i < data.length; i++) {
		val.push(0);
	}
}