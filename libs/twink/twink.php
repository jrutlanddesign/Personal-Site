<?php
require 'libs/twig/lib/Twig/Autoloader.php';
require 'libs/parsedown/Parsedown.php';

Twig_Autoloader::register();

class twink {

    // Default Variables
    private $settings = array();
    private $svr = "";
    private $contentPath = "";
    private $twig = null;
    private $currentRequest = "";
    private $defaults = array(
        "content" => "content/",
        "templates" => "templates/",
        "blog_tag_overview" => "blog-tags"
    );

    private $twigFilters = array(
        'get_link',
        'markdown'
    );

    function __construct($twigConfig = array()){
        // Setting up and applying defaults
        if(empty($twigConfig)){
            // If nothing is supplied
            $contentPath = $this->defaults['content'];
            $templatePath = $this->defaults['templates'];
        } else {
            // if only a few are supplied
            $contentPath = (isset($twigConfig['content'])) ? $twigConfig['content'] : $defaults['content'];
            $contentPath = (isset($twigConfig['templates'])) ? $twigConfig['templates'] : $defaults['templates'];
        }

        $this->settings['ROOT'] = str_replace('index.php', '', $_SERVER['PHP_SELF']);
        $this->svr = $_SERVER['DOCUMENT_ROOT'].$this->settings['ROOT'];
        $this->settings['site'] = $this->getSinglePageInfo($this->svr.'config');
        $this->contentPath = $this->svr.$contentPath;
        $this->twig = new Twig_Environment( 
            new Twig_Loader_Filesystem($this->svr.$templatePath.$this->settings['site']['selected_template'])
        );

        // Setting up initial filters from twink
        foreach($this->twigFilters as $filter){
            $twigFilter = new Twig_SimpleFilter($filter, array('twink', $filter));
            $this->twig->addFilter($twigFilter);
        }
    }

    public function resolveURL(){
        $count = 1;
        $req = preg_replace('#'.$this->root().'#', "", $_SERVER['REQUEST_URI'], $count);
        
        $content = null;
        $req = ($req === '') ? 'home' : htmlspecialchars($req);
        $this->currentRequest = $req;

        if(is_dir($this->contentPath.$req)){
            $content = $this->getDirPage($req);
        } else {
            $content = $this->getSinglePageInfo($req);
        }
        
        if($req == 'home'){
            $currentPage = $req;
        } else {
            $currentPage = explode('/', $req);
            $currentPage = $currentPage[count($currentPage) - 1];
        }

        if($content === null){
            $this->settings['currentPage'] = '404';
            return false;
        } else {
            $this->settings['page'] = $content;
            $this->settings['currentPage'] = $currentPage;
            return true;
        }

    }

    public function root(){
        return $this->settings['ROOT'];
    }

    private function getSinglePageInfo($filePath, $filetype = "json"){
        $path = $this->resolve_link($filePath, $filetype);
        
        $files = explode('/', $filePath);
        $overviewPage = ($files[0] == $files[1]);

        
        if(strpos($filePath, 'blog') !== false && !$overviewPage){

            if(strpos($filePath, '/tag/')){
                $requested_tag = explode('/',$filePath);
                $requested_tag = str_replace('-', ' ' , $requested_tag[count($requested_tag) - 1]);

                $blogs = array();
                $blogTitles = $this->getDirListing($this->contentPath.'/blog/');
                foreach($blogTitles as $blogTitle){
                    $found = false;
                    $blog = file_get_contents($this->contentPath.'/blog/'.$blogTitle);
                    preg_match_all("/{(.*)}/", $blog, $matches);
                    $markdown = $matches[0];
                    $blog = explode($markdown[0], str_replace($markdown[1],"",$blog));
                    $content = json_decode(trim($blog[0]), true);
                    if(!isset($content['tags']) || empty($content['tags'])) continue;
                    foreach($content['tags'] as $tag){
                        if(strtolower($requested_tag) == strtolower($tag)) $found = true;
                    }
                    if(!$found) continue;
                    $content['markdown'] = trim($blog[1]);
                    $excerpt = substr(trim($blog[1]),0,strpos(trim($blog[1])," ", 300));
                    $excerpt = (strlen($excerpt) >= 300) ? $excerpt.'..' : $excerpt;
                    $content['excerpt'] = $excerpt;
                    $content['link'] = $this->get_link('blog/'.$blogTitle);
                    array_push($blogs, $content);
                }
                if(empty($blogs)) return;
                $content = array();
                $content['template'] = $this->defaults['blog_tag_overview'];
                $content['tag'] = $requested_tag;
                $content['title'] = 'Blog Articles Tagged '.$requested_tag;
                $content['articles'] = $blogs;

            } else {
                if(!file_exists($path)) return null;
                $blogContent = file_get_contents($path);
                preg_match_all("/{(.*)}/", $blogContent, $matches);
                $markdown = $matches[0];
                
                $blogContent = explode($markdown[0], str_replace($markdown[1],"",$blogContent));
                $content = json_decode(trim($blogContent[0]), true);
                $content['markdown'] = trim($blogContent[1]);
                $excerpt = substr(trim($blogContent[1]),0,strpos(trim($blogContent[1])," ", 300));
                $excerpt = (strlen($excerpt) >= 300) ? $excerpt.'..' : $excerpt;
                $content['excerpt'] = $excerpt;

            }

        } else {
            if(!file_exists($path)) return null;
            $content = json_decode(file_get_contents($path), true);
        }
        if(isset($content['uses'])) $content['dependencies'] = $this->getDependencies($content['uses']);
        return $content;
    }

