<?php

/*

Carrega o model com as classes

*/
require_once base_url('model/classes.php');

/*

Cria novo objeto

*/
$item = new Item();

/*

Carrega as views de acordo com o GET['acao']

*/
if ( empty($_GET['acao']) ) { $_GET['acao'] = 'index'; }

switch ( $_GET['acao'] ) {
    case 'index':
        $tmpl = new Template('templates/template.tpl','view/item/index.php', array('titulo' => 'Painel usuario',
                                                                                    'header' => 'Perfil',
                                                                                    'sub_header' => 'adicionar'));
        echo $tmpl->render();
        break;
    case 'listar':
        #$listar = $perfil->listarTodos();
        $data = array('titulo' => 'Painel usuario',
                      'listar' => $item->listarTodos(),
                        'header' => 'Perfil',
                        'sub_header' => 'listar');
        $tmpl = new Template('templates/template.tpl','view/item/listar.php', $data);
        echo $tmpl->render();
        break;
    case 'editar':
        $id = $_GET['id'];
        #$resultado = $perfil->procurar($id);
        $data = array('resultado' => $item->procurar($id));
        $tmpl = new Template('templates/template.tpl','view/item/editar.php', $data);
        echo $tmpl->render();
        #include 'view/perfil/editar.php';
        break;
     case 'deletar':
        $id = $_GET['id'];
        if ($item->deletar($id)){ setcookie('msg',"Deletado!"); }
        redirect('index.php?pag=perfil&acao=listar');
        break;
    case 'novo':
        $return =  adicionar();
        setcookie('msg', $return);
        redirect('?pag=perfil');
        break;
    case 'atualizar':
        $return = atualizar();
        setcookie('msg', $return);
        redirect('?pag=perfil&acao=editar&id=' . $_GET['id']);
        break;
}

/*

Execução dos métodos


if (isset($_POST)) { #Quando algum $_POST for lançado, será verificado qual e executará a função um método (funções logo abaixo).
    switch (isset($_POST['acao'])){
        case 'novo':
            adicionar();
            break;
        case 'update':
            atualizar();
            break;
    }
}

*/


/*

Metodos

*/
function atualizar(){
$item = new Item(); #Cria novo objeto
$nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
$id = $_GET['id'];
if (empty($nome)){ #Verifica se os campos estão preenchidos
    return "Dados em branco!"; #Se não tiver, armazena mensagem para mostrar.
    } else {
            $nome  = htmlspecialchars(strip_tags($_POST['nome'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
            $item->__set('nome', $nome); #Pega o que foi digitado e muda seu valor no objeto
            $id = $_GET['id']; #Pega o ID para localizar no Banco de dados
            if ($item->atualizar($id)){ #Aqui faz o insert e seta um cookie para mostrar depois, dependendo da situação (se deu certo ou não)
                return 'Dados atualizados!'; # Deu bom
            } else {
                return '"Ocorreu algum erro..'; # Deu ruim
            }

    }
   #redirect('index.php?pag=perfil&acao=editar&id='.$id);  #Tudo feito, redireciona de volta à página, evitando looping de requisições.
}


function adicionar(){
$item = new Item();
    // resgata variáveis do formulário
    $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; #Resgata variáveis do formulário
    if (empty($nome)){ #Verifica se os campos estão preenchidos
        return 'Dados em branco!'; #Se não tiver, armazena mensagem para mostrar.
        } else {
                $nome  = htmlspecialchars(strip_tags($_POST['nome'])); #O html special e strip_tags serve para evitar a tentativa de sql_eject no BD
                $item->__set('nome', $nome);

                if ($item->adicionar()){ #Aqui faz o insert e seta um cookie para mostrar depois dependendo da situação (se deu certo ou não)
                    return 'Novo item cadastrada!'; #Deu bom
                } else {
                    return 'Ocorreu algum erro..'; #Deu ruim
                }

        }
        #redirect('index.php?pag=perfil'); #Tudo feito, redireciona de volta à página, evitando looping de requisições.
} ?>
