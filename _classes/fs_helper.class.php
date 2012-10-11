<?php

class fs_helper
{
	private function __construct(){}
	
	public static function CacheRemoteFile($url, $forceExtension = false)
	{
		$fn = tempnam(sys_get_temp_dir(), 'fsh');
		
		if (function_exists('curl_init'))
		{
			$ch = curl_init($url);
			$fp = fopen($fn, 'w');

			curl_setopt($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_HEADER, 0);

			curl_exec($ch);
			curl_close($ch);
			fclose($fp);
		}
		else
		{
			file_put_contents($fn, file_get_contents($url));
		}
		
		if ($forceExtension !== false)
			$fn = fs_helper::ChangeExtension($fn, $forceExtension);
			
		return $fn;
	}
	
	public static function ChangeExtension($file, $ext)
	{
		$i = 0;
		
		while (true)
		{
			$new = $file . $i . '.' . $ext;
			if (file_exists($new))
			{
				$i++;
				continue;
			}
			break;
		}
		
		if (rename($file, $new) === false)
			throw exception('Falha ao renomear arquivo');
		
		return $new;
	}
}