    private function getDirPage($req){

        $req = trim(str_replace('/', ' ', $req));   
        $this->currentRequest = trim(str_replace('/', ' ', $this->currentRequest));   
        $content = $this->getSinglePageInfo($req.'/'.$req);
        $innerDir = $this->getDirListing($this->contentPath.$req);

        $filteredDir = array_filter($innerDir, function($fileName){
            $fileInfo = explode('.', $fileName);
            $fileExt = $fileInfo[count($fileInfo) - 1];
            $fileName = $fileInfo[0];
            return (($fileExt == 'json') && ($fileName !== $this->currentRequest));
        });

        $dirContent = array();
        foreach($filteredDir as $fileName){
            $innerFilePath = $req.'/'.$this->stripExt($fileName);
            $innerContent = $this->getSinglePageInfo($innerFilePath);
            $innerContent['link'] = $this->get_link($innerFilePath);
            array_push($dirContent, $innerContent);
        }

        $dirContent = $this->sortDesc($dirContent);
        $content['dirContent'] = $dirContent;
        return $content;
    }

    private function resolve_link($link, $filetype){
        $deSanitizedURL = preg_replace('/-/', ' ', $link);
        return $this->contentPath.$deSanitizedURL.'.'.$filetype;
    }

    public function render($templateName = 'master'){
        $pageTemplate = (isset($this->settings['page']['template'])) ? $this->settings['page']['template'] : $templateName;
        echo $this->twig->render($pageTemplate.'.twig', $this->settings);
    }


    private function getDirListing($dir){
        $foundDir =  array_diff(scandir($dir), array('..', '.'));
        return (empty($foundDir)) ? false : $foundDir;
    }

    private function fileNotDir($folder, $filename){
        $filename = str_replace('.json', '', $filename);
        return ($folder !== $filename);
    }

    
    private function getPageName($path){
        $name = explode('.', $path);
        return (count($name) > 1) ? $name[count($name) - 1] : $name[0];   
    }
    
    private function getDependencies($dependencyList){
        $deps = array();
        if(empty($dependencyList)) return;

        foreach ($dependencyList as $dependency) {
            $dependencyName = $dependency['page'];
            $deps[$dependencyName] = array();
            $dependencyDir = $this->getDirListing($this->contentPath.$dependencyName);
            
            $filteredDir = array_filter($dependencyDir, function($fileName){
                $fileExt = explode('.', $fileName);
                $fileExt = $fileExt[count($fileExt) - 1];
                return ($fileExt == 'json');
            });

            foreach($filteredDir as $fileName){
                if($this->fileNotDir($dependencyName, $fileName)){
                    $pathToDependency = $dependencyName.'/'.$this->stripExt($fileName);
                    $dependencyContent = $this->getSinglePageInfo($pathToDependency);
                    $dependencyContent['link'] = $this->get_link($pathToDependency);
                    array_push($deps[$dependencyName], $dependencyContent);
                }
            }

            $deps[$dependencyName] = $this->sortDesc($deps[$dependencyName]);

            if(isset($dependency['limit'])){
                $offset = (isset($dependency['offset'])) ? $dependency['offset'] : 0;
                $deps[$dependencyName] = array_slice($deps[$dependencyName], $offset, $dependency['limit']);
            }
        }
        return $deps;
    }

    static function get_link($name){
        $link = str_replace(' ', '-', $name);
        $link = str_replace('.json', '', $link);
        return strtolower($link);
    }

    private function stripExt($filePath){
        $name = explode('.', $filePath);
        return $name[0];   
    }

    private function sortDesc($array){
        $newArray = $array;
        usort($newArray, function($a, $b){
            if(!isset($a['date']) && isset($b['date'])) return true;
            if(isset($a['date']) && !isset($b['date'])) return false;
            if(!isset($a['date']) && !isset($b['date'])) return false;

            return date("U", strtotime($b['date'])) - date("U", strtotime($a['date']));
        });
        return $newArray;
    }

    static function markdown($markdownText){
        $parser = new Parsedown();
        echo $parser->text($markdownText);
    }

}