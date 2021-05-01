<?php
class Login_Model extends CI_Model {

    public function UserLoginCheek($user_name,$password) {
        $this->db->select ( '*' );
        $this->db->from ( 'tbl_admin' );
        $this->db->where ( 'user_name', trim($user_name ));
        $this->db->where ( 'password',trim($password ));
        $resultSet = $this->db->get ();
        if($resultSet->num_rows()=='1') {
            return $resultSet->row ();
        }
        else {
            return false;
        }

    }

    function CheekSubject ($subject_code) {

        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('subject_code',$subject_code);


        $query_result = $this->db->get();
        if (count($query_result->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function SubjectDatasend($data) {

        $this->db->insert('tbl_subject',$data);
    }

    public function Searchsubject() {
        $this->db->select ( '*' );
        $this->db->from ( 'tbl_subject' );
        $resultSet = $this->db->get ();
        return $resultSet->result();
    }


    function SubjectCodeCheek ($subject_code1,$subject_code) {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('subject_code',$subject_code);
        $this->db->or_where('subject_code', $subject_code1);
        $resultSet = $this->db->get ();
        return $resultSet->row ();

    }
    public function edidSubjectData($subject_id) {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('id',$subject_id);
        $resultSet=$this->db->get();
        return $resultSet->row();
    }
    public function SubjectDataEdit($data) {
        $this->db->set('subject_name',$data['subject_name']);
        $this->db->where('id',$data['subject_id']);
        $this->db->update('tbl_subject');
    }
    public function QuestionDataSave($data) {
        $this->db->insert('tbl_question',$data);

    }
    public function SearchQuestion($subject_code,$subject_code1) {
        $this->db->select('*');
        $this->db->from('tbl_question');
        $this->db->where('code',$subject_code);
        $this->db->or_where('code',$subject_code1);
        $resultSet = $this->db->get();
        return $resultSet->result();
    }

    public function  edtiData($question_id) {
        $this->db->select ( '*' );
        $this->db->from ( 'tbl_question' );
        $this->db->where ( 'id', $question_id );
        $resultSet = $this->db->get ();
        return $resultSet->row ();
    }
    public function UdateData($data) {
        $this->db->set('question', $data['question']);
        $this->db->set('choice_1', $data['choice_1']);
        $this->db->set('choice_2', $data['choice_2']);
        $this->db->set('choice_3', $data['choice_3']);
        $this->db->set('choice_4', $data['choice_4']);
        $this->db->set('choice_right', $data['choice_right']);
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_question');

    }
    public function DeleteQuestionData($question_id) {
        $this->db->where('id',$question_id);
        $this->db->delete('tbl_question');
    }
    // permission access star//
    public function UpdatedAccessStatus($data) {
        $this->db->set('permission',$data['permission']);
        $this->db->where('subject_code',$data['subject_code']);
        $this->db->update('tbl_subject');
    }
    public function ViewSubject() {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('permission','1');
        $resultSet=$this->db->get();
        return $resultSet->result();
    }
    public function UpdatedManageData($data){
        $this->db->set('exam_mark',$data['exam_mark']);
        $this->db->set('exam_time',$data['exam_time']);
        $this->db->where('subject_code',$data['subject_code']);
        $this->db->update('tbl_subject');
    }
    public function selectStudentResult($subject_code,$subject_code1){
        $this->db->select ( '*' );
        $this->db->from ( 'tbl_mark' );
        $this->db->where('subject_code',$subject_code);
        $this->db->or_where('subject_code',$subject_code1);
        $this->db->order_by('roll','DESC');
        $this->db->limit(10);
        $resultSet = $this->db->get ();
        
        return $resultSet->result ();
    }
    public function selectStudentResult1($subject_code,$subject_code1){
        $this->db->select ( '*' );
        $this->db->from ( 'tbl_mark' );
        $this->db->where('subject_code',$subject_code);
        $this->db->or_where('subject_code',$subject_code1);
        $this->db->order_by('roll','DESC');
        $this->db->limit(10, 10);
        $resultSet = $this->db->get ();
        return $resultSet->result ();
    }
}//end of class

?>