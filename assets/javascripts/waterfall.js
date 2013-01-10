var DOM = KISSY.DOM  ;
var $id = function(o){ return DOM.query("."+o)[0];};
var warpWidth = 200; //格子宽度
var margin = 14; //格子间距

function sort(el,childTagName){
         var h = []; //记录每列的高度
         var box = el.getElementsByTagName(childTagName);
         var minH = box[0].offsetHeight;
         var boxW = box[0].offsetWidth+margin;
		 
		 //console.log(el.offsetWidth);
		 
         var n = el.offsetWidth / boxW | 0; //计算页面能排下多少Pin
		 
		 
         el.style.width = n * boxW - margin + "px";
		 DOM.addClass(el,"isVisble");
         console.log(el.style.visibility);
         for(var i = 0; i < box.length; i++) {//排序算法，有待完善
                  var boxh = box[i].offsetHeight; //获取每个Pin的高度
                  if(i < n) { //第一行特殊处理
                                    h[i] = boxh;
                                    box[i].style.top = 0 + 'px';
                                    box[i].style.left = (i * boxW) + 'px';
                  } 
                  else {
                                    minH = Array.min(h); //取得各列累计高度最低的一列
                                    var minKey = getarraykey(h, minH);
                                    h[minKey] += boxh+margin ; //加上新高度后更新高度值
                                    box[i].style.top = minH+margin + 'px';
                                    box[i].style.left = (minKey * boxW) + 'px';
                  }
                  var maxH = Array.max(h); 
                  var maxKey = getarraykey(h, maxH);
                  el.style.height = h[maxKey] +"px";//定位结束后更新容器高度
         }
         for(var i = 0; i < box.length; i++) {
				  DOM.addClass(box[i],"isVisble");
         }
}
Array.min=function(array)
{
    return Math.min.apply(Math,array);
}
Array.max=function(array)
{
    return Math.max.apply(Math,array);
}
/* 返回数组中某一值的对应项数 */
function getarraykey(s, v) {
		var k=null;
        for(k in s) {
                if(s[k] == v) {
                        return k;
                }
        }
}
sort($id("wrap"),"b");


var domain = DOM.query(".domain")[0].value;

KISSY.io({
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







