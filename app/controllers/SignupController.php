<?php
	
	class SignupController extends \phalcon\Mvc\Controller
	{
		public function indexAction()
		{
			
		}
		/**
		 * submit �̺�Ʈ�� �߻��ÿ� register��Ʈ�ѷ��� ������� �ʾұ� ������
		 * �Ʒ� �Լ����� �޾Ƽ� ó���Ѵ�
		 * */
		public function registerAction()
		{
			//model �ܿ� ó���� Ŭ������ �����Ѵ�
			$user = new Users();
			//post ���� �Ѿ�� ��� users.php�� save�Լ��� ó���Ѵ� 
			$success = $user->save($this->reuqset->getPost(), array('name','email'));
			//�б�ó���� ���� ���� ���� �Ǵ�
			if($success){
				echo "�����մϴ� ����� �Ϸ� �Ǿ����ϴ�";
			}else{
				echo "�˼��մϴ�. ��ϰ������� ������ �߻��߽��ϴ�. �����ڿ��� ���� ���ֽñ� �ٶ��ϴ�. �����մϴ�.";
				//�����ϰ� ���ƿ� ������ ����Ѵ�
				foreach ($user->getMessages() as $message) {
					echo $message->getMessage(), "<br/>";
				}
			}
			
			$this->view->disable();
		}
	}
?>