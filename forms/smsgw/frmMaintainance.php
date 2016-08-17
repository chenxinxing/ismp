<script type="application/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
		$("#sgw_link_status").click(function() {
            get_maintainance("link","on");
        });
		
		$("#sgw_running_status").click(function() {
            get_maintainance("running","on");
        });
		
		$("#sgw_start").click(function() {
            get_maintainance("start","on");
        });
		
		$("#sgw_stop").click(function() {
            get_maintainance("stop","off");
        });
	});
</script>
	<h1>SMSGW : Maintenance</h1>
	<div class="breadcrumb">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">SMSGW</a></li>
		</ul>
	</div>
	<div class="content">
		<div class="halfpan fl">
			<label>SMSGW Log </label>
            <a href="#inline1" class="fancybox" id="sgw_link_status"><input type="button" value="Log" /></a>
			<label>SMSGW Running Status</label>
			<a href="#inline1" class="fancybox" id="sgw_running_status"><input type="button"  value="Status" /></a>
			<label>Start SMSGW</label>
       		<a href="#inline1" class="fancybox" id="sgw_start"><input type="button"  value="Start" /></a>
			<label>Stop SMSGW</label>
			<a href="#inline1" class="fancybox2" id="sgw_stop"><input type="button"  value="Stop" /></a>
		</div>
		<div class="clear"></div>
        <input type="hidden" name="gateway" value="smsgw" id="gateway" />
        <input type="hidden" name="status" value="" id="status" />
	</div>
    <div id="inline1" style="width:400px;display: none;"></div>