<?php

class CoursesController extends AbstractController{

    //Step 1 - set the model
    protected function makeModel() : Model{
        //A model will be needed for the indec page so do as follows
        return new CoursesModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
    }
    
    
    //Step 2 - set the view
    protected function makeView(): View{
        return new View();
    }

    
    //'what makes the whole thing run'
    //Step 3 - Setup the start method (Set view and model and get any data from the model then pass to view and display)
    public function start(){
        //Set the model and view
        $this -> model = $this -> makeModel();
        $this -> view = $this -> makeView();

        //check if user is logged in
        $auth = new Authenticate();
        if($auth -> isUserLoggedIn()){
            //get data from the database - use post just as place holder because why not
            $data = $this -> model -> findAll('courses', $_POST);
            $instructors = $this -> model -> findAll('instructors', $_POST);
            $faculty = $this -> model -> findAll('faculty_department', $_POST);

            $facluty_ids;
            //get all course_ids to prepare for searching their respective faculty id
            for($i=0; $i < count($data); $i++){
                $faculty_ids[] = $data[$i]['course_id'];
            }

            //format data for use with in clause
            $formatted_faculty_ids = "";
            for($i=0; $i < count($faculty_ids); $i++){
                $formatted_faculty_ids =  $formatted_faculty_ids . $faculty_ids[$i] . ',';
            }
            $formatted_faculty_ids = rtrim($formatted_faculty_ids,',');//remove last comma
            $formatted_faculty_ids = array('sql' => $formatted_faculty_ids);//now store as an array
            
            


            //Now search database for all faculty department ids which correspond to the course id
            $factuly_dept_ids = $this -> model -> find('faculty_dept_courses', $formatted_faculty_ids);

            //Now append data to the view using import vars (add all one time)
            $this -> view -> importVar('data',$data);
            $this -> view -> importVar('instructors',$instructors);
            $this -> view -> importVar('faculty',$faculty);
            $this -> view -> importVar('faculty_dept_ids',$factuly_dept_ids);

          

            //Now set template
            $this -> view -> registerTemplate(TEMPLATE_DIR . '/courses.tpl.php');

            //And finally display the page
            $this -> view -> display();
        }else{
            //if no user logged in send to index page
            header('Location:index.php');
        }


        
    }

}