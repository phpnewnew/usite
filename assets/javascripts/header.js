var DOM = KISSY.DOM , Event = KISSY.Event ;

var domain = DOM.query(".domain")[0].value;

KISSY.io({
	jsonCallback: "jsonphy110",
	dataType:'jsonp',
	url:domain+"/view/front/ajax/getuserjsonp.php",
	data:{
		'format': 'json'
	},
	jsonp:"callback",
	success:function (data) {
		var username = data.username;
		
		var cat = DOM.query('.username')[0];
		cat.innerHTML = username;
		
	}
});



