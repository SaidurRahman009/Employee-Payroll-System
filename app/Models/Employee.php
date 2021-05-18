<?php

namespace App\Models;

//use phpDocumentor\Reflection\Types\Null_;

class Employee{
     
    public $name = NULL;
    public $salary = NULL;
    public $active_days = NULL;
    public $send_salary = NULL;
  

   
    

    public function setName($name_){
        $this->name = trim($name_);
    }
    
        
    public function getName(){
        return $this->name;
    }
    public function setsalary($salary_){
        $this->salary = $salary_;
    
    
    }
    public function getsalary()
	{
		return $this->salary;
	}
    public function set_active_days($active_days_){
        $this->active_days = $active_days_;
        return TRUE;
    
    }
    public function get_active_days()
	{
		return $this->active_days;
	}
    public function set_send_salary($send_salary_){
        $this->send_salary = $send_salary_;
    }
    public function get_send_salary()
	{
		return $this->send_salary;
	}


    
}

?>