<?php 

function outputIframe() { ?>
	<script type="text/javascript" src="wp-content/plugins/advanced-iframe/js/ai.js"></script>
	<script type="text/javascript" src="wp-content/plugins/advanced-iframe/js/ai_external.js"></script>
	<script type="text/javascript">
	                
		var ai_iframe_width_advanced_iframe = 0;
		var ai_iframe_height_advanced_iframe = 0;
		var aiIsIe8 = false;
		var aiReadyCallbacks = (typeof aiReadyCallbacks != 'undefined' && aiReadyCallbacks instanceof Array) ? aiReadyCallbacks : [];
		var onloadFiredadvanced_iframe = false; function aiShowIframe() {
			jQuery("#advanced_iframe").css("visibility", "visible");
		}
		function aiShowIframeId(id_iframe) {
			jQuery(id_iframe).css("visibility", "visible");
		}
		function aiResizeIframeHeight(height) {
			aiResizeIframeHeight(height, advanced_iframe);
		}
		function aiResizeIframeHeightId(height, width, id) {
			aiResizeIframeHeightById(id, height);
		}
	</script>
	<iframe id="advanced_iframe" name="advanced_iframe" src="https://stage-hampshire.pps.tractivity.co.uk" width="100%" height="1250px" scrolling="no" frameborder="0" border="0" allowtransparency="true" style="opacity: 1; visibility: visible;"></iframe>
	<script type="text/javascript">var ifrm_advanced_iframe = document.getElementById("advanced_iframe");</script>
	<script type="text/javascript">
		var hiddenTabsDoneadvanced_iframe = false;
		function resizeCallbackadvanced_iframe() { }
	</script>
	<?php
} 
