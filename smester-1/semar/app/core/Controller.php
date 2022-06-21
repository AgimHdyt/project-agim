<?php

class Controller
{
    public function view($view, $data = [])
    {
        # code...
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        # code...
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
    public function helper($helper)
    {
        # code...
        require_once '../app/helper/' . $helper . '.php';
        return new $helper;
    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
}
