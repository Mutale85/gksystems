<!-- Site footer 0769 183124-->
<footer class="site-footer">
    <div class="container">
        <div class="row">
          	<div class="col-sm-12 col-md-6">
            	<h6>About Us</h6>
            	<p class="text-justify text-white">Certified Debt Collecotrs and Bailiffs and specialist in speedy recovery of monies owed to our clients.</p>
          	</div>

          	<div class="col-xs-6 col-md-3">
            	<h6>Contact Us</h6>
	            <ul class="footer-links">
					<li>Phone: 0974 519 300 | 0979 152 878 | 0977 267 982</li>
	          		<li>Email: info@bulwarkdebtcollectors.com</li>
	            </ul>
          	</div>

          	<div class="col-xs-6 col-md-3">
            	<h6>Address</h6>
            	<ul class="footer-links">
              		<address>
              			Plot #110A/72,
              			Vila Elizabeth, 
              			Lusaka,
              			Zambia
              		</address>
            	</ul>
          	</div>
        </div>
        <hr>
    </div>
      <div class="container">
        <div class="row">
          	<div class="col-md-8 col-sm-6 col-xs-12">
            	<p class="copyright-text">Copyright &copy; <?php echo date("Y")?> All Rights Reserved by 
         			<a href="access/">Bulwark Debt Collecotrs</a>.
            	</p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
				<li></li>  
            </ul>
          </div>
        </div>
      </div>
</footer>
<style>
	.site-footer{
		background-color:#26272b;
		padding:45px 0 20px;
		font-size:15px;
		line-height:24px;
		color:#737373;
	}
	.site-footer hr
	{
	border-top-color:#bbb;
	opacity:0.5
	}
	.site-footer hr.small
	{
	margin:20px 0
	}
	.site-footer h6
	{
	color:#fff;
	font-size:16px;
	text-transform:uppercase;
	margin-top:5px;
	letter-spacing:2px
	}
	.site-footer a
	{
	color:#737373;
	}
	.site-footer a:hover
	{
	color:#3366cc;
	text-decoration:none;
	}
	.footer-links
	{
	padding-left:0;
	list-style:none
	}
	.footer-links li
	{
	display:block
	}
	.footer-links a
	{
	color:#737373
	}
	.footer-links a:active,.footer-links a:focus,.footer-links a:hover
	{
	color:#3366cc;
	text-decoration:none;
	}
	.footer-links.inline li
	{
	display:inline-block
	}
	.site-footer .social-icons
	{
	text-align:right
	}
	.site-footer .social-icons a
	{
	width:40px;
	height:40px;
	line-height:40px;
	margin-left:6px;
	margin-right:0;
	border-radius:100%;
	background-color:#33353d
	}
	.copyright-text
	{
	margin:0
	}
	@media (max-width:991px)
	{
	.site-footer [class^=col-]
	{
	margin-bottom:30px
	}
	}
	@media (max-width:767px)
	{
	.site-footer
	{
	padding-bottom:0
	}
	.site-footer .copyright-text,.site-footer .social-icons
	{
	text-align:center
	}
	}
	.social-icons
	{
	padding-left:0;
	margin-bottom:0;
	list-style:none
	}
	.social-icons li
	{
	display:inline-block;
	margin-bottom:4px
	}
	.social-icons li.title
	{
	margin-right:15px;
	text-transform:uppercase;
	color:#96a2b2;
	font-weight:700;
	font-size:13px
	}
	.social-icons a{
	background-color:#eceeef;
	color:#818a91;
	font-size:16px;
	display:inline-block;
	line-height:44px;
	width:44px;
	height:44px;
	text-align:center;
	margin-right:8px;
	border-radius:100%;
	-webkit-transition:all .2s linear;
	-o-transition:all .2s linear;
	transition:all .2s linear
	}
	.social-icons a:active,.social-icons a:focus,.social-icons a:hover
	{
	color:#fff;
	background-color:#29aafe
	}
	.social-icons.size-sm a
	{
	line-height:34px;
	height:34px;
	width:34px;
	font-size:14px
	}
	.social-icons a.facebook:hover
	{
	background-color:#3b5998
	}
	.social-icons a.twitter:hover
	{
	background-color:#00aced
	}
	.social-icons a.linkedin:hover
	{
	background-color:#007bb6
	}
	.social-icons a.dribbble:hover
	{
	background-color:#ea4c89
	}
	@media (max-width:767px)
	{
	.social-icons li.title
	{
	display:block;
	margin-right:0;
	font-weight:600
	}
	}
</style>
<script type="text/javascript">
 //   (function(){
	// var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	// s1.async=true;
	// s1.src='https://weblister.co/js/js.js';
	// s1.charset='UTF-8';
	// s1.setAttribute('crossorigin','*');
	// s0.parentNode.insertBefore(s1,s0);
	// })();
</script>

<script>
    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(this).toggleClass("is-active");
        });
    });
  	$(document).on("click", ".cookiesAgree", function(e){
      e.preventDefault();
      var cvalue = "newCookieBanner";
      var cname = "newCookieBanner";
        newCookieBannerSet(cname, cvalue);
        setTimeout(function(){
          $(".cookie-consent-banner").hide("slow");
          window.location = "./";
        }, 500);
    })
  	function newCookieBannerSet(cname, cvalue) {
        event.preventDefault();    
        const d = new Date();
        d.setTime(d.getTime() + (30*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    $('a[href*="#"]')
  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
    
</script>	