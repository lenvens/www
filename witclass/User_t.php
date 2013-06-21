<?php
namespace wit\witclass;
/** @Entity @table(name="User_t") */
class User_t 
{

	/** 
	 * @Id @Column(type="integer") 
	 * @GeneratedValue(strategy="AUTO") 
	 */
	private $user_id;

	
	/** @Column(type="string",length=50) */
	private $login; 

	/** @Column(type="string",length=50) */
	private $auth; 

	/** @Column(type="integer",length=50) */
	private $phone; 

	/** @Column(type="string",length=50) */
	private $email; 

	/** @Column(type="integer",length=50) */
	private $dragoncoin; 

	/** @Column(type="string",length=50) */
	private $bank_id; 

	/** @Column(type="string",length=50) */
	private $bank_code; 



	/**
	 * @OneToOne (targetEntity="Task_t", mappedBy="User_t") 
	 */
	private $task_t;

	public function get_User_t_user_id()
	{
		return $this->user_id;
	}


	public function get_User_t_login()
	{
		return $this->login;
	}

	public function set_User_t_login($login)
	{
		$this->login=$login;
	}



	public function get_User_t_auth()
	{
		return $this->auth;
	}

	public function set_User_t_auth($auth)
	{
		$this->auth=$auth;
	}



	public function get_User_t_phone()
	{
		return $this->phone;
	}

	public function set_User_t_phone($phone)
	{
		$this->phone=$phone;
	}



	public function set_Task_t_task_t(Task_t $task_t)
	{
		if($this->task_t!=$task_t)
		{
			$this->task_t=$task_t;
			$task_t->set_Task_t_fuser_id($this);
		}
	}



}
