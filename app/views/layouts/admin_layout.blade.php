<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.head_html')
	<script>

	function startTime() {
		var m_names = new Array("Januari", "Februari", "Maret", 
			"April", "Mei", "Juni", "Juli", "Agustus", "September", 
			"Oktober", "November", "Desember");

		var today=new Date();
		var mo=today.getMonth();
		var da=today.getDate();
		var y=today.getFullYear();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		m = checkTime(m);
		s = checkTime(s);
		document.getElementById('f_clock').innerHTML = da+" "+m_names[mo]+" "+y+" - "+h+":"+m+":"+s;
		var t = setTimeout(function(){startTime()},500);
	}

	function checkTime(i) {
		    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
		    return i;
		}
		</script>

	<style>
	.f_loader_container {
		position: fixed !important;
		width: 100vw;
		height: 100vh;
		top: 0;
		left: 0;
		background-color: rgba(255,255,255,0.8);
		z-index: 999999999999;
	}
	.s_photos {
		/* Prevent vertical gaps */
		line-height: 0;
		-webkit-column-count: 2;
		-webkit-column-gap:   0px;
		-moz-column-count:    2;
		-moz-column-gap:      0px;
		column-count:         2;
		column-gap:           0px;
	}
	.s_photos img {
		/* Just in case there are inline attributes */
		width: 100% !important;
		height: auto !important;
	}
	@media (max-width: 1200px) {
		.s_photos {
			-moz-column-count:    2;
			-webkit-column-count: 2;
			column-count:         2;
		}
	}
	@media (max-width: 1000px) {
		.s_photos {
			-moz-column-count:    2;
			-webkit-column-count: 2;
			column-count:         2;
		}
	}
	@media (max-width: 800px) {
		.s_photos {
			-moz-column-count:    2;
			-webkit-column-count: 2;
			column-count:         2;
		}
	}
	@media (max-width: 400px) {
		.s_photos {
			-moz-column-count:    1;
			-webkit-column-count: 1;
			column-count:         1;
		}
	}
	.spinner {
		margin: 100px auto;
		width: 50px;
		height: 30px;
		text-align: center;
		font-size: 10px;
	}
	.spinner > div {
		background-color: #333;
		height: 100%;
		width: 6px;
		display: inline-block;
		-webkit-animation: stretchdelay 1.2s infinite ease-in-out;
		animation: stretchdelay 1.2s infinite ease-in-out;
	}
	.spinner .rect2 {
		-webkit-animation-delay: -1.1s;
		animation-delay: -1.1s;
	}
	.spinner .rect3 {
		-webkit-animation-delay: -1.0s;
		animation-delay: -1.0s;
	}
	.spinner .rect4 {
		-webkit-animation-delay: -0.9s;
		animation-delay: -0.9s;
	}
	.spinner .rect5 {
		-webkit-animation-delay: -0.8s;
		animation-delay: -0.8s;
	}
	@-webkit-keyframes stretchdelay {
		0%, 40%, 100% { -webkit-transform: scaleY(0.4) }
		20% { -webkit-transform: scaleY(1.0) }
	}
	@keyframes stretchdelay {
		0%, 40%, 100% {
			transform: scaleY(0.4);
			-webkit-transform: scaleY(0.4);
			}  20% {
				transform: scaleY(1.0);
				-webkit-transform: scaleY(1.0);
			}
		}
	</style>	
	</head>
	<body>
		<!-- <div class="s_orenji_header">
	</div> -->
	<div class="f_loader_container hidden">
		<div class="s_tbl">
			<div class="s_cell">
				<div class="spinner">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="s_top_header">
		<div class="container-fluid">
			<div class="row">
				<div class="g-lg-4">
					<!-- <img src="" height="50" width="50" style="float: left; margin-right:20px; margin-top: 10px;"/> -->
					<h2 style="margin-left:20px;">Toko Asia Jaya</h2>
				</div>
				<div class="g-lg-8" style="line-height: 69px; text-align: right;">
					
					@if(Auth::user() != null)
					Hello,
					@if(Auth::user()->role == 1)
					Owner
					@elseif(Auth::user()->role == 2)
					Manager
					@else
					Sales
					@endif
					| 
					<a href="#" id="logOutText">log out</a>
					<script>
					$('body').on('click','#logOutText',function(){
						
						$.ajax({
							type: 'POST',
							url: '{{URL::route('david.post_sign_out')}}',
							data: {

							},
							success: function(response){
								if(response == "OK")
								{
									window.location.href="{{URL::route('login.desktop')}}";
								}
								else
								{
									
								}
							},error: function(xhr, textStatus, errorThrown){
								alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
								alert("responseText: "+xhr.responseText);
							}
						},'json');
					});
					</script>
					@endif

					
					
				</div>
			</div>
		</div>
	</div>
	
	@include('includes.navigation.admin')
	
	<div id="yield_content" class="s_content_admin">
		@yield('content')
	</div>
	
	<script type="text/javascript">
	function updateSize(){
				// Get the dimensions of the viewport
				var width = $(window).width();
				var height = $(window).height();
				var iHeight = $(window).height() - 270;
				
				$('.s_set_height_window').height(iHeight);
				//$('.irashai').width(width);
				//$('.willkommen').width($('.irashai').width()/2);
				//$('.willkommen').height(height);
				//$('body').css('overflow-x','hidden');//.css('overflow-x','visible');
				//$('body').mousewheel(function(event, delta) {
				//	this.scrollLeft -= (delta * 50);
				//	event.preventDefault();
				//});
};
$(document).ready(updateSize);
$(window).resize(updateSize);
</script>
<script>
var timeout    = 500;
var closetimer = 0;
var ddmenuitem = 0;

function jsddm_open()
{  jsddm_canceltimer();
	jsddm_close();
	ddmenuitem = $(this).find('ul').css('visibility', 'visible');}

	function jsddm_close()
	{  if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

	function jsddm_timer()
	{  closetimer = window.setTimeout(jsddm_close, timeout);}

	function jsddm_canceltimer()
	{  if(closetimer)
		{  window.clearTimeout(closetimer);
			closetimer = null;}}

			$(document).ready(function()
				{  $('.s_top_nav > li').bind('mouseover', jsddm_open)
				$('.s_top_nav > li').bind('mouseout',  jsddm_timer)});

			document.onclick = jsddm_close;
			</script>

			<script>
			//Resetter input[type=text] untuk seluruh modal
			$('.modal').on('hidden.bs.modal', function (e) {
			  //alert('modal closed');
			  //-- fungsi untuk me-reset sluruh input[type=text] pada modal --
			  $(this).find('input[type=text]').val('');
			});

			//number saja pleas
			$(document).ready(function() {
				$(".ff_num_only").keydown(function(event) {
					// Allow only backspace and delete
					if ( event.keyCode == 46 || event.keyCode == 8 ) {
						// let it happen, don't do anything
					}
					else {
						// Ensure that it is a number and stop the keypress
						if (event.keyCode < 48 || event.keyCode > 57 ) {
							event.preventDefault();	
						}	
					}
				});
			});
			
			startTime();
			</script>
			<style>
			
				</style>
			</body>
			</html>