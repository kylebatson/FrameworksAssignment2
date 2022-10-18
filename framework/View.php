<?php
//Presentation Layer
class view implements ObserverInterface{
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
    
    if(empty($name)){
      throw new \InvalidArgumentException('Empty name when calling addVar');
    }

    if(empty($value)){
      throw new \InvalidArgumentException('Empty value when calling addVar');
    }

    $this -> vars[$name] = $value;
  }

  public function addVars(array $variables){
    if(empty($variables)){
        throw new \InvalidArgumentException('Empty Input');
    }

    foreach ($variables as $name=>$value){
        $this -> vars[$name] = $value;
    }
  }

  public function update(ObservableModel $o)
  {
    $records = $o -> giveUpdate();
    //record is the mutidimentional array with the popular and recommended courses in it
   
    $this -> addVars($records);

    $this -> display();
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