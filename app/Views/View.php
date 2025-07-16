<?php 
namespace App\Views;

use PDOException;

class View {

    protected $template = null;
    protected $viewpath = null;

    protected $layouts = [];

    public function __construct($template){
        $this->template = $template;
        $this->viewpath = __DIR__.'/../../resources/view/'.$this->template;
        
        if(is_dir($this->viewpath.'/layouts/')){
            $lou = scandir($this->viewpath.'/layouts/');

            foreach($lou as $file){
                if(pathinfo($file, PATHINFO_EXTENSION) == 'php'){
            $this->layouts[strtolower(basename($file,".php"))] = $file; 
                }
                
            }
        }
        
    }
    
   public static function data($data):string {
        return htmlspecialchars((string) $data, ENT_QUOTES, 'UTF-8');
    }


/**
 * Obtiene las vista para desplegarlas
 *  */    

         public function Render( array $data,$object = []): string
         {
            try{
                if(!empty($object)){
                    $obj = extract($object);
                }
        
            ob_start();
                if(isset($this->layouts['header'])){
                    include_once $this->viewpath.'/layouts/'.$this->layouts['header'];
                }
                 $page = $data['page'] ?? 'Index';
                 $viewFile = $this->viewpath.'/'.$page.'.php';
               
                 if(file_exists($viewFile)){
                    include_once $viewFile;
                 }else{
                    include_once $this->viewpath.'/error.php';
                 }

                 if (isset($this->layouts['footer'])) {
                    include_once $this->viewpath . '/layouts/' . $this->layouts['footer'];
                }

           return  ob_get_clean();
                
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function DisplayRender($data):void{
        echo $this->Render($data);
    }
}

