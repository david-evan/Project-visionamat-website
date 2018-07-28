<?php
// Data loader
include_once (DATA_GALLERY);
/**
 *Downloader
 *Permet de créer les boutons de téléchargement et de gérer l'ensemble des fichiers (et photos) à télécharger du site web.
*/
 /* Code d'erreurs :
	- 100 -> Ressource inexistante
	- 200 -> Dossier interdit / inexistant
	- 400 -> Code d'erreur inexistant
*/
class Downloader
{
	private $URLData;
	private $File;

	public function __construct($url)
	{
		$this->URLData = $this->cleanURL($url);
		$this->getFileObject();
	}

	public function startDownload()
	{
		$this->File->downloadFile();
	}

	private function getFileObject()
	{
		$urlParser =  new DownloaderURLParser($this->URLData);
		$this->File = $urlParser->getFileByURL();
	}

	private function cleanURL($url)
	{
		$dl_file = filter_var($url, FILTER_SANITIZE_URL); // Remove (more) invalid characters

		return $dl_file;
	}
}

/**
* ImageDownloader
* Gestonnaire de téléchargement pour les images
*/

class ImageDownloader
{
	public $Directory;
	public $FileName;

	private $FullPath;
	private $Category;

	const CommonDir = './media/public/photos/fullhd/';
	const PortfolioDir = 'portfolio/';
	const IndexDir = 'index/';
	const GalleryDir = 'gallery/';

	public function downloadFile()
	{
		ignore_user_abort(true);
		set_time_limit(0);

		$this->findPath();

		if(!file_exists($this->FullPath))
			$Error = new DownloaderError(100);

		if ($fd = fopen($this->FullPath, "r"))
		{
			$fsize = filesize($this->FullPath);
			$name = 'DSC_'.rand(1000,9999);

			header("Content-type: application/octet-stream");
			header("Content-Disposition: filename=\"".$name.".jpg\"");

			header("Content-length: $fsize");
			header("Cache-control: private"); //use this to open files directly
			while(!feof($fd)) {
				$buffer = fread($fd, 2048);
				echo $buffer;
			}
		}
		else
			$Error = new DownloaderError(100);

		fclose ($fd);
		exit;
	}

	private function findPath()
	{
		if(!empty($this->Category))
		{
			if($this->Directory == DownloaderURLParser::PortfolioGalleryDirName)

				$this->FullPath = self::CommonDir.self::PortfolioDir.self::getImageByName(DownloaderURLParser::PortfolioGalleryDirName, $this->FileName, $this->Category);

			elseif($this->Directory == DownloaderURLParser::GalleriesDirName)
				$this->FullPath = self::CommonDir.self::GalleryDir.self::getImageByName(DownloaderURLParser::GalleriesDirName, $this->FileName, $this->Category);

		}
		else
			$this->FullPath = self::CommonDir.self::IndexDir.self::getImageByName(DownloaderURLParser::IndexGalleryDirName, $this->FileName);
	}

	public static function getImageByName($directory, $name, $category = false)
	{
		include_once(DATA_GALLERY);

		if(!$category and ALLOW_INDEX_DL)
		{

			$files = GalleryData::getIndexGalleryData();
			foreach ($files as $file)
				if($file['caption']['captionId'] == $name)
					return $file['link'];
			$Error = new DownloaderError(100);
		}
		elseif($category)
		{
			if($directory == DownloaderURLParser::PortfolioGalleryDirName and ALLOW_PORTFOLIO_DL)
			{
				$dirName = self::PortfolioDir;
				$Galleries = GalleryData::getPortfolioGalleryData();
			}
			elseif($directory == DownloaderURLParser::GalleriesDirName and ALLOW_GALLERIES_DL)
			{
				$dirName = self::GalleryDir;
				$Galleries = GalleryData::getGalleryForGalleryPageData();
			}
			else
				$Error = new DownloaderError(200);

			foreach($Galleries as $Gallery)
				if($Gallery['directory'] == $category)
					foreach($Gallery['photos'] as $file)
						if($file['link'] == $name)
							return $category.'/'.$file['link'];

			$Error = new DownloaderError(100);
		}
		else
			$Error = new DownloaderError(200);
	}

	public function setCategory($category)
	{
		$this->Category = $category;
	}

	public function setDirectory($directory)
	{
		$this->Directory = $directory;
	}

	public function setFileName($fileName)
	{
		$this->FileName = $fileName;
	}
}


/**
*URLParser
*Outils d'analyse URL pour récupérer
*
* Structure de l'URL :
* - /index-gallery/image-name
* - /portfolio-gallery/category/image-name
* - /galleries/category/image
* - /files/name.ext
**/

class DownloaderURLParser
{
	const IndexGalleryDirName = 'index-gallery';
	const PortfolioGalleryDirName = 'portfolio-gallery';
	const GalleriesDirName = 'galleries';
	const FilesDirName = 'files';

	private $url;
	private $AuthorizedDirectory;

	public function __construct($url)
	{

		$this->AuthorizedDirectory =  array( self::IndexGalleryDirName,
											 self::PortfolioGalleryDirName,
											 self::GalleriesDirName,
											 self::FilesDirName);



		$this->url = $url;

	}

	/* @return : true : Ok / false : Error*/
	public function getFileByURL()
	{
		$hashTagData = explode('/', $this->url);
		array_shift($hashTagData); // Suppression du blanc en début

		if(!in_array($hashTagData[0], $this->AuthorizedDirectory)){
			 $Error = new DownloaderError(200);
		}
		if($hashTagData[0] == self::IndexGalleryDirName)
		{
			$ImageDownloader = new ImageDownloader();
			$ImageDownloader->Directory = self::IndexGalleryDirName;
			$ImageDownloader->FileName = $hashTagData[1];
			return $ImageDownloader;
		}
		elseif($hashTagData[0] == self::PortfolioGalleryDirName or $hashTagData[0] == self::GalleriesDirName)
		{
			$ImageDownloader = new ImageDownloader();

			if($hashTagData[0] == self::PortfolioGalleryDirName)
				$ImageDownloader->setDirectory(self::PortfolioGalleryDirName);
			else
			$ImageDownloader->setDirectory(self::GalleriesDirName);

			$ImageDownloader->setCategory($hashTagData[1]);
			$ImageDownloader->setFileName($hashTagData[2]);

			return $ImageDownloader;
		}
		else
		{
			// Implémenter gestionnaire de téléchargement de fichiers (ex: pdf);
			$Error = new DownloaderError(300);
		}
	}
}

class DownloaderError
{
	private $ErrorMessage;
	private $ErrorCode;
	private $AuthorizedErrorCode = array(100, 200, 400);

	const ErrorCode100 = 'Fichier inexistant';
	const ErrorCode200 = 'Dossier interdit';
	const ErrorCode300 = 'Type de fichier non pris en charge';
	const ErrorCode400 = 'Code d\'erreur inexistant';


	public function __construct($errorCode, $autoThrow = true)
	{
		$this->ErrorCode = $errorCode;
		$this->getErrorMessage();
		if($autoThrow)
			$this->throwError();
	}

	public function throwError()
	{
		exit($this->ErrorMessage);
	}

	public function getErrorMessage()
	{
		$ErrorMessages = array ( 100 => self::ErrorCode100,
							     200 => self::ErrorCode200,
								 300 => self::ErrorCode300,
								 400 => self::ErrorCode400);

		if(!in_array($this->ErrorCode, $this->AuthorizedErrorCode))
		{
			 $Error = new DownloaderError(400);
		}

		$this->ErrorMessage = $ErrorMessages[$this->ErrorCode];
	}
}

?>
