<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function index() {
        $data=array();
        $data['maincontent']=$this->load->view('home_message',$data,true);
        $this->load->view('home',$data);
    }
    public function admin_login() {
        $data=array();
        $data['maincontent']=$this->load->view('admin_login',$data,true);
        $this->load->view('home',$data);
    }

    public function Exam() {
        $data=array();
        $this->load->model('home_model');
        $data['result']=$this->home_model->ViewSubject();
        $data['maincontent']=$this->load->view('exam',$data,true);
        $this->load->view('home',$data);
    }

    public function ExamForm() {
        $data=array();
        $data['subject_code']=$this->input->post('subject_code',$data,TRUE);
        $data['subject_code1']=$this->input->post('subject_code1',$data,TRUE);
        if(($data['subject_code1']!='null') and ($data['subject_code']>0)) {
            $_SESSION['message']="<font color='red'>You can not Select more than one subject!</font>";
            $this->Exam();
        }else {
            $this->load->model('home_model');
            $data['result']=$this->home_model->SubjectCodeRetrive($data);
            if($data['result']) {
                $question_limit=$data['result']->exam_mark;
                $data['result1']=$this->home_model->ViewQuestionRandom($data,$question_limit);
                $data['maincontent']=$this->load->view('view_question',$data,true);
                $this->load->view('user_home',$data);
            }
            else {
                $_SESSION['message']="<font color='red'>Please Select Subject!</font>";
                $this->Exam();
            }
        }
    }
    public function QuestionData() {
        /*
        $define=1;
        for($i=0;$i<=$define;$i++){
        echo $this->input->post('answer1',$data,TRUE);
        $length=strlen($s[0]);
        $slash_location=strpos($s[$i],'/','1')+1;
        $question=substr($s[$i],$slash_location,$length);
        $question_length=strlen($question)+1;
        $quesion_id= substr_replace($s, '',2,$question_length);
        //print_r($this->input->post('answer2',$data,TRUE));
        //print_r($this->input->post('answer3',$data,TRUE));
        //print_r($this->input->post('answer4',$data,TRUE));
         * 
        */
        $data=array();
        $data1=array();
        $data1['roll']=$this->input->post('roll',$data1,TRUE);
        $data1['dept']=$this->input->post('dept',$data1,TRUE);
        $data1['subject_code']=$this->input->post('subject_code',$data1,TRUE);
        if($data1['roll'] && $data1['dept'] && $data1['subject_code']) {
            $data['id1']=$this->input->post('id1',$data,TRUE);
            $data['id2']=$this->input->post('id2',$data,TRUE);
            $data['id3']=$this->input->post('id3',$data,TRUE);
            $data['id4']=$this->input->post('id4',$data,TRUE);
            $data['id5']=$this->input->post('id5',$data,TRUE);
            $data['id6']=$this->input->post('id6',$data,TRUE);
            $data['id7']=$this->input->post('id7',$data,TRUE);

            $data['answer1']=$this->input->post('answer1',$data,TRUE);
            $data['answer2']=$this->input->post('answer2',$data,TRUE);
            $data['answer3']=$this->input->post('answer3',$data,TRUE);
            $data['answer4']=$this->input->post('answer4',$data,TRUE);
            $data['answer5']=$this->input->post('answer5',$data,TRUE);
            $data['answer6']=$this->input->post('answer6',$data,TRUE);
            $data['answer7']=$this->input->post('answer7',$data,TRUE);
            $this->load->model('home_model');
            $data['result']=$this->home_model->SelectQuestion($data1);
            $obtained_mark=0;
            foreach($data['result'] as $row) {
                $id=$row->id;
                $choice_right=$row->choice_right;
                if(($data['id1']==$id)&&($data['answer1']==$choice_right)) {
                    $mark=1;
                }
                else if(($data['id2']==$id)&&($data['answer2']==$choice_right)) {
                    $mark=1;
                }
                else if(($data['id3']==$id)&&($data['answer3']==$choice_right)) {
                    $mark=1;
                }
                else if(($data['id4']==$id)&&($data['answer4']==$choice_right)) {
                    $mark=1;
                }
                else if(($data['id5']==$id)&&($data['answer5']==$choice_right)) {
                    $mark=1;
                }
                else {
                    $mark=0;
                }
                $obtained_mark+=$mark;
            }
            $data1['obtained_mark']=$obtained_mark;
            $result=$this->home_model->CheckStudent($data1);
            if(!$result) {
                $_SESSION['message']="This Roll number already exists .Please Check!";
                $this->Exam();
            } else {
                $this->home_model->saveMarkdata($data1);
                $data1['total_mark']=$this->input->post('exam_mark',$data1,TRUE);
                $data['maincontent']=$this->load->view('exam_result',$data1,true);
                $this->load->view('user_home',$data);
            }
        }
        else{
            $this->index();
        }
    }
}
?>