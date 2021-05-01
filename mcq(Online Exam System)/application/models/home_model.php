<?php
class Home_Model extends CI_Model{
public function ViewSubject(){
$this->db->select('*');
$this->db->from('tbl_subject');
$this->db->where('permission','1');
$resultSet=$this->db->get();
return $resultSet->result();
}

public function SubjectCodeRetrive($data){
$this->db->select('*');
$this->db->from('tbl_subject');
$this->db->where('subject_code',$data['subject_code']);
$this->db->or_where('subject_code',$data['subject_code1']);
$resultSet=$this->db->get();
return $resultSet->row();
}
public function ViewQuestionRandom($data,$question_limit){
$this->db->select('*');
$this->db->from('tbl_question');
$this->db->where('code',$data['subject_code']);
$this->db->or_where('code',$data['subject_code1']);
$this->db->order_by("question", "random");
$this->db->limit($question_limit);
$resultSet=$this->db->get();
return $resultSet->result();
}
public function SelectQuestion($data1){
$this->db->select('*');
$this->db->from('tbl_question');
$this->db->where('code',$data1['subject_code']);
$resultSet=$this->db->get();
return $resultSet->result();
}
public function CheckStudent($data1){
$this->db->select('*');
$this->db->from('tbl_mark');
$this->db->where('roll',$data1['roll']);
$this->db->where('dept',$data1['dept']);
$this->db->where('subject_code',$data1['subject_code']);
$resultSet=$this->db->get();
if($resultSet->num_rows()>0){
return FALSE;
} else{
    return TRUE;
}
}
public function saveMarkdata($data1)
	{
	$this->db->insert('tbl_mark',$data1);	
	
	}

/*public function SubjectCodeRetrive($data){
$this->db->select('subject_code');
$this->db->from('tbl_subject');
$this->db->where('subject_name',$data['subject_name']);
$resultSet=$this->db->get();
return $resultSet->row();
*/














}
?>