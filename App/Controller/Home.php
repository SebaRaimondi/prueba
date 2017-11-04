<?php

class HomeController extends Controller
{

    public function index()
    {
        TwigController::render('Home.twig');
    }
}
