<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
    public function index() {
        $data=array();
        $data['maincontent']=$this->load->view('admin/admin_message',$data,true);
        $this->load->view('admin/admin_page',$data);
    }

    public function login() {
        $data=array();
        $data['maincontent']=$this->load->view('admin_login',$data,true);
        $this->load->view('home',$data);
    }

    public function loginCheek() {
        $data=array();
        $user_name=$this->input->post('user_name',$data,true);
        $password=$this->input->post('password',$data,true);
        $this->load->model('login_model');
        $result=$this->login_model->UserLoginCheek($user_name,$password);
        if ($result) {
            $data= array();
            $sessionData = array();
            $sessionData['user_id'] =$result->user_id;
            $sessionData['logged_in'] = TRUE;
            $this->session->set_userdata($sessionData);
            $this->index();
        }
        else {
            $_SESSION['exception'] = "<font color='red' size='2'>User name Or Password Invalid!</font>";
            $this->login();

        }
    }
    function logOut() {
        $this->session->unset_userdata('user_id','logged_in');
        $_SESSION['message'] = "<font color='red' size='2'>You are successfully logged out.</font>";
        $this->login();
    }

    public function AddSubject() {
        $data=array();
        $data['maincontent']=$this->load->view('admin/add_subject',$data,true);
        $this->load->view('admin/admin_page',$data);
    }
    public function SubjectData() {
        $data=array();
        $data['subject_name']=$this->input->post('subject_name',$data,true);
        $data['subject_code']=$this->input->post('subject_code',$data,true);
        $this->load->model('login_model');
        if (! $this->login_model->CheekSubject($data['subject_code'])) {
            $this->login_model->SubjectDatasend($data);
            $_SESSION['message']="<font size='2'>New Subject Created!</font>";

            $this->AddSubject();

        }
        else {
            $_SESSION['exception']="<font size='2'> Subject Already entered! &nbsp;Please check!</font>";
            $this->AddSubject();

        }

    }
    public function viewSubject() {
        $data=array();
        $this->load->model('login_model');
        $data['result']=$this->login_model->Searchsubject();
        $data['maincontent']=$this->load->view('admin/view_subject',$data,true);
        $this->load->view('admin/admin_page',$data);
    }
    public function SubjectEditPage($subject_id) {
        $data=array();
        $this->load->model("login_model");
        $data['result']=$this->login_model->edidSubjectData($subject_id);
        $data['maincontent']=$this->load->view('admin/subjectedit_page',$data,true);
        $this->load->view('admin/admin_page',$data);
    }
    public function SubjectDataForEdit() {
        $data=array();
        $data['subject_id']=$this->input->post('subject_id',$data,true);
        $data['subject_name']=$this->input->post('subject_name',$data,true);
        $this->load->model('login_model');
        $this->login_model->SubjectDataEdit($data);
        $_SESSION['message']="Successfully Updated !";
        $this->viewSubject();
    }
    public function AccessSubject() {
        $data=array();
        $this->load->model('login_model');
        $data['subject_code']=$this->input->post('subject_code',$data,true);
        $data['subject_name']=$this->input->post('subject_name',$data,true);
        $data['permission']=$this->input->post('permission',$data,true);
        $this->login_model->UpdatedAccessStatus($data);
        $data['result']=$this->login_model->Searchsubject();
        if($data['permission']=='0') {
            $_SESSION['message']="<b style='color:red'>Successfully Blocked: &nbsp;".$data['subject_name']."(".$data['subject_code'].")</b>";
        }else {
            $_SESSION['message']="<b>Successfully Permited: &nbsp;".$data['subject_name']."(".$data['subject_code'].")</b>";
        }
        $data['maincontent']=$this->load->view('admin/view_subject',$data,true);
        $this->load->view('admin/admin_page',$data);

    }
    public function AddQuestion() {
        $data=array();
        $this->load->model('login_model');
        $data['result']=$this->login_model->Searchsubject();
        $data['maincontent']=$this->load->view('admin/add_question',$data,true);
        $this->session->unset_userdata('subject_name','subject_code,subject_condition');
        $this->load->view('admin/admin_page',$data);

    }
    public function QuestionForm() {
        $data=array();
        $subject_code1=$this->input->post('subject_code1',$data,true);
        $subject_code=$this->input->post('subject_code',$data,true);
        if(($subject_code1!='null') and ($subject_code>0)) {
            $_SESSION['message']="<font color='red'>'You can not Select more than one subject!'</font>";
            $this->AddQuestion();
        }else {
            $this->load->model('login_model');
            $result=$this->login_model->SubjectCodeCheek($subject_code1,$subject_code);
            if($result) {
                $sessionData = array();
                $sessionData['subject_name'] =$result->subject_name;
                $sessionData['subject_code'] =$result->subject_code;
                $sessionData['subject_condition'] = TRUE;
                $this->session->set_userdata($sessionData);
                $data['maincontent']=$this->load->view('admin/question_form',$data,true);
                $this->load->view('admin/admin_page',$data);
            }
            else {
                $_SESSION['message']="<font color='red'>Wrong subject.Please Check!</font>";
                $this->AddQuestion();
            }
        }
    }


    public function QuestionFormReply() {
        $data=array();
        $data['maincontent']=$this->load->view('admin/question_form',$data,true);
        $this->load->view('admin/admin_page',$data);

    }


    public function SaveQuestion() {
        $data=array();

        $data['code']= $this->input->post('code',$data,TRUE);
        $data['question']= $this->input->post('question',$data,TRUE);
        $data['choice_1']= $this->input->post('1',$data,TRUE);
        $data['choice_2']= $this->input->post('2',$data,TRUE);
        $data['choice_3']= $this->input->post('3',$data,TRUE);
        $data['choice_4']= $this->input->post('4',$data,TRUE);
        $answer=$this->input->post('answer',$data,TRUE);
        if($answer=='ans1') {
            $data['choice_right']=$this->input->post('1',$data,TRUE);
        }
        else if($answer=='ans2') {
            $data['choice_right']=$this->input->post('2',$data,TRUE);
        }
        else if($answer=='ans3') {
            $data['choice_right']=$this->input->post('3',$data,TRUE);
        }
        else if ($answer=='ans4') {
            $data['choice_right']=$this->input->post('4',$data,TRUE);

        }
        $this->load->model('login_model');
        $this->login_model->QuestionDataSave($data);
        $_SESSION['message']="<font color='red'>'Save data successfully'</font>";
        $this->QuestionFormReply();
    }

    public function SearchSubjectCodeForQuestionupdate() {
        $data=array();
        $this->load->model('login_model');
        $data['result']=$this->login_model->Searchsubject();
        $data['maincontent']=$this->load->view('admin/view_question',$data,true);
        $this->load->view('admin/admin_page',$data);

    }

    public function SearchQuestionForUpdate() {
        $data=array();
        $subject_code1=$this->input->post('subject_code1',$data,true);
        $subject_code=$this->input->post('subject_code',$data,true);
        if(($subject_code1!='null') and ($subject_code>0)) {
            $_SESSION['message']="<font color='red'>'You can not Select more than one subject!'</font>";
            $this->AddQuestion();
        }else {
            $this->load->model('login_model');
            $data['result']=$this->login_model->SearchQuestion($subject_code,$subject_code1);
            if($data['result']) {
                $data['maincontent']=$this->load->view('admin/view_questionforupdate',$data,true);
                $this->load->view('admin/admin_page',$data);
            }
            else {
                $_SESSION['message']="<font color='red'>Wrong subject. Please Check!</font>";
                $this->SearchSubjectCodeForQuestionupdate();
            }
        }
    }
    public function EditQuestionpage($question_id) {
        $data=array();
        $this->load->model("login_model");
        $data['result']=$this->login_model->edtiData($question_id);
        $data['maincontent']=$this->load->view('admin/edit_question',$data,true);
        $this->load->view('admin/admin_page',$data);
    }

    public function UpdateQuestion() {
        $data=array();
        $data['id']= $this->input->post('id',$data,TRUE);
        $data['question']= $this->input->post('question',$data,TRUE);
        $data['choice_1']= $this->input->post('1',$data,TRUE);
        $data['choice_2']= $this->input->post('2',$data,TRUE);
        $data['choice_3']= $this->input->post('3',$data,TRUE);
        $data['choice_4']= $this->input->post('4',$data,TRUE);
        $answer=$this->input->post('answer',$data,TRUE);
        if($answer=='ans1') {
            $data['choice_right']=$this->input->post('1',$data,TRUE);
        }
        else if($answer=='ans2') {
            $data['choice_right']=$this->input->post('2',$data,TRUE);
        }
        else if($answer=='ans3') {
            echo $data['choice_right']=$this->input->post('3',$data,TRUE);
        }
        else if ($answer=='ans4') {
            $data['choice_right']=$this->input->post('4',$data,TRUE);

        }
        $this->load->model('login_model');
        $this->login_model->UdateData($data);
        $_SESSION['message']="<font color='red'>'Update data successfully'</font>";
        $this->SearchSubjectCodeForQuestionupdate();
    }
    public function DeleteQuestion($question_id) {
        $data=array();
        $this->load->model('login_model');
        $result=$this->login_model->DeleteQuestionData($question_id);
        if($result) {
            echo "Mo";
        }
    }
    //exam management
    public function examManage() {
        if($this->session->userdata('user_id')) {
            $data=array();
            $this->load->model('login_model');
            $data['result']=$this->login_model->Searchsubject();
            $data['maincontent']=$this->load->view('admin/exam_manage',$data,true);
            $this->load->view('admin/admin_page',$data);
        }
        else {
            $this->login();
        }

    }
    public function SaveManageData() {
        if($this->session->userdata('user_id')) {
            $data=array();
            $data['subject_name']=$this->input->post('subject_name',TRUE);
            $data['subject_code']=$this->input->post('subject_code',TRUE);
            $data['exam_mark']=$this->input->post('exam_mark',TRUE);
            $data['exam_time']=$this->input->post('exam_time',TRUE);
            $this->load->model('login_model');
            $data['result']=$this->login_model->UpdatedManageData($data);
            $_SESSION['message']="<b>Successfully Managed: &nbsp;".$data['subject_name']."(".$data['subject_code'].")</b>";
            $this->examManage();
        }
        else {
            $this->login();
        }
    }
    //report as result
    public function result_report() {
        if($this->session->userdata('user_id')) {
            $data=array();
            $this->load->model('login_model');
            $data['result']=$this->login_model->Searchsubject();
            $data['maincontent']=$this->load->view('admin/result_report',$data,true);
            $this->load->view('admin/admin_page',$data);
        }
        else {
            $this->login();
        }

    }
    public function searchResultforPrint() {
        if($this->session->userdata('user_id')) {
            $data=array();
            $subject_code=$this->input->post('subject_code',$data,true);
            $subject_code1=$this->input->post('subject_code1',$data,true);
            if(($subject_code1!='null') and ($subject_code>0)) {
                $_SESSION['message']="<font color='red'>'You can not Select more than one subject!'</font>";
                $this->result_report();
            }else {
                $this->load->model('login_model');
                $data['result']=$this->login_model->selectStudentResult($subject_code,$subject_code1);
                $data['result1']=$this->login_model->selectStudentResult1($subject_code,$subject_code1);
                $this->load->view('admin/view_result_print',$data);
            }
        }
        else {
            $this->login();
        }

    }
}
?>