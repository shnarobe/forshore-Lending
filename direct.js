function direct(event){
event.preventDefault();
var t=event.target;
var s=$(t).attr("href");
window.location="foreshore.php"+s;



}

window.fbAsyncInit = function() {
    //app id for forshorelending
	FB.init({
      appId      : '462310303894126',
      xfbml      : true,
      version    : 'v2.5'
    });
  };


(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function face(ur){
	//console.log(ur);
	FB.ui(
  {
    method: 'share',
    href: ur,
  },
  // callback
  function(response) {
    /*if (response && !response.error_message) {
      alert('Posting completed.');
    } else {
      alert('Error while posting.');
    }*/
  }
);
	
	
}
