<?php


namespace App\Http\Controllers;

use App\Cidade;
use App\Http\Controllers\Controller;

class CidadeController extends Controller
{

    public function index()
    {
      $cidades = App\Cidade::all();

      foreach ($cidades as $cidade) {
          echo $cidade->nome;
      }
    }
}


?>
