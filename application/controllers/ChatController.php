<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChatController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['ChatModel','User_model','CommonModel']);
		$this->load->helper('string');
	}

	public function get_chat_history($receiver_id)
	{
		$userid = $this->session->userdata('userid');
		$history = $this->ChatModel->GetReciverChatHistory($receiver_id);
		if(!empty($history)):
			foreach($history as $chat):
				$message_id = $chat['id'];
				$sender_id = $chat['sender_id'];
				$getUser = $this->User_model->get_users_details($chat['sender_id']);
				$message = $chat['message'];
				$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));
				$messageBody='';
				if($message=='NULL'): 
					$classBtn = 'right';
					if($userid==$sender_id):
						$classBtn = 'left';
					endif;
				else:
					$messageBody = $message;
				endif;
				if($userid != $sender_id): ?>     
					<p class="me-cht"> <?php echo($messageBody); ?>
					<br>
					<span class="dt-tm"><?php echo($messagedatetime); ?></span>
					<span class="dt-tm"><?php echo($getUser->fname); ?></span>
				</p>
				<div class="clearfix"></div>
				<?php else: ?>
					<p class="user-cht">  <?php echo($messageBody); ?>
					<br>
					<span class="dt-tm"><?php echo($messagedatetime); ?></span>
					<span class="dt-tm"><?php echo($getUser->fname); ?></span>
				</p>
				<div class="clearfix"></div>
			<?php endif; endforeach; else: ?>
			<div class="profile-bx">
				<span>No Messages</span>
			</div>
		<?php endif;
	}

	public function send_text_message(){
		$post = $this->input->post();
		$messageTxt = reduce_multiples($post['messageTxt'],' ');
		$data=[
			'sender_id' => $this->session->userdata('userid'),
			'grp_id' => $post['group_id'],
			'receiver_id' => $post['receiver_id'],
			'message' =>   $messageTxt,
			'ip_address' => $this->input->ip_address(),
		];
		$query = $this->ChatModel->SendTxtMessage($data); 
		$response='';
		if($query == true){
			$response = ['status' => 1 ,'message' => '' ];
		}else{
			$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
		}
		echo json_encode($response);
	}

	public function get_group_members($group_id)
	{
		$userid = $this->session->userdata('userid');
		$return = $this->ChatModel->GetGroupMembers($group_id);
		foreach($return as $group):
			$user_image = $group['image'];
			$user_name = $group['fname'].' '.$group['sname'];
			$place = $group['place']; ?>     
			<div class="profile-bx">
				<span><a href="#"><img src="<?php echo base_url('uploads/users/'.$group['image']); ?>" alt=""></a></span>
				<span><h2><a href="#"><?php echo($user_name); ?></a></h2>
					<p><?php echo($place); ?></p>
				</span>
			</div>
		<?php endforeach;
	}

	public function get_group_history($group_id)
	{
		$userid = $this->session->userdata('userid');
		$history = $this->ChatModel->GetGroupChatHistory($group_id);
		if(!empty($history)):
			foreach($history as $chat):
				$message_id = $chat['id'];
				$sender_id = $chat['sender_id'];
				$getUser = $this->User_model->get_users_details($chat['sender_id']);
				$message = $chat['message'];
				$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));
				$messageBody='';
				if($message=='NULL'): 
					$classBtn = 'right';
					if($userid==$sender_id):
						$classBtn = 'left';
					endif;
				else:
					$messageBody = $message;
				endif;
				if($userid != $sender_id): ?>     
					<p class="me-cht"> <?php echo($messageBody); ?>
					<br>
					<span class="dt-tm"><?php echo($messagedatetime); ?></span>
					<span class="dt-tm"><?php echo($getUser->fname); ?></span>
				</p>
				<div class="clearfix"></div>
				<?php else: ?>
					<p class="user-cht">  <?php echo($messageBody); ?>
					<br>
					<span class="dt-tm"><?php echo($messagedatetime); ?></span>
					<span class="dt-tm"><?php echo($getUser->fname); ?></span>
				</p>
				<div class="clearfix"></div>
			<?php endif; endforeach; else: ?>
			<div class="profile-bx">
				<span>No Messages</span>
			</div>
		<?php endif;
	}

	public function create_group()
	{
		$post = $this->input->post();
		$user_id = $this->session->userdata('userid');
		$grouparray = array('grp_name' => $post['grp_name'], 'grp_tag' => $post['grp_name'], 'create_id' => $user_id);
		$return = $this->ChatModel->creategroup('users_group',$grouparray); 
		foreach ($post['group_mem'] as  $value) {
			$groupmarray = array('grp_id' => $return, 'user_id' => $value);
			$response = $this->ChatModel->creategroup('group_members',$groupmarray);
		}
	}
}