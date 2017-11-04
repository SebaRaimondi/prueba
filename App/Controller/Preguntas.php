<?php

require_once 'App/Model/Pregunta.php';
class PreguntasController extends Controller
{

    public function index()
    {
        if (!$this->isLogged()) {
            echo 'No estas logueado';
            die;
        }

        TwigController::render('Preguntas.twig', [
            'preguntas' => Pregunta::all()
        ]);
    }

    public function preguntar()
    {
        if (!$this->isLogged()) {
            echo 'No estas logueado';
            die;
        }

        TwigController::render('Preguntar.twig');
    }

    public function newPregunta()
    {
        if (!$this->isLogged()) {
            echo 'No estas logueado';
            die;
        }

        if (!validatePost(['titulo', 'pregunta'])) {
            echo 'No se enviaron todos los parametros';
            die;
        }

        $titulo = trim($_POST['titulo']);
        $pregunta = trim($_POST['pregunta']);
        $pregunta = Pregunta::newPregunta([
            'titulo' => $titulo,
            'pregunta' => $pregunta,
            'id' => $this->loggedId()
        ]);

        if ($pregunta) {
            header('Location: index.php?controller=preguntas&action=index');
            die;
        }

        echo 'Hubo un error al crear tu pregunta :(';
        die;
    }
}
