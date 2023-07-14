<style type="text/css">
	nav {
		background: red url(/alerticon.png) left no-repeat;
		background-position: 15px;
		color: white;
		text-align: center;
		position: fixed;
		top: 30%;
		left: 0;
		width: 100%;
	}

	.code {
		padding: 7px;
		font-size: 23px;
	}

	.clickmoi {
		border: 0px;
		padding: 10px;
		font-size: 23px;
		border-radius: 2px;
		color: white;
		background: blue;
		cursor: pointer;
	}
</style>
<nav>
	<div style="margin:auto; text-align:center;">
		<h3>FireWall activated.</h3>
		<form method="post" name="<?= $xac_minh; ?>">
			<input type="hidden" name="<?= $_SESSION['maxacminh']; ?>" value="JnYHSNp">
			<img height="130" width="400" src="fw/baove"><br>
			<h2> Bạn còn <?= ($_SESSION['marobot'] + 1); ?> thử(s)</h2>
			<input type="text" name="valCAPTCHA" class="code" placeholder="Nhập mã xác minh.">
			<input type="button" class="clickmoi" onclick="go()" value="Xác Nhận">
		</form>
	</div>
</nav>
<script type="text/javascript">
	function go() {
		document.<?= $xac_minh; ?>.submit();
	}
</script>