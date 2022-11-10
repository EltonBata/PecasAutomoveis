<?php
include_once '../models/feedback.php';


class Verfeedback{
    private $feedback;
    private $dados;

    public function feedback()
    {

        $this->feedback= new feedback();
        $this->dados = $this->feedback->selectAll();
        return $this->dados;
    }
    
}
$verfeedback= new Verfeedback();
$feedback=$verfeedback->feedback();



