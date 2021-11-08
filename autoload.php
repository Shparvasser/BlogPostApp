<?php
spl_autoload_register(function (string $class) {
	echo "try load: $class" . PHP_EOL;
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	echo "class replaced: $class" . PHP_EOL;
	$path = __DIR__ . "/app/{$class}.php";
	if (is_readable($path)) {
		echo "file was found: $path" . PHP_EOL;
		require $path;
	}
});
