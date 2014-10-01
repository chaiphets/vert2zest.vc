<div class="col-xs-12 col-md-12">
	<h3>Action perform successfully</h3>
	<h4>You will be redirected to previous page within 3 sec.</h4>
</div>

<script type="text/javascript">
	function redirect(){
		document.location.href = document.referrer;
	}
	setTimeout('redirect()',3000);
</script>