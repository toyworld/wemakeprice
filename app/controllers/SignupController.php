<?php
	
	class SignupController extends \phalcon\Mvc\Controller
	{
		public function indexAction()
		{
			
		}
		/**
		 * submit 이벤트가 발생시에 register컨트롤러를 등록하지 않았기 때문에
		 * 아래 함수에서 받아서 처리한다
		 * */
		public function registerAction()
		{
			//model 단에 처리할 클레스를 선언한다
			$user = new Users();
			//post 값이 넘어올 경우 users.php의 save함수로 처리한다 
			$success = $user->save($this->reuqset->getPost(), array('name','email'));
			//분기처리로 실패 성공 여부 판단
			if($success){
				echo "감사합니다 등록이 완료 되었습니다";
			}else{
				echo "죄송합니다. 등록과정에서 문제가 발생했습니다. 관리자에게 문의 해주시기 바랍니다. 감사합니다.";
				//실패하고 돌아온 정보를 출력한다
				foreach ($user->getMessages() as $message) {
					echo $message->getMessage(), "<br/>";
				}
			}
			
			$this->view->disable();
		}
	}
?>