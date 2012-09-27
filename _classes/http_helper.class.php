<?phpclass http_helper{	private function __construct(){}		public static function header_redirect($url, $exit = false)	{		if (!headers_sent())			header('Location: ' . $url);				if ($exit)			exit;	}		public static function js_redirect($url, $exit = false)	{		?>		<script type="text/javascript">
		//<![CDATA[
		document.location.href = <?php echo json_encode($url); ?>;
		//]]>
		</script>		<?php		if ($exit)			exit;	}}