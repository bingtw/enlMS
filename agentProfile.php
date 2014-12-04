<html class='safari'><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<title>
Welcome! 歡迎加入台灣 Enlightened!
</title>
<meta charset='utf-8'>
<meta name='generator' content='Wufoo'>
<meta name='robots' content='index'>
<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
<link href='woo/index.0134.css' rel='stylesheet'>
<link href='woo/theme.css' rel='stylesheet'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  .ui-progressbar {
    position: relative;
  }
  .progress-label {
    position: absolute;
    left: 50%;
    top: 4px;
    font-weight: bold;
    text-shadow: 1px 1px 0 #fff;
  }
  </style>
  <script>
  $(function() {
    var progressbar = $( "#progressbar" ),
      progressLabel = $( ".progress-label" );
 
    progressbar.progressbar({
      value: false,
      change: function() {
        progressLabel.text( progressbar.progressbar( "value" ) + "%" );
      },
      complete: function() {
        progressLabel.text( "Complete!" );
      }
    });
 
    function progress() {
      var val = progressbar.progressbar( "value" ) || 0;
 
      progressbar.progressbar( "value", val + 1 );
 
      if ( val < 99 ) {
        setTimeout( progress, 10 );
      }
    }
 
    setTimeout( progress, 60000 );
  });
  </script>

</head>
<body id='public'>
<script>
	function SEL_L1(){
		var L1=$('#Location_1').val();
		if(L1=='北部'){
			$('#Location_2').html("<option value='台北'>台北</option><option value='新北'>新北</option><option value='基隆'>基隆</option><option value='桃園'>桃園</option><option value='新竹'>新竹</option>");
		}
		if(L1=='中部'){
			$('#Location_2').html("<option value='苗栗'>苗栗</option><option value='台中'>台中</option><option value='彰化'>彰化</option><option value='南投'>南投</option>");
		}
		if(L1=='南部'){
			$('#Location_2').html("<option value='雲林'>雲林</option><option value='嘉義'>嘉義</option><option value='台南'>台南</option><option value='高雄'>高雄</option><option value='屏東'>屏東</option>");
		}
		if(L1=='東部'){
			$('#Location_2').html("<option value='宜蘭'>宜蘭</option><option value='花蓮'>花蓮</option><option value='台東'>台東</option>");
		}
		if(L1=='外島'){
			$('#Location_2').html("<option value='澎湖'>澎湖</option><option value='金門'>金門</option><option value='馬祖'>馬祖</option>");
		}
	}


</script>
<div id='container' class='ltr'>
	<h1 id='logo'>
</h1>
	
	<form id='form4' name='form4' class='wufoo topLabel page1' accept-charset='UTF-8' autocomplete='off' enctype='multipart/form-data' method='post' novalidate='' action='agentProfile_insert.php'>
  
<header id='header' class='info'>
	<h2>Welcome! 歡迎加入台灣 Enlightened!</h2>
	<div><br>
嗨, 歡迎來到 Ingress 的世界, 很高興你選擇了 Enlightened.<br>
<br>
我們是一群 Taiwan Enlightened (綠軍)的玩家, 有鑑於網路上 Ingress 的教學文件甚少,  因此我們合力編寫了一份新人手冊, 希望幫助剛接觸 Ingress 的朋友, 了解遊戲基本進行方式, 減少自己摸索的黑暗期, 並取得鄰近友軍的幫助.<br>
<br>
另外, 我們也有許多熱心的玩家願意幫助新人, 請您進行簡單的新人報到程序, 這樣各分區負責人才知道您的加入唷!<br>
<br>
● <a href='http://goo.gl/NG2AGX'>新人教學手冊</a><br>
● <a href='https://plus.google.com/u/0/communities/106162262619888362252'>Google G+ 綠軍討論區</a> (強烈推薦加入)<br>
● <a href='https://plus.google.com/+IngressGameTw1/posts'>Google G+ 綠軍活動專頁</a> (強烈推薦加入)<br>
● 非官方網站-遊戲消息<a href='http://www.ingress.game.tw/'>http://www.ingress.game.tw/</a><br>
<br>
為幫助您找到各區支援，請填寫以下新人報到資料，此資料僅做遊戲聯絡之用，不會轉作其他用途:<br>
<br>
</div>
</header>

<ul>

<li id='fo4li5' class='notranslate'>
	<label class='desc' id='title5' for='Field5'>
		請輸入您的 Codename<span id='req_5' class='req'>*</span>
		<br>(Codename 就是遊戲中的代號, 請注意大小寫.)
	</label>
	<div>
		<input name='Codename' type='text' class='field text medium' value='' maxlength='16'>
	</div>
</li>



