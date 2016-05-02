<?php

class Teste extends CI_Controller {

public function view($page = 'home')
{
      if($this->session->userdata('logged_in'))
      {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        $this->load->view('templates/header');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
      }/*
      else
      {
        //If no session, redirect to login page
        redirect('login', 'refresh');
      }*/
      $this->load->view('templates/header');
      $this->load->view('pages/home');
      $this->load->view('templates/footer');
    }

    function logout()
    {
      $this->session->unset_userdata('logged_in');
      session_destroy();
      redirect('/', 'refresh');
    }
}