<?php
       
	   if(isset($parametros[1]) && $parametros[1] == 'add' && isset($parametros[2]) && $parametros[2] != '0'){
	         $idProd = (int)$parametros[2];
	         $carrinho->verificaAdiciona($idProd);
	     }

	     if(isset($_SESSION['media_produto'][0])){unset($_SESSION['media_produto'][0]);}
         if(count($_SESSION['media_produto']) == 0){unset($_SESSION['valor_frete']);}

         if(isset($parametros[1]) && $parametros[1] == 'add' || isset($_POST['atualizar'])){
		  /*  unset($_SESSION['valor_frete']);*/
		    foreach($_SESSION['media_produto'] as $id => $qtd){
		        unset($_SESSION['valor_frete_'.$id]);
		    }
		}
	     
	     if(isset($parametros[1]) && $parametros[1] == 'del' && isset($parametros[2])){
         $idDel = (int)$parametros[2];
    if($carrinho->deletarProduto($idDel)){
         echo '<script>alert("Produto deletado com suscesso");location.href="'.PATH.'/carrinho"</script>';
    }else{
        echo '<script>alert("Erro ao deletar produto");location.href="'.PATH.'/carrinho"</script>';
    }
}

    if(isset($_POST['prodSingle'])){
	   $produtoValor = $_POST['prodSingle'];

	   if($carrinho->setarByPost($produtoValor)){}else{
	      echo '<p id="aviso">Não foi possível adicionar este produto ao carrinho de compras</p>';
	   }
	}

    if(isset($_POST['atualizar'])){
    $produto = $_POST['prod'];
    foreach($produto as $chave => $qtd){
    $selecionar_produto = BD::conn()->prepare("SELECT * FROM `loja_produtos` Where id = ?");
    $selecionar_produto->execute(array($chave));  
    $fetchProd = $selecionar_produto->fetchObject();
    if($qtd > $fetchProd->estoque){
         echo '<p id="aviso">Não é possível setar mais que: '.$fetchProd->estoque.' produtos para compra deste produto: '.$fetchProd->titulo.'</p>';
         $warn = true;
    }
}

	if($warn == true){}else{
	    if($carrinho->atualizarQuantidades($produto)){
	        echo '<script>alert("Quantidade foi alterada com sucesso");location.href="'.PATH.'/carrinho"</script>';
	    }else{
	        echo '<script>alert("Erro ao atualizar quantidade");location.href="'.PATH.'/carrinho"</script>';
	    }
	  }
}
 

   if(isset($_POST['acao']) && $_POST['acao'] == 'calcular'):
	$frete = $_POST['frete'];
    $_SESSION['frete_type'] = $frete;
	$cep = strip_tags(filter_input(INPUT_POST, 'cep'));
	switch($frete){
	    
	    case 'pac';
	       $valor = '41106';
	       $peso_total = 0;
	       foreach($_SESSION['media_produto'] as $id => $qtd){ 
	            $selecionar_produto = BD::conn()->prepare("SELECT peso FROM `loja_produtos` WHERE id = ?");
	            $selecionar_produto->execute(array($id));
	            $fetch_produto = $selecionar_produto->fetchObject();
	            
	            $_SESSION['valor_frete_'.$id] = $carrinho->calculaFrete($valor, 81750040, $cep, $fetch_produto->peso);
	       }
	    break;

	    case 'sedex';
	       $valor = '40010';
	       $peso_total = 0;
	       foreach($_SESSION['media_produto'] as $id => $qtd){ 
	            $selecionar_produto = BD::conn()->prepare("SELECT peso FROM `loja_produtos` WHERE id = ?");
	            $selecionar_produto->execute(array($id));
	            $fetch_produto = $selecionar_produto->fetchObject();
	            $_SESSION['valor_frete_'.$id] = $carrinho->calculaFrete($valor, 81750040, $cep, $fetch_produto->peso);
	       }
	     break;
	}
	endif;

	$_SESSION['valor_frete'] = 0;
	foreach($_SESSION['media_produto'] as $id => $qtd){
	   $_SESSION['valor_frete_'.$id] = str_replace(",",".", $_SESSION['valor_frete_'.$id]);
	   

	   $_SESSION['valor_frete'] += $_SESSION['valor_frete_'.$id]*$qtd;
    }


