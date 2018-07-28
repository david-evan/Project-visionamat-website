<?php
/**
 * Engine
 * Fonction primaire du site web	
*/

class Engine
{
	const LanguageCookieLifeTime = 2592000; // 30 days.
	const Domain = 'visionamat.com';
	/*
	* Définie les constantes de langue en fonction du navigateur, et crée les cookies de mémorisation le cas échéant.
	* Ordre de préférence du langage : setLang - URL - Cookie - User-Agent
	*;
	*/
	public static function defineLanguage()
	{
		if(!isset($_GET['setLang']))
		{
			$subDomain = self::getSubDomain();
			if($subDomain == 'fr' or $subDomain == 'en' or $subDomain == 'localhost')
			{
				if($subDomain != 'localhost')
				{
					$lang = self::setLanguage($subDomain);
					if(!isset($_COOKIE['user_language']))
						setcookie('user_language',$lang,time()+self::LanguageCookieLifeTime, './',self::Domain);
				}
				else
				{
					if(!isset($_COOKIE['user_language']))
					{
						$lang = self::setLanguage($_SERVER['HTTP_ACCEPT_LANGUAGE']{0}.$_SERVER['HTTP_ACCEPT_LANGUAGE']{1});
						setcookie('user_language',$lang,time()+self::LanguageCookieLifeTime, './',self::Domain);
					}
					else
						self::setLanguage($_COOKIE['user_language']);
				}
			}
			else
			{
				if(isset($_COOKIE['user_language']))
					if($_COOKIE['user_language'] == 'fr')
						$lang = self::setLanguage('fr');
					else
						$lang = self::setLanguage('en');
				else
				{
					$lang = self::setLanguage($_SERVER['HTTP_ACCEPT_LANGUAGE']{0}.$_SERVER['HTTP_ACCEPT_LANGUAGE']{1});
					setcookie('user_language',$lang,time()+self::LanguageCookieLifeTime, './',self::Domain);
				}
				header('Location: http://'.$lang.'.'.self::Domain.self::getActualPage());
				exit;
			}
		}
		else
		{
			if($_GET['setLang'] !='fr')
				$lang = self::setLanguage('en');
			else
				$lang = self::setLanguage('fr');
				
			setcookie('user_language',$lang,time()+self::LanguageCookieLifeTime, './',self::Domain);	
			
			if(self::getSubDomain() == 'localhost')
				header('Location: '.self::getActualPage());
			else
				header('Location: http://'.$lang.'.'.self::Domain.self::getActualPage());
			exit;
		}
	}
	
	public static function setLanguage($lang) //return : Langue choisie.
	{
		if($lang == 'fr' or $lang == 'Fr' or $lang == 'FR')
		{
			define ('LANGUAGE', 'fr');
			define ('DATA_GALLERY', 'includes/data/fr.gallery.data.php');
			return 'fr';
		}
		else
		{
			define ('LANGUAGE', 'en');
			define ('DATA_GALLERY', 'includes/data/en.gallery.data.php');
			return 'en';
		}
	}
	
	public static function getTranslation()
	{
		return json_decode(file_get_contents('lang/'.LANGUAGE.'/translate.json'));
	}
	
	public static function getActualPage()
	{
		$url = $_SERVER['REQUEST_URI'];
		$actualPage = explode('?', $url);
		return $actualPage[0];
	}
	
	public static function getSubDomain()
	{
		return array_shift((explode(".",$_SERVER['HTTP_HOST'])));
	}
}
?>