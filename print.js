
var printfile = "print.tmp";

$("#button-class").click(function() {
	$.post( "print.php",{action: "classified"}, function(respon) {
		console.log(respon);
		var res = $.parseJSON(respon);
		console.log(res.status);
		if(res.status == "ok"){
			window.location.href = printfile;
		}
	}, "text")
	.fail(function() {
		console.log("gagal");
	});

});
$("#button-deleted").click(function() {
	$.post( "print.php",{action: "deleted"}, function(respon) {
		console.log(respon);
		var res = $.parseJSON(respon);
		console.log(res.status);
		if(res.status == "ok"){
			window.location.href = printfile;
		}
	}, "text")
	.fail(function() {
		console.log("gagal");
	});
});