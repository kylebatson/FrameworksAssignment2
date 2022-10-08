<?php
//Presentation Layer
class view {
  private $vars = [];
  private $tpl = '';

  /*
    This method assigns the HTML file to the 
    associated business layer (the model) to display the resulting web page
  */
  public function setTemplate(string $filename){
    if (empty($filename)){
        throw new \InvalidArgumentException('View Error: No template file given');
    }
    
    if(!file_exists($filename)){
        throw new \InvalidArgumentException('View Error: file does no exist');
    }

    $this -> tpl = $filename;
  }

   /*
  makes the stored data available to the template registered with the 
  view and then displays it
  */  
  public function display(){
    extract($this -> vars);
    require $this -> tpl;
  }
  
  /*
    To transfer data from any data store –
    database, file, etc. – to the business layer (the model) for processing
  */
  public function addVar($name, $value){
    
    if(empty($name) OR empty($value)){
      throw new \InvalidArgumentException('Empty Input in one or more parameters');
    }

    $this -> vars[$name] = $value;
  }

  //function for testing purposes - because addvar and set template return void
  public function getVars(){
    return $this -> vars;
  }

  public function getTpl(){
    return $this -> tpl;
  }

  

  
  /*
  Same as above but pass mutiple variables for storage 
  */
  /*
  public function addVars(array $variables){
    if(empty($variables)){
        trigger_error('<b>View Error:</b> Empty Varibale List'); 
    }

    foreach ($variables as $name=>$value){
        $this -> vars[$name] = $value;
    }
  }
  */
  
 
  
}
?>