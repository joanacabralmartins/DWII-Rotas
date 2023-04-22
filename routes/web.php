<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/aluno')->group(function() {

    Route::get('/', function() {
        $dados = array(
            1 => "Maria Lopes",
            2 => "Cintia Carvalho Souza",
            3 => "Diogo Cunha",
            4 => "Alice Beltrão",
            5 => "Pedro Mario Paes"
        );

        $alunos = "<ul>";

        foreach($dados as $chave => $nome) {
            $alunos .= "<li>$chave - $nome</li>";
        }

        $alunos .= "</ul>";

        return $alunos;
    });

    Route::get('/limite/{total}', function($total) {
        $dados = array(
            1 => "Maria Lopes",
            2 => "Cintia Carvalho Souza",
            3 => "Diogo Cunha",
            4 => "Alice Beltrão",
            5 => "Pedro Mario Paes"
        );

        $alunos = "<ul>";

        if($total == 0) {
            return;
        }

        if($total <= count($dados)) {
            $cont = 0;
            foreach($dados as $chave => $nome) {
                $alunos .= "<li>$chave - $nome</li>";
                $cont++;
                if($cont >= $total) break;
            }
        }
               
        $alunos .= "</ul>";

        return $alunos;
    })->where('total', '[0-9]+');

    Route::get('/matricula/{info}', function($info) {
        $dados = array(
            1 => "Maria Lopes",
            2 => "Cintia Carvalho Souza",
            3 => "Diogo Cunha",
            4 => "Alice Beltrão",
            5 => "Pedro Mario Paes"
        );

        $aluno = "<ul>";
        $flag = 0;

        foreach ($dados as $chave => $nome) {
            if($chave == $info) {
                $aluno .= "<li>$chave - $nome</li>";
                $flag = 1;
            }
        }
        
        if($flag == 0) {
            return "<li>NÃO ENCONTRADO!</li>";
        }

        $aluno .= "</ul>";

        return $aluno;
    })->where('info', '[0-9]+');

    Route::get('/nome/{info}', function($info) {

        $dados = array(
            1 => "Maria",
            2 => "Cintia",
            3 => "Diogo",
            4 => "Alice",
            5 => "Pedro"
        );

        $aluno = "<ul>";
        $flag = 0;

        foreach ($dados as $chave => $nome) {
            if($nome == $info) {
                $aluno .= "<li>$chave - $nome</li>";
                $flag = 1;
            }
        }

        if($flag == 0) {
            return "<li>NÃO ENCONTRADO!</li>";
        }
        
        $aluno .= "</ul>";

        return $aluno;
    })->where('info', '[A-Za-z]+');

})->name('alunos');  

Route::prefix('/nota')->group(function() {

    Route::get('/', function() {
        $dados = array (
            array(
                "matricula" => 1,
                "aluno" => "Maria",
                "nota" => 9,
            ),
            array(
                "matricula" => 2,
                "aluno" => "Cintia",
                "nota" => 2,
            ),
            array(
                "matricula" => 3,
                "aluno" => "Diogo",
                "nota" => 7,
            ),
            array(
                "matricula" => 4,
                "aluno" => "Alice",
                "nota" => 9.8,
            ),
            array(
                "matricula" => 5,
                "aluno" => "Pedro",
                "nota" => 4,
            )
        );

        $notas  = '<table>';
        $notas .= '<thead>';
        $notas .= '<tr>';
        $notas .= '<td><h3>Matricula&emsp;</h3></td>';
        $notas .= '<td><h3>Aluno&emsp;</h3></td>';
        $notas .= '<td><h3>Nota</h3></td>';
        $notas .= '</tr>';
        $notas .= '</thead>';
        $notas .= '<tbody>';

        foreach ($dados as $chave) {
            $notas .= '<tr>';
            $notas .= "<td><center>{$chave["matricula"]}</center></td>";
            $notas .= "<td><center>{$chave["aluno"]}</center></td>";
            $notas .= "<td><center>{$chave["nota"]}</center></td>";
            $notas .= '</tr>';
        }
    
        $notas .= '</tbody>';
        $notas .= '</table>';
    
        return $notas;
    });

    Route::get('/limite/{total}', function($total) {
        $dados = array (
            array(
                "matricula" => 1,
                "aluno" => "Maria",
                "nota" => 9,
            ),
            array(
                "matricula" => 2,
                "aluno" => "Cintia",
                "nota" => 2,
            ),
            array(
                "matricula" => 3,
                "aluno" => "Diogo",
                "nota" => 7,
            ),
            array(
                "matricula" => 4,
                "aluno" => "Alice",
                "nota" => 9.8,
            ),
            array(
                "matricula" => 5,
                "aluno" => "Pedro",
                "nota" => 4,
            )
        );

        $notas  = '<table>';
        $notas .= '<thead>';
        $notas .= '<tr>';
        $notas .= '<td><h3>Matricula&emsp;</h3></td>';
        $notas .= '<td><h3>Aluno&emsp;</h3></td>';
        $notas .= '<td><h3>Nota</h3></td>';
        $notas .= '</tr>';
        $notas .= '</thead>';
        $notas .= '<tbody>';

        if($total == 0) {
            return;
        }

        if($total <= count($dados)) {
            $cont = 0;
            foreach($dados as $chave) {
                $notas .= '<tr>';
                $notas .= "<td><center>{$chave["matricula"]}</center></td>";
                $notas .= "<td><center>{$chave["aluno"]}</center></td>";
                $notas .= "<td><center>{$chave["nota"]}</center></td>";
                $notas .= '</tr>';

                $cont++;
                if($cont >= $total) break;
            }
        }

        $notas .= '</tbody>';
        $notas .= '</table>';
    
        return $notas;
    })->where('total', '[0-9]+');

    Route::get('/lancar/{nota}/{matricula}/{nome?}', function($nota, $matricula, $nome=null) {
        $dados = array (
            array(
                "matricula" => 1,
                "aluno" => "Maria",
                "nota" => 9,
            ),
            array(
                "matricula" => 2,
                "aluno" => "Cintia",
                "nota" => 2,
            ),
            array(
                "matricula" => 3,
                "aluno" => "Diogo",
                "nota" => 7,
            ),
            array(
                "matricula" => 4,
                "aluno" => "Alice",
                "nota" => 9.8,
            ),
            array(
                "matricula" => 5,
                "aluno" => "Pedro",
                "nota" => 4,
            )
        );

        $notas  = '<table>';
        $notas .= '<thead>';
        $notas .= '<tr>';
        $notas .= '<td><h3>Matricula&emsp;</h3></td>';
        $notas .= '<td><h3>Aluno&emsp;</h3></td>';
        $notas .= '<td><h3>Nota</h3></td>';
        $notas .= '</tr>';
        $notas .= '</thead>';
        $notas .= '<tbody>';

        $flag = 0;

        if($nome != null) {
            foreach ($dados as $chave) {
                if($chave["aluno"] == $nome){
                    $chave["nota"] = $nota;
                    $flag = 1;
                }   

                $notas .= '<tr>';
                $notas .= "<td><center>{$chave["matricula"]}</center></td>";
                $notas .= "<td><center>{$chave["aluno"]}</center></td>";
                $notas .= "<td><center>{$chave["nota"]}</center></td>";
                $notas .= '</tr>';
            }
        }else {
            foreach ($dados as $chave) {
                if($chave["matricula"] == $matricula) {
                    $chave["nota"] = $nota;
                    $flag = 1;
                }

                $notas .= '<tr>';
                $notas .= "<td><center>{$chave["matricula"]}</center></td>";
                $notas .= "<td><center>{$chave["aluno"]}</center></td>";
                $notas .= "<td><center>{$chave["nota"]}</center></td>";
                $notas .= '</tr>';
            }
        }

        $notas .= '</tbody>';
        $notas .= '</table>';

        if($flag == 0){  
            return "<li>NÃO ENCONTRADO!</li>";
        }

        return $notas;
    })->where('nota', '[0-9]+')->where('matricula', '[0-9]+');

    Route::get('/conceito/{A}/{B}/{C}', function($A, $B, $C) {
        $dados = array (
            array(
                "matricula" => 1,
                "aluno" => "Maria",
                "nota" => 9,
            ),
            array(
                "matricula" => 2,
                "aluno" => "Cintia",
                "nota" => 2,
            ),
            array(
                "matricula" => 3,
                "aluno" => "Diogo",
                "nota" => 7,
            ),
            array(
                "matricula" => 4,
                "aluno" => "Alice",
                "nota" => 9.8,
            ),
            array(
                "matricula" => 5,
                "aluno" => "Pedro",
                "nota" => 4,
            )
        );

        $notas  = '<table>';
        $notas .= '<thead>';
        $notas .= '<tr>';
        $notas .= '<td><h3>Matricula&emsp;</h3></td>';
        $notas .= '<td><h3>Aluno&emsp;</h3></td>';
        $notas .= '<td><h3>Nota</h3></td>';
        $notas .= '</tr>';
        $notas .= '</thead>';
        $notas .= '<tbody>';

        foreach ($dados as $chave) {
            if($chave["nota"] < $C) {
                $chave["nota"] = "D";

            }else {
                switch ($chave["nota"]) {
                    case $chave["nota"] >= $C && $chave["nota"] < $B:
                        $chave["nota"] = "C";
                        break;
                    
                    case $chave["nota"] >= $B && $chave["nota"] < $A:
                        $chave["nota"] = "B";
                        break;
                    
                    case $chave["nota"] >= $A:
                        $chave["nota"] = "A";
                        break;
                }
            }

            $notas .= '<tr>';
            $notas .= "<td><center>{$chave["matricula"]}</center></td>";
            $notas .= "<td><center>{$chave["aluno"]}</center></td>";
            $notas .= "<td><center>{$chave["nota"]}</center></td>";
            $notas .= '</tr>';
        }
        
        $notas .= '</tbody>';
        $notas .= '</table>';
    
        return $notas;
    })->where('A', '[0-9]+')->where('B', '[0-9]+')->where('C', '[0-9]+'); 

    Route::post('/conceito', function (Request $request) {
        $dados = array (
            array(
                "matricula" => 1,
                "aluno" => "Maria",
                "nota" => 9,
            ),
            array(
                "matricula" => 2,
                "aluno" => "Cintia",
                "nota" => 2,
            ),
            array(
                "matricula" => 3,
                "aluno" => "Diogo",
                "nota" => 7,
            ),
            array(
                "matricula" => 4,
                "aluno" => "Alice",
                "nota" => 9.8,
            ),
            array(
                "matricula" => 5,
                "aluno" => "Pedro",
                "nota" => 4,
            )
        );

        $notas  = '<table>';
        $notas .= '<thead>';
        $notas .= '<tr>';
        $notas .= '<td><h3>Matricula&emsp;</h3></td>';
        $notas .= '<td><h3>Aluno&emsp;</h3></td>';
        $notas .= '<td><h3>Nota</h3></td>';
        $notas .= '</tr>';
        $notas .= '</thead>';
        $notas .= '<tbody>';

        $request = Request::instance();
        $A = $request["A"];
        $B = $request["B"];
        $C = $request["C"];

        foreach ($dados as $chave) {
            if($chave["nota"] < $C) {
                $chave["nota"] = "D";

            }else {
                switch ($chave["nota"]) {
                    case $chave["nota"] >= $C && $chave["nota"] < $B:
                        $chave["nota"] = "C";
                        break;
                    
                    case $chave["nota"] >= $B && $chave["nota"] < $A:
                        $chave["nota"] = "B";
                        break;
                    
                    case $chave["nota"] >= $A:
                        $chave["nota"] = "A";
                        break;
                }
            }

            $notas .= '<tr>';
            $notas .= "<td><center>{$chave["matricula"]}</center></td>";
            $notas .= "<td><center>{$chave["aluno"]}</center></td>";
            $notas .= "<td><center>{$chave["nota"]}</center></td>";
            $notas .= '</tr>';
        }
        
        $notas .= '</tbody>';
        $notas .= '</table>';
    
        return $notas;
    }); 

})->name('notas');  