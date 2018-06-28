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
            return "SUCCESS";
        } else {
            return "FAILED";
        }
        
    }
    function particularChatList($user_id,$customer_id)
    {
        $this->db->where('from', $user_id);
        $this->db->where('to', $customer_id);
        $this->db->or_where('from', $customer_id);
        $this->db->where('to', $user_id);
        $this->db->order_by('id', 'asc');
        $messages = $this->db->get('messages');
        
         return $messages->result(); 
    }
	function DCConversation($user_id)
	{
		$this->db->select('t1.*,t2.first_name cname,t3.first_name dname');
		$this->db->from('tbl_conversation as t1');
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
		$this->db->select('*');
		$this->db->from('messages as t1');
		
		$this->db->where('t1.to', $user_id);
		 $this->db->or_where('t1.from', $user_id);
		//$this->db->group_by('t2.user_id');
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