<li id='fo4li6' class='notranslate'>
	<label class='desc' id='title6' for='Field6'>
		您現在的等級 Level<span id='req_6' class='req'>*</span>
		<br>(Level 就是遊戲左上角的數字, 新手的話是 LV1.)
	</label>
	<div>
	<select name="IngressLevel">
		<option value='LV1~LV6'>LV1~LV6</option>
		<option value='LV7'>LV7</option>
		<option value='LV8~LV16'>LV8~LV16</option>
		</select>
	</div>
</li>

<li id='fo4li8' class='notranslate'>
	<label class='desc' id='title8' for='Field8'>
		請輸入您用來註冊Ingress的 Email (Google Account)<span id='req_8' class='req'>*</span>
		<br>(就是您用來註冊Ingress的 Email帳號, 方便我們以 Hangouts 聯繫)	
	</label>
	<div>
	<input name='Email' type='email' spellcheck='false' class='field text medium' value='' maxlength='255'>
	</div>
	</li>

<li id='fo4li9' class='notranslate      '>
	<label class='desc' id='title9' for='Field9'>
		LINE 帳號 (*新竹地區必填)
	</label>
	<div>
	<input name='Line' type='text' class='field text medium' value='' maxlength='255'>
</li>

<li id='fo4li11' class='notranslate'>
	<label class='desc' id='title11' for='Field11'>
		主要活動縣市 (Location)<span id='req_11' class='req'>*</span>
		<br>(您最活躍的主要縣市.)
</label>
	<div>
		<select id='Location_1' onchange='SEL_L1();'>
		<option value='請選擇' selected='selected'>請選擇</option>
		<option value='北部'>北部</option>
		<option value='中部'>中部</option>
		<option value='南部'>南部</option>
		<option value='東部'>東部</option>
		<option value='外島'>外島</option>
		</select>
		<select id='Location_2' name='Location'>
		</select>
	</div>
	
	</li>



<li id='fo4li12' class='notranslate'>
	<label class='desc' id='title12' for='Field12'>
		次要區域(Area)<span id='req_12' class='req'>*</span>
		<br>(請儘量填寫行政區名稱，例如：住在汐止、新店工作、假日會到鳳山、逢年過節會到澎湖、每年有3個月在日本)
	</label>
	<div>
		<input name='Area' type='text' >
</div>

	</li>



<li id='fo4li114' class='notranslate'>
	<legend id='title114' class='desc'>
		您主要的交通方式 (Transportation)*</span>
	</legend>

	<div>
		<span>
	<input id='Field114' name='T1' type='checkbox' class='field checkbox' value='開車' tabindex='7' onchange='handleInput(this);'>
	<label class='choice' for='Field114'>開車</label>
	</span>
		<span>
	<input id='Field115' name='T2' type='checkbox' class='field checkbox' value='騎車' tabindex='8' onchange='handleInput(this);'>
	<label class='choice' for='Field115'>騎車</label>
	</span>
		<span>
	<input id='Field116' name='T3' type='checkbox' class='field checkbox' value='大眾運輸工具' tabindex='9' onchange='handleInput(this);'>
	<label class='choice' for='Field116'>大眾運輸工具</label>
	</span>
		<span>
	<input id='Field117' name='T4' type='checkbox' class='field checkbox' value='腳踏車' tabindex='10' onchange='handleInput(this);'>
	<label class='choice' for='T5'>腳踏車</label>
	</span>
		</div>
	</fieldset>
	</li>



<li id='fo4li14' class='notranslate'>
	<legend id='title14' class='desc'>
		您安裝 Ingress 的設備 (Smart Device)<span id='req_14' class='req'>*</span>
	</legend>

	<div>
		<span>
	<input id='Field14' name='S1' type='checkbox' class='field checkbox' value='Android' tabindex='11' onchange='handleInput(this);'>
	<label class='choice' for='Field14'>Android</label>
	</span>
		<span>
	<input id='Field15' name='S2' type='checkbox' class='field checkbox' value='iPhone/iPad' tabindex='12' onchange='handleInput(this);'>
	<label class='choice' for='Field15'>iPhone/iPad</label>
	</span>
		</div>
	
	<li id='fo4li14' class='notranslate'>
	<legend id='title14' class='desc'>請輸入下圖英字：<span id='req_14' class='req'>*</span>
	</legend>
	<img src="showpic.php" border="0"></p>
	 <input type="text" name="anscheck" size="10" maxlength="10">
	</fieldset>
		
	</li>
	
	
	</li>
	<li class='buttons '>
	<div>
		<input type='hidden' name='currentPage' id='currentPage' value='xWuphZMqqn3aIfpANxPRwuBeJjwdvvLyvJmrlhn5mZ8Lok='>
		<input id='saveForm' name='saveForm' class='btTxt submit' type='submit' value='送出表格' Onclick="$('#pbar').css('display', 'block');">
	</div>
	</li>
	
 
</form>
 <div class="progress" style="display:none" id="pbar">
 <div id="progressbar"><div class="progress-label">Loading...</div></div>
</div>

</div>

</body></html>