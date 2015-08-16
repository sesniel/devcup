<?php
echo $this->Html->doctype('html5'), "\n";
?>
<html lang="en">
	<head>
		<title><?php echo $title_for_layout; ?></title>
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />
		<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(
			array(
				'bootstrap.min',
				'style'
			),
			null,
			array('media' => 'screen')
		);

		?>

	</head>
	<body class="has-js">
            <?php echo $this->element('header.nav'); ?>
                <div class="container">
                    <?php echo $this->fetch('content'); ?>
		</div>

		<?php
		echo $this->Html->script(array(
			'//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
                        'https://code.jquery.com/jquery-2.1.4.js',
			'bootstrap.min',
			'jquery'
		));
		?>
	</body>
</html>
