(function(window) {
	var currentPage;
	var first =true;
	function Main() {
		if (window.addEventListener) {
			window.addEventListener("load", onLoad);
			window.addEventListener("orientationchange", onResize);
		} else {
			window.attachEvent("onload", onLoad);
		}

	}

	function onLoad() {
		Utensil.addListener(window, "resize", onResize);
		Utensil.addListener(document.getElementById('submit'), "click", sendGalleryForm);
		Utensil.addListener(document.getElementById('formEmail'), "focus", inputFocus);
		document.getElementById('footer').style.display="block";
		onResize();
		TweenLite.to(document.getElementById('wrapper'),1,{css:{opacity:1}});
	}

	function onResize() {
		setWrapper();
		sizePage(currentPage);
	}

	function setWrapper()
	{
		var fh = document.getElementById('footer').clientHeight;
		var h= Utensil.stageHeight()>=document.body.scrollHeight?Utensil.stageHeight():document.body.scrollHeight;
		h =h-fh;
		if(h<580)h=580;
		document.getElementById('content').style.height = (h)+"px";
	}
	window.setPage=function(id)
	{
		
		if(!id ||id==currentPage)return;
		var page = document.getElementById(id);
		if(currentPage)resetPage(currentPage);
		
		
		
		
		page.style.display = "block";
		page.style.top = -(page.clientHeight>Utensil.stageHeight()?page.clientHeight:Utensil.stageHeight())+"px";
		if(page.style.top.replace("px","")=="50")return;
		sizePage(id);
		
		switch(id)
		{
			case "gallery":
			break;
			
		}
		showPage(page);
		currentPage = id;
	}
	function sizePage(id)
	{
		if(!id) return;
		var w= Utensil.stageWidth()<1007?Utensil.stageWidth():1007;
		var page = document.getElementById(id);
		page.style.width = (w-317-30)+"px";
		page.style.left = 317+"px";
		
		if((page.clientHeight+70)>=Utensil.stageHeight())
		{
		document.getElementById('content').style.height = (page.clientHeight+70)+"px";
			
		}else{
			var fh = document.getElementById('footer').clientHeight;
			var h = Utensil.stageHeight()-fh;
			document.getElementById('content').style.height = (h<580?580:h)+"px";
		}
	}
	function resetPage(id)
	{
		
		document.body.style.overflowY="hidden";
		TweenLite.killTweensOf(document.getElementById(id));
		TweenLite.to(document.getElementById(id),0.5,{css:{top:Utensil.stageHeight()+"px"},onComplete:resetComplete,onCompleteParams:[id]});
	}
	function resetComplete(id)
	{
		document.getElementById(id).style.display ="none";
		
	}
	function showPage(page)
	{
		document.body.style.overflowY="hidden";
		TweenLite.killTweensOf(page);
		
		TweenLite.to(page,0.5,{delay:first?0:0.5,css:{top:50+"px"},onComplete:pageComplete});
		first=false;
	}
	function pageComplete()
	{
		document.body.style.overflowY="auto";
	}
	function inputFocus()
	{
		document.getElementById('formError').innerHTML="&nbsp;";
	}
	function sendGalleryForm()
	{
		
		var value = document.getElementById('formEmail').value;
		value = value.replace(/(^[\s]+|[\s]+$)/g, '');
		if(value!="" && value.indexOf("@")>=0 && value.indexOf(".")>=0)
		{
			Utensil.URLLoader.load("lib/com/zayn/register.php?email="+value,formComplete);
		}else{
			document.getElementById('formError').innerHTML="invalid email address";
		}
	}
	function formComplete(t,x)
	{
		t =t = t.replace(/(^[\s]+|[\s]+$)/g, '');
		if(t=="done")
		{
			document.getElementById('form').style.visibility = "hidden";
			document.getElementById('formError').innerHTML="Thank you.";
		}else{
			document.getElementById('formError').innerHTML="Error. Please try again";
		}
	}
	Main();
})(window);
