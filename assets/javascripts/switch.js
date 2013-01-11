/**************************************************
 * �÷���
 *count:ͼƬ������
 *wrapId:����ͼƬ��DIV��className
 *ulId:��ťDIV class,
 *infoId����Ϣ�� 
 *stopTime��ÿ��ͼƬͣ����ʱ��
 *SWTICH.scroll(count,wrapId,ulId,infoId,stopTime);
 **************************************************/
var DOM = KISSY.DOM  ;
var SWTICH = function() {
	function id(name) {return DOM.query("."+name)[0];}
	//��������

	function each(arr, callback, thisp) {
		if (arr.forEach) {
			arr.forEach(callback, thisp);
		} else { 
			for (var i = 0, len = arr.length; i < len; i++) 
				callback.call(thisp, arr[i], i, arr);
		}
	}
	function fadeIn(elem) {
		DOM.removeClass(elem,"in");
		setOpacity(elem, 0);
		for ( var i = 0; i < 20; i++) {
			(function() {
				var pos = i * 5;
				setTimeout(function() {
					setOpacity(elem, pos)
				}, i * 25);
			})(i);
		}
		
	}
	function fadeOut(elem) {
		for ( var i = 0; i <= 20; i++) {
			(function() {
				var pos = 100 - i * 5;
				setTimeout(function() {
					setOpacity(elem, pos)
				}, i * 25);
			})(i);
		}
		DOM.addClass(elem,"in");	
	}
	// ����͸����
	function setOpacity(elem, level) {
		if (DOM.hasClass(elem,"in")) {
			elem.style.opacity = 0;
		} else {
			elem.style.opacity = level / 100;
		}
	}
	return {
		//count:ͼƬ����,wrapId:����ͼƬ��DIV,ulId:��ťDIV,infoId����Ϣ����stopTime��ÿ��ͼƬͣ����ʱ��
		scroll : function(count,wrapId,ulId,infoId,stopTime) {
			var self=this;
			var targetIdx=0;      //Ŀ��ͼƬ���
			var curIndex=0;       //����ͼƬ���
			//���Li��ť
			var frag=document.createDocumentFragment();
			console.log(frag);
			this.num=[];    //�洢����li��Ӧ�ã�Ϊ���������¼���׼��
			this.info=id(infoId);
			for(var i=0;i<count;i++){
				(this.num[i]=frag.appendChild(document.createElement("li"))).innerHTML=i+1;
			}
			console.log(id(ulId));
			id(ulId).appendChild(frag);
			//��ʼ����Ϣ
			this.img = id(wrapId).getElementsByTagName("a");
			this.info.innerHTML=self.img[0].firstChild.title;
			this.num[0].className="on";
			//�����˵�һ���������ͼƬ����Ϊ͸��
			
			each(this.img,function(elem,idx,arr){
				if (idx!=0) DOM.addClass(elem,"in");;
			});
			
			//Ϊ���е�li��ӵ���¼�
			each(this.num,function(elem,idx,arr){
				elem.onclick=function(){
					self.fade(idx,curIndex);
					curIndex=idx;
					targetIdx=idx;
				}
			});
			//�Զ��ֲ�Ч��
			var itv=setInterval(function(){
				if(targetIdx<self.num.length-1){
					targetIdx++;
				}else{
					targetIdx=0;
					}
				self.fade(targetIdx,curIndex);
				curIndex=targetIdx;
				},stopTime);
			id(ulId).onmouseover=function(){ clearInterval(itv)};
			id(ulId).onmouseout=function(){
				itv=setInterval(function(){
					if(targetIdx<self.num.length-1){
						targetIdx++;
					}else{
						targetIdx=0;
						}
					self.fade(targetIdx,curIndex);
					curIndex=targetIdx;
				},stopTime);
			}
		},
		fade:function(idx,lastIdx){
			if(idx==lastIdx) return;
			var self=this;
			fadeOut(self.img[lastIdx]);
			fadeIn(self.img[idx]);
			each(self.num,function(elem,elemidx,arr){
				if (elemidx!=idx) {
					self.num[elemidx].className='';
				}else{
					id("list").style.background="";
					self.num[elemidx].className='on';
					}
			});
			this.info.innerHTML=self.img[idx].firstChild.title;
		}
	}
}();
SWTICH.scroll(4,"banner_list","list","banner_info",4000);
