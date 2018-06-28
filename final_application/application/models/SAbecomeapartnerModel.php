<?php
class SAbecomeapartnerModel extends CI_Model {
 function __construct()
    {
              parent::__construct();
              $this->load->database();
    }
    /* function addNew($userData)
	{
      if($this->db->insert('tbl_satellmemore',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	} */
	function becomeapartnerList()
	{
        $this->db->select('b.*,c.country_name,i.island_name');
        $this->db->from('tbl_becomeapartner b');
        $this->db->join('tbl_country c','b.country = c.country_id','left');
        $this->db->join('tbl_island i','b.island = i.island_id','left');
	$this->db->where('status', 'NOT APPROVED');
	$query = $this->db->get();
	return $query->result();
    }
	
	function getapprovelData($id)
	{
    $this->db->select('*');
    $this->db->from('tbl_becomeapartner');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }

	function updateApproveldata($data1,$data2,$id)
    {
		if($this->input->post('status_update') == "APPROVED")
		{
			$this->db->insert('user', $data1);
			$this->db->where('id',$id);  
			$this->db->update('tbl_becomeapartner', $data2);
			return "SUCCESS";
		}
		else
		{
			$this->db->where('id',$id);  
			$this->db->update('tbl_becomeapartner', $data2);
			return "FAILED";
		}

    }
	function DCinboxMsg($user_id)
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
		$this->db->order_by('c.lastmsg','desc');
		//$this->db->group_by('t2.user_id');
		//$this->db->where('t1.from', 't2.user_id');

		$query = $this->db->get();
        
         return $query->result(); 
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
		$this->db->from('messages as t1');
		$this->db->join('tbl_conversation as t2','t1.thread_id = t2.thread_id','left');
        $this->db->where('t1.thread_id', $thread);
        $this->db->order_by('t1.id', 'asc');
        $messages = $this->db->get();
        
         return $messages->result(); 
    }
	 function suspend($id, $suspend)
    {
		$this->db->where('user_id',$id);      //var_dump($id);exit();
     // $this->db->from('tbl_country');
		if($this->db->update('user',$suspend))
		{
			return "SUCCESS";
		}		
    }
	function Reinstate($id, $open)
    {
		$this->db->where('user_id',$id);      //var_dump($id);exit();
     // $this->db->from('tbl_country');
		if($this->db->update('user',$open))
		{
			return "SUCCESS";
		}		
    }
	/*
 function deleteData($id)
    {
       $this->db->delete('tbl_satellmemore', array('id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    } */
}
?>