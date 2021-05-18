<?php

use phpDocumentor\Reflection\PseudoTypes\True_;

class EmployeeTest extends \PHPUnit\Framework\TestCase{
    
	protected $employee ;

	public function setUp():void
	{
		$this->employee = new \App\Models\Employee;
	}

    public function test_send_salary_and_employee_information()
	{
		

		$this->employee -> setName('keyboard');
		$this -> assertEquals($this->employee->getName(),'keyboard');

		$this->employee->setsalary('5000');
		$this->assertEquals($this->employee->getsalary(), '5000');

		$this->employee->set_active_days('20');
		$this->assertEquals($this->employee->get_active_days(), '20');
		$this->employee->set_send_salary('0');
		$this->assertEquals($this->employee->get_send_salary(), '0');
	}


	
	
	
}
?>