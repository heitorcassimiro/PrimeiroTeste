<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Handy</title>
	<link href="style/cadP.css" rel="stylesheet" type="text/css" />
	<link href="style/menu2.css" rel="stylesheet" type="text/css" />
  <link href="style/BtnFooter.css" rel="stylesheet" type="text/css" />

  <link rel="sortcut icon" href="image/favicon.ico" type="image/x-icon" />

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cormorant+Upright:wght@700&family=Lora:wght@700&family=Roboto:wght@700&display=swap" rel="stylesheet">
</head>

<body>
	  <header>
		<section class="logo">
			<img class="imagelogo" src="image/logomao.png" alt="avatar">
            <h1>HANDY</h1>
        </section>

        <!--MENU-->
            
        <section class="menu">

            <ul class="menulista">
                
                <a href="homePage.html">Página Inicial</a>
            
                <a href="filtro.html">Buscar prestador</a>  
            
                <a href="sobreNos.html">Quem Somos</a>
                            
                <a href="contato.html">Contato</a>
                            
                <a href="faq.html">FAQ</a>
  
            </ul>

            <button onclick="window.location.href='login.html';" class = "botaologin">Login</button>

            <img class = "imageusuario"src="image/brabo.jpg" alt="avatar usuario" onclick="window.location.href='login.html';">
            
        </section>

    </header>

    <main>
      <section class="cadastro">

        <div class="cadastro-prest">
          <form class="forms-prest" method="post" action="cadPrestador2.php">
            <h2 class="titulo">Cadastro Prestador</h2>

              <p>
                <label for="nome" class="nome"> Nome: </label>
                <input type="text" id="nome" name="nome" class="nome" placeholder="Ex.:Lucas Gabriel " required>
              </p>

              <div class="bloco1">
                <section>
                  <label for="telefone" class="telefone"> Telefone: </label>
                  <input type="tel" id="celular" class="telefone" name="telefone" placeholder="Ex.: (99) 9999-9999">
                </section>

                <section class="celularB">
                  <label for="celular" class="telefone"> Celular: </label>
                  <input type="tel" id="celular" class="telefone" name="celular" placeholder="Ex.: (99) 9999-9999" >
                </section>
              </div>

              <div class="bloco2">
                <section>
                  <label for="cpf" class="cpf"> CPF/CNPJ: </label>
                  <input type="text" id="cpf" class="cpf"  name = "cpf" placeholder="Ex.:999.999.999-99" required>
                </section>

                <section class="profs">            
                  <label for="profissao" class="profissao">Profissão</label>
                  <select id="profissao" name = "profissao" class="profissao" required>
                    <option value="" selected>Selecione uma opção</option>
                    <option value="garcom">Garçom</option>
                    <option value="Churrasqueiro">Churrasqueiro</option>
                    <option value="confeiteiro">Confeiteiro</option>
                    <option value="músico">Músico</option>
                    <option value="decorador" >Decorador</option>
                    <option value="cerimonialista" >Cerimonialista</option>
                    <option value="florista" >Florista</option>
                    <option value="segurança" >Segurança</option>
                    <option value="recreador" >Recreador</option>
                    <option value="fotografo" >Fotografo</option>
                  </select>
                </section>
              </div>
              
              <div class="bloco3">
                <section>
                  <label for="estado" class="estado">Estado</label>
                  <select id="estado" name = "estado" class="estado" required>
                    <option value="" selected>Selecione um estado</option>
                    <option value="pernambuco">Pernambuco</option>
                  </select>
                </section>
                
                <section class="cidadesB">
                  <label for="cidades" class="cidades" id="cidades">Cidades</label>
                  <select id="cidade" name = "cidade" class="cidades" required>
                    <option value="" selected>Selecione uma cidade</option>
                    <option value="Recife">Recife</option>
                    <option value="Jaboatão">Jaboatão dos Guararapes</option>
                    <option value="Olinda">Olinda</option>
                    <option value="Camaragibe" >Camaragibe</option>
                    <option value="Paulista" >Paulista</option>
                    <option value="Igarassu">Igarassu</option>
                    <option value="Abreu">Abreu e Lima</option>
                    <option value="Caruaru">Caruaru</option>
                    <option value="Vitoria">Vitoria de Santo</option>
                    <option value="Gravata">Gravatá</option>
                  </select>

                </section>
              </div>

              <div class="foto-genero">

                <section>
                  <label for="img" class="upfoto">Select image:</label>
                    <input type="file" id="img" name="img" class="upfoto" accept="image/*">
                    <input type="submit" id="enviar-foto">
                </section>

                <section class="generoB">

                  <label for="genero" class="genero" id="genero">Gênero</label>
                  <select id="genero" class="genero" name = "genero" required>
                    <option value="" selected>Selecione uma opção</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Drag-Queen">Drag-Queen</option>
                    <option value="Transsexual">Transsexual</option>
                    <option value="Outro" >Outro</option>
                    <option value="nãoIndormado">Prefiro não informar</option>
                  </select>

                </section>
              </div>

              <div class="cid">
                <label for="cidadesAtende" class="cidades">Cidades que atende</label>
                  <select id="cidadeAtende" name = "cidadeAtende" class="cidades">
                      <option value="" selected>Selecione uma cidade</option>
                      <option value="Recife">Recife</option>
                      <option value="Jaboatão">Jaboatão dos Guararapes</option>
                      <option value="Olinda">Olinda</option>
                      <option value="Camaragibe" >Camaragibe</option>
                      <option value="Paulista" >Paulista</option>
                      <option value="Igarassu">Igarassu</option>
                      <option value="Abreu">Abreu e Lima</option>
                      <option value="Caruaru">Caruaru</option>
                      <option value="Vitoria">Vitoria de Santo</option>
                      <option value="Gravata">Gravatá</option>
                  </select>
                  <div class="bloco1">
                  <session class="celularB">
                  <p>
                <label for="senha" class="senha"> Senha: </label>
                <input type="password" id="celular" class="telefone" name="senha" placeholder="Digite sua senha" >
                 </p>
              </session>
              </div>
              </div>
              

                <div>
                  <input type="checkbox" id="concordo" name="concordo" required>
                  <label for="concordo">Eu li e concordo com a Política de Privacidade e Termo de Uso</label>
                </div>
                  

                <div class="bloco-contas">
                  <div class="radioc">
                    <input type="radio" id="plano" name="plano" value="gratis" class="radioc" required>
                  <label for="gratis" class="radioc">Grátis</label>
      
                  <input type="radio" id="plano" name="plano" value="premium" class="radioc">
                  <label for="premium" class="radioc">Premium</label>
                </div>
                    
                <section class="conta">

                  <div class="gratis">

                    <h3>GRÁTIS</h3>

                    <p>ANUNCIAR SERVIÇOS</p>
                    <p>FOTOS ILIMITADAS</p>

                  </div>
                  <input type="hidden" name="status"value="1" />
                  <div class="premium">

                      <h3>PREMIUM</h3>

                      <p>MAIOR VISIBILIDADE</p>
                      <p>SEM ANÚNCIOS</p>
                      <p>FOTOS E VÍDEOS ILIMITADAS</p>
                    
                      <div class="preco">
                        <p><strong>R$7,99 P/MÊS</strong></p>
                        <p><strong>R$49,99 P/ANO</strong></p>    
                      </div> 

                  </div>


                </section>

              </div>
          
        <div class="botoes">
      
          <input type="submit" value="Cadastrar">

          <input type="reset" class = "botaoLimpar" value="Limpar">

        </div>

          </form>
        </div>

        
      
      </section>

      <footer>
        <button onclick="window.history.back()"> < </button>
      </footer>

    </main>
    
    <script src="script.js"></script>
  </body>
</html>