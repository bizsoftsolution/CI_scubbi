<?php
class ChatModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function newIsland($data)
    {
        if ($this->db->insert('tbl_island', $data)) {
            return "SUCCESS";
        } else {
            return "FAILED";
        }
        
    }
	function newChat($data)
    {
        if ($this->db->insert('messages', $data)) {
			$udata = array(
			"lastmsg" => $data["time"],
			"lastmsgfrom" => $data["from"]
			);
			$uwhere = array("thread_id"=>$data["thread_id"]);
			$this->db->update('tbl_conversation', $udata,$uwhere);
            return "SUCCESS";
        } else {
            return "FAILED";
        }
        
    }
    function particularChatList($user_id,$customer_id,$thread)
    {
		
		
        $this->db->where('thread_id', $thread);
        $this->db->order_by('id', 'asc');
        $messages = $this->db->get('messages');
        
         return $messages->result(); 
    }
	function DCConversation($user_id)
	{
		$this->db->select('t1.*,t4.*,t2.first_name cname,t3.first_name dname');
		$this->db->from('tbl_conversation as t1');
		$this->db->join('user as t4','t1.thread_id = t4.thread_id','left');
		$this->db->join('user as t2','t1.customer_id = t2.user_id','left');
		$this->db->join('user as t3','t1.dc_id = t3.user_id','left');
		
		$this->db->where('t1.dc_id', $user_id);
		$this->db->order_by('t1.lastmsg','desc');
		 //$this->db->or_where('t1.from', $user_id);
		//$this->db->group_by('t2.user_id');
		//$this->db->where('t1.from', 't2.user_id');

		$query = $this->db->get();
        
         return $query->result(); 
	}
	function inboxMsg($user_id)
	{
		$selectq = 'c.*,(select m1.to from messages m1 where m1.thread_id = c.thread_id order by id desc limit 1) lto,'
			. '(select m2.from from messages m2 where m2.thread_id = c.thread_id order by id desc limit 1) lfrom,'
			. '(select m3.to_name from messages m3 where m3.thread_id = c.thread_id order by id desc limit 1) ltoname,'
			. '(select m4.from_name from messages m4 where m4.thread_id = c.thread_id order by id desc limit 1) lfromname,'
			. '(select m5.id from messages m5 where m5.thread_id = c.thread_id order by id desc limit 1) lid,'
			. ' (select count(*) mcnt from messages m6 where m6.thread_id = c.thread_id) mcnt,'
			. ' (select count(*) scnt from user u where u.user_id = c.customer_id) scnt,';
		$this->db->select($selectq);
		$this->db->from('tbl_conversation as c');
		
		$this->db->where('c.dc_id', $user_id);
		 $this->db->or_where('c.customer_id', $user_id);
//		$this->db->where('mcnt >', 0);
		$this->db->order_by('c.thread_id','asc');
		$this->db->group_by('c.customer_id');
		//$this->db->where('t1.from', 't2.user_id');

		$query = $this->db->get();
        
         return $query->result(); 
	}
	function sentItems($user_id)
	{
		$this->db->select('*');
		$this->db->from('messages as t1');
		$this->db->join('user as t2', 't1.from = t2.user_id');
		$this->db->where('t1.from', $user_id);
		$this->db->order_by('t1.id','desc');
		$this->db->group_by('t1.to');
		
		//$this->db->where('t1.from', 't2.user_id');

		$query = $this->db->get();
		
		
        
         return $query->result(); 
	}
	function userList($user_id)
	{
	
		
		$this->db->select('*');
		$this->db->where('t1.from',$user_id);
		$this->db->or_where('t1.to',$user_id);
		   $this->db->from('messages as t1');
		  $this->db->join('user as  t2', 't1.from = t2.user_id', 'left');
		$this->db->order_by('t1.id','desc');
		
		$this->db->group_by('t2.user_id');
		$query = $this->db->get('messages');
		
		return $query->result();
	}
    function editIsland($data, $id)
    {
        
        $this->db->where('island_id', $id); //var_dump($id);exit();
        // $this->db->from('tbl_country');
        if ($this->db->update('tbl_island', $data)) {
            return "SUCCESS";
        } else { {
                return "FAILED";
            }
        }
    }
    
    function getIsland($id)
    {
        //  $sql = "SELECT * FROM employee WHERE id = ?";
        //$query =$this->db->query($sql, array($id));
        $this->db->select('*');
        $this->db->from('tbl_island');
        $this->db->where('island_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function deleteIsland($id)
    {
        $this->db->delete('tbl_island', array(
            'island_id' => $id
        ));
    }

    function countryList()
    {
        $query = $this->db->get('tbl_country');
        return $query->result();
    }
}
?>
