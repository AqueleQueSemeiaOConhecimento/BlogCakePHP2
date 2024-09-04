<?php

App::uses('CakeEmail', 'Network/Email');

class EmailComponent extends Component {

  public function sendEmail($to, $subject, $codigo) {

    $email = new CakeEmail('smtp');

    $email->from(['d3rr3tido@gmail.com' => 'Remetente'])
    ->to($to)
    ->subject($subject)
    ->template('contact')
    ->emailFormat('html')
    ->viewVars(array(
        'assunto' => $subject,
        'codigo' => $codigo
    ));



    if ($email->send()) {
      return $this->Flash->success(__('Email enviado com sucesso'));
    }
    echo stripslashes($this->xEmail->smtpError);
  }

}
