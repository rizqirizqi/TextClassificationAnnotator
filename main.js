var textfile = "test.txt";
var ready = false;
var datar = false;
var data;
var nowshow;

$.get(textfile,function(txt){
	data = txt.split("\n");
	datar = true;
	start();
}); 

$(document).ready(function(){
	ready = true;
	start();
});

function start(){
	console.log("tes");
	if(datar && ready){
		$.post( "data.php",{action:"last"}, function(respon) {
			var res = $.parseJSON(respon);
			console.log(res.status);
			show(res.value);
		}, "text")
		.fail(function() {
			console.log("gagal");
		});
	}
}

function show(id){
	nowshow = id;
	$("#sentence").html(data[id]);
	ready = true;
}

function post(now, value){
	$.post( "data.php",{action:"choose",id:now,val: value}, function(respon) {
		console.log(respon);
		var res = $.parseJSON(respon);
		console.log(res.status);
		show(res.value);
	}, "text")
	.fail(function() {
		console.log("gagal");
	});
}

$("#button-positif").click(function() {
	if(ready){
		ready = false;
		post(nowshow, 1);
	}
});
$("#button-negatif").click(function() {
	if(ready){
		ready = false;
		post(nowshow, -1);
	}
});
$("#button-delete").click(function() {
	if(ready){
		ready = false;
		post(nowshow, -2);
	}
});
$("#button-prev").click(function() {
	if(ready){
		ready = false;
		show(nowshow - 1);
	}
});