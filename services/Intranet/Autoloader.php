<?php
namespace Intranet;
/**
 * Class IntranetAutoloader
 * Autoloader des classes de l'intranet dans /public_html/script/class/ ou dans le modèle MVC
 */
class Autoloader {
    /**
     * Autoloader
     * @param $className
     */
    protected static function autoload($className) {
        // on explose notre variable $class par \ (namespace)
        $parts = explode('\\',$className);
        // on extrait le dernier element
        $className = array_pop($parts);
        //Modèle MVC
        //Config
        if(!defined('ROOT_DIRECTORY'))
            define('ROOT_DIRECTORY','/media/intranet');
        $iniFile = ROOT_DIRECTORY.'/config/app.ini';
        if (file_exists($iniFile)) {
            // chargement du fichier de configuration
            $parameters = parse_ini_file($iniFile);
            //Pour chaque dossier du MVC
            foreach(array($parameters['controller'],$parameters['entities'],$parameters['services']) as $directory) {
                $filePath = ROOT_DIRECTORY.DIRECTORY_SEPARATOR.$directory.(sizeof($parts) ? implode(DIRECTORY_SEPARATOR, $parts).DIRECTORY_SEPARATOR:'').$className . '.php';
                if (file_exists($filePath)) {
                    require_once($filePath);
                    break;
                }
            }
        }
    }

    /**
     * Enregistrement de l'autoloader
     */
    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
}
Autoloader::register();