var DOM = KISSY.DOM  ;
var $id = function(o){ return DOM.query("."+o)[0];};
var warpWidth = 200; //���ӿ��
var margin = 14; //���Ӽ��

function sort(el,childTagName){
         var h = []; //��¼ÿ�еĸ߶�
         var box = el.getElementsByTagName(childTagName);
         var minH = box[0].offsetHeight;
         var boxW = box[0].offsetWidth+margin;
		 
		 //console.log(el.offsetWidth);
		 
         var n = el.offsetWidth / boxW | 0; //����ҳ�������¶���Pin
		 
		 
         el.style.width = n * boxW - margin + "px";
		 DOM.addClass(el,"isVisble");
         console.log(el.style.visibility);
         for(var i = 0; i < box.length; i++) {//�����㷨���д�����
                  var boxh = box[i].offsetHeight; //��ȡÿ��Pin�ĸ߶�
                  if(i < n) { //��һ�����⴦��
                                    h[i] = boxh;
                                    box[i].style.top = 0 + 'px';
                                    box[i].style.left = (i * boxW) + 'px';
                  } 
                  else {
                                    minH = Array.min(h); //ȡ�ø����ۼƸ߶���͵�һ��
                                    var minKey = getarraykey(h, minH);
                                    h[minKey] += boxh+margin ; //�����¸߶Ⱥ���¸߶�ֵ
                                    box[i].style.top = minH+margin + 'px';
                                    box[i].style.left = (minKey * boxW) + 'px';
                  }
                  var maxH = Array.max(h); 
                  var maxKey = getarraykey(h, maxH);
                  el.style.height = h[maxKey] +"px";//��λ��������������߶�
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
/* ����������ĳһֵ�Ķ�Ӧ���� */
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