?>
<div id="carrinho-page">
<h1 class="title-page"><img src="<?php echo PATH;?>/images/loja_cart_destaque.png" border="0" alt="" />Minhas Compras</h1>
<form action="<?php echo PATH.'/carrinho/atualizar';?>" method="post" enctype="multipart/form-data">
   <table border="1" cellpadding="0" class="carrinho">
      <thead>
          <tr>
              <th>Produto</th>    
              <th>Quantidade</th>
              <th>Valor Unitário</th>
              <th>Sub Total</th>
              <th>Remover Produto</th>
          </tr>
      </thead>
      <tbody>
          <?php
	       if($carrinho->qtdProdutos() == 0){     
	          echo '<tr><td colspan="5">Não existem produtos em seu carrinho</td></tr>';
	       }else{
	          $total = 0;
		 foreach($_SESSION['media_produto'] as $id => $quantidade){ 
		 	
		    $id = (int)$id;
		    $selecao = BD::conn()->prepare("SELECT * FROM `loja_produtos` WHERE id = ?");
		    $selecao->execute(array($id));
            $fetchProduto = $selecao->fetchobject();
	  ?>
           <tr>
              <td><img src="<?php echo PATH;?>/produtos/<?php echo $fetchProduto->img_padrao;?>" width="100" title="<?php echo $fetchProduto->titulo;?>" id="prodimg" alt="" border="0" /><span><?php echo $fetchProduto->titulo;?></span></td>
	      <td><input type="text" name="prod[<?php echo $id;?>]" value="<?php echo $quantidade;?>" size="3" /></td>
	      <td class="unitario">R$ <?php echo number_format($fetchProduto->valor_atual, 2,',','.');?></td>
	      <td class="sub">R$ <?php echo number_format($fetchProduto->valor_atual * $quantidade, 2,',','.');?></td>
	      <td><a href="<?php echo PATH.'/carrinho/del/'.$id;?>" title="Deletar Produto"><img src="<?php echo PATH;?>/images/del.png" border="0" alt="" /></a></td>
           </tr> 
           <?php $total += $fetchProduto->valor_atual *$quantidade;}}?>
           <tr>  
	    <td colspan="4" align="right" class="last">Total</td>
	    <td class="total, last">R$ <?php echo (isset($_SESSION['valor_frete'])) ?  number_format($total+$_SESSION['valor_frete'],2,',','.') : number_format($total,2,',','.');?></td>
	   </tr>
     </tbody>
     </table>
     <input type="submit" value="Atualizar Quantidade" id="update" name="atualizar" />
</form> 
<div id="opcoes">
    <div id="outros">
	   <span id="resultado-frete">Valor do frete: 
	   <?php echo $_SESSION['valor_frete'];?>
	   </span>
	   <a href="<?php echo PATH.'/verificar';?>" id="finalizar">Finalizar Compra</a>
	   <a href="<?php echo PATH;?>" id="continuar">Continuar Comprando</a>
     </div><!-- outros -->
   <div class="calcular">
       <form action="<?php echo PATH.'/carrinho';?>" method="post" enctype="multipart/form-data">
          <input type="submit" value="Calcular Frete" />
	    <label>
	         <span>Escolha a forma de envio</span>
	         <select name="frete">
	               <option value="">Selecione</option>
	               <option value="pac">PAC</option>
	               <option value="sedex">SEDEX</option>
	         </select>
	    </label>
	    <label>
	         <span>Seu CEP</span>
	         <input type="text" name="cep" />
	    </label>
	    <input type="hidden" name="acao" value="calcular" />
	    
	</form>
   </div><!-- calcular -->
</div><!-- opçoes -->
</div><!-- carrinho page -->
<?php (isset($_SESSION['valor_frete'])) ? 
	   $_SESSION['total_compra'] = number_format($total+$_SESSION['valor_frete'],2,',','.'):
	   $_SESSION['total_compra'] = number_format($total,2,',','.');
           $_SESSION['total_compra'] = str_replace(",",".", $_SESSION['total_compra']);
           
?>