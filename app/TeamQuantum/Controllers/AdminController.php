<?php

namespace TeamQuantum\Controllers;


class AdminController extends Controller
{
    public function serverAction()
    {
        return $this->view('serverList');
    }
}