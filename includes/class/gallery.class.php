<?php
// Data loader
include(DATA_GALLERY);
/**
 *SimpleGallery
 *Galerie simple chargée à partir d'un dossier, sans description ni commentaire.
 *Peut-être surchargée pour la rendre plus complexe
 */
class Gallery
{
    protected $FullSizeDirectory;
    protected $ThumbDirectory;

    protected $Gallery;

    protected function createGallery()
    {

        $Gallery = scandir($this->FullSizeDirectory);

        //Suppression des éléments '.' et '..'
        array_splice($Gallery, 0, 2);

        $this->Gallery = $Gallery;
    }

    public function getGallery()
    {
        return $this->Gallery;
    }

    public function getFullSizeDirectory()
    {
        return $this->FullSizeDirectory;
    }

    public function getThumbDirectory()
    {
        return $this->ThumbDirectory;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}

/**
 * FooterGallery
 * Class hérité de Gallery permettant de créer la gallery de bas de page
 */
class FooterGallery extends Gallery
{
    public function __construct()
    {
        $this->FullSizeDirectory = DIR_FOOTER_FULLSIZE;
        $this->ThumbDirectory = DIR_FOOTER_THUMB;

        $this->createGallery();

        if(SHUFFLE_FOOTER_PHOTOS) 
            shuffle($this->Gallery);
    }
}

/**
 * AboutMeGallery
 * Class hérité de Gallery pour la galerie de la page "A propos"
 */
class AboutMeGallery extends Gallery
{
    public function __construct()
    {
        $this->FullSizeDirectory = DIR_ABOUTME_FULLSIZE;
        $this->ThumbDirectory = DIR_ABOUTME_THUMB;

        $this->createGallery();

        if(SHUFFLE_ABOUTME_PHOTOS) 
            shuffle($this->Gallery);
    }
}

/**
 * IndexGallery 
 * Surcharge les méthodes de Gallery pour l'adapter à la galerie de page d'accueil
 */
class IndexGallery extends Gallery
{
    public function __construct()
    {
        $this->FullSizeDirectory = DIR_INDEX_FULLSIZE;
        $this->ThumbDirectory = DIR_INDEX_THUMB;

        $this->createGallery();

        if(SHUFFLE_INDEX_PHOTOS) 
            shuffle($this->Gallery);
    }

    public function createGallery()
    {
        $this->Gallery = IndexGallery::getIndexGallery();
    }

    public static function getIndexGallery()
    {
		$Gallery = GalleryData::getIndexGalleryData();
        return $Gallery;
    }
}

/**
 * PortfolioGallery
 * Surcharge les méthodes de Gallery pour l'adapter à la galerie du portfolio
 */
class PortfolioGallery extends Gallery
{
    public function __construct()
    {
        $this->FullSizeDirectory = DIR_PORTFOLIO_FULLSIZE;
        $this->ThumbDirectory = DIR_PORTFOLIO_THUMB;

        $this->createGallery();
    }

    public function createGallery()
    {
        $this->Gallery = PortfolioGallery::getPortfolioGallery();
    }

    public static function getPortfolioGallery()
    {
		 $PortfolioGallery = GalleryData::getPortfolioGalleryData();
        return $PortfolioGallery;
    }
}

/**
 * GalleryForGalleryPage
 * Surcharge les méthodes de Gallery pour l'adapter aux galleries de la page "Galeries"
 */
class GalleryForGalleryPage extends Gallery
{
    public function __construct()
    {
        $this->FullSizeDirectory = DIR_GALLERY_FULLSIZE;

        $this->createGallery();

        if(SHUFFLE_GALLERY_PHOTOS) 
            shuffle($this->Gallery);
    }

    public function createGallery()
    {
        $this->Gallery = GalleryForGalleryPage::getGalleryForGalleryPage();
    }

    public static function getGalleryForGalleryPage()
    {
		$Gallery = GalleryData::getGalleryForGalleryPageData();
		return $Gallery;
    }
}