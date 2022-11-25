<?php
//Presentation Layer
class View{
  private $vars = [];
  private string $template = '';

  /*
    This method assigns the HTML file to the 
    associated business layer (the model) to display the resulting web page
  */
  public function registerTemplate(string $filename){
    
    if (empty($filename)){
        throw new \InvalidArgumentException('View Error: No template file given');
    }
    
    if(!file_exists($filename)){
        throw new \InvalidArgumentException('View Error: file does no exist');
    }

    $this -> template = $filename;
  }

   /*
  makes the stored data available to the template registered with the 
  view and then displays it
  */  
  public function display(){
    extract($this -> vars);
    require $this -> template;
  }
  
  /*
    To transfer data from any data store –
    database, file, etc. – to the business layer (the model) for processing
  */
  public function importVar($name, $value){
    //check if variable name is allowed
    if(empty($name)){
      throw new \InvalidArgumentException('Empty name when calling addVar');
    }

    if(empty($value)){
      throw new \InvalidArgumentException('Empty value when calling addVar');
    }

    $this -> vars[$name] = $value;
  }

  public function importVars(array $variables){
    //check if variable name is allowed
    if(empty($variables)){
        throw new \InvalidArgumentException('Empty Input');
    }

    foreach ($variables as $name=>$value){
        $this -> vars[$name] = $value;
    }
  }
    
}
?>