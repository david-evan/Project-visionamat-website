<?php
/**
 * Template
 * Moteur de gestions des templates et de la mise en cache
*/

class Template
{
	const TemplateDirectory = './templates/';
	const CacheDirectory = './templates/cache/';
	
	private $FileName; 
	private $CacheFile;
	private $TemplateFile;
	private $CacheTimeValidity; // 0 = Infini
	private $DisableCache;
	
	
	public function __construct($fileName, $cacheTimeValidity = 0, $disableCache = false) 
	{
		$this->FileName = $fileName;
		$this->CacheTimeValidity = $cacheTimeValidity;
		$this->TemplateFile = self::TemplateDirectory.$this->FileName.'.tpl.php';
		$this->CacheFile = self::CacheDirectory.LANGUAGE.'.'.$this->FileName.'.cache';
		$this->DisableCache = $disableCache;
		
		$this->getTemplate();
	}
	
	public function getTemplate()
	{	
		if(CACHE_ACTIVATION && !$this->DisableCache)
			$this->getCache();
		else
		{
			global $PageName, $ActivateBigFooter;
			$Translation = Engine::getTranslation();
			include($this->TemplateFile);
		}
	}
	
	private function getCache()
	{
		if(!file_exists($this->CacheFile))
			 $this->createCache();
		else
		{
			if($this->CacheTimeValidity > 0)
			{
				if(filemtime($this->CacheFile) < time() - $this->CacheTimeValidity)
					$this->createCache();
				else
					echo file_get_contents($this->CacheFile);	
			}
			else
				echo file_get_contents($this->CacheFile);	
		}
	}
	
	private function createCache()
	{
		global $PageName, $ActivateBigFooter;
			$Translation = Engine::getTranslation();
			ob_start();
			include($this->TemplateFile);
			file_put_contents($this->CacheFile, self::cleanCacheContent(ob_get_flush()));
	}
	
	public static function cleanCacheContent($cacheContent)
	{
		$cacheContent = preg_replace('#\s+#', ' ', $cacheContent);					 // Remove multiline
		$cacheContent = preg_replace('#<!--(?!<!)[^\[>].*?-->#', '', $cacheContent); // Remove HTML comments
		$cacheContent = preg_replace('#\/\*[\s\S]*?\*\/#', '', $cacheContent); 		// Remove Javascript comments
		return $cacheContent;
	}
	
	public static function destroyCache($cacheFileName)
	{
		@unlink(self::CacheDirectory.LANGUAGE.'.'.$cacheFileName.'.cache');
	}
}
?>