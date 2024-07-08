<?php
// Add this line to start the session
include "z_db.php";
$username = $_SESSION['username'];
?>

<?php
error_reporting(10);
?>
<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
      <?php
$stmt = $con->prepare("SELECT ufile FROM logo");
$stmt->execute();
$r = $stmt->fetch(PDO::FETCH_NUM);

if ($r) {
    $ufile = $r[0];
} else {
    // Lida com o caso em que a consulta não retornou nenhum resultado
    $ufile = ""; // ou atribua um valor padrão adequado
}
?>

        <a href="https://construtoradl20235.000webhostapp.com/index.php" class="logo logo-dark">
            <span class="logo-sm">
                <img src="uploads/logo/<?php print $ufile ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="uploads/logo/<?php print $ufile ?>" alt="" height="30">
            </span>
        </a>
        <a href="https://construtoradl20235.000webhostapp.com/index.php" class="logo logo-light">
            <span class="logo-sm">
                <img src="uploads/logo/<?php print $ufile ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img  src="uploads/logo/<?php print $ufile ?>" alt="" height="30">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a href="dashboard" class="nav-link" data-key="t-analytics"> <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">D&L</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarG" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-landing">Gerenciar usuário</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarG">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-usuario" class="nav-link" data-key="t-one-page">Adicionar novo </a>
                            </li>
                            <li class="nav-item">
                                <a href="usuario-listar.php" class="nav-link" data-key="t-nft-landing">Todas as listas</a>
                            </li>
                        </ul>
                    </div>
                </li>
             <li class="nav-item">
                 <a class="nav-link menu-link" href="#sidebarA" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-landing">Página inicial</span>
                 </a>
                   <div class="menu-dropdown collapse" id="sidebarA" >
                       <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                               <a href="add-pagina-inicial.php" class="nav-link" data-key="t-one-page">Adicionar novo </a>
                          </li>
                     <li class="nav-item">
                              <a href="pagina-inicial.php" class=" nav-link" data-key="t-nft-landing">Todas as listas </a>
                         </li>
                        </ul>
                    </div>
                </li>
                <!--pagina-curso-->
                <li class="nav-item">
                 <a class="nav-link menu-link" href="#sidebarcurso" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-landing">Página Curso</span>
                 </a>
                   <div class="menu-dropdown collapse" id="sidebarcurso" >
                       <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                               <a href="adicionar-curso" class="nav-link" data-key="t-one-page">Adicionar novo Curso </a>
                          </li>
                     <li class="nav-item">
                              <a href="listar-cursos.php" class=" nav-link" data-key="t-nft-landing">Todas as listas </a>
                         </li>
                        </ul>
                    </div>
                </li>
                <!--pagina--curso-->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarH" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-landing">Página sobre</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarH">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-sobre.php" class="nav-link" data-key="t-one-page">Adicionar novo </a>
                            </li>
                            <li class="nav-item">
                                <a href="sobre-listar.php" class=" nav-link" data-key="t-nft-landing">Todas as listas </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarB" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-landing">Gerenciar blog</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarB">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-blog" class="nav-link" data-key="t-one-page">Adicionar novo </a>
                            </li>
                            <li class="nav-item">
                                <a href="blog-listar" class="nav-link" data-key="t-nft-landing">Todas as listas </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-checkbox-multiple-line"></i>
                        <spanz data-key="t-landing">Gerenciar serviços</spanz>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-servico" class="nav-link" data-key="t-one-page">Adicionar novo </a>
                            </li>
                            <li class="nav-item">
                                <a href="servicos-listar" class="nav-link" data-key="t-nft-landing">Todas as listas</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPort" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-rhythm-fill"></i> <span data-key="t-landing">Gerenciar portfólio</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarPort">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-portfolio" class="nav-link" data-key="t-one-page">Adicionar novo</a>
                            </li>
                            <li class="nav-item">
                                <a href="portfolio-listar" class="nav-link" data-key="t-nft-landing">Todas as listas</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarcurri" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-rhythm-fill"></i> <span data-key="t-landing">Gerenciar curriculo</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarcurri">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-curriculo" class="nav-link" data-key="t-one-page">Adicionar novo</a>
                            </li>
                            <li class="nav-item">
                                <a href="curriculo-listar.php" class="nav-link" data-key="t-nft-landing">Todas as listas</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSl" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-image-fill"></i> <span data-key="t-landing">Adicionar video</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarSl">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-video" class="nav-link" data-key="t-one-page"> Adicionar novo</a>
                            </li>
                            <li class="nav-item">
                                <a href="video-listar" class="nav-link" data-key="t-nft-landing">Todas as listas</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="static" class="nav-link" data-key="t-nft-landing"> Static Slides</a>
                            </li> -->
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSZ" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-image-fill"></i> <span data-key="t-landing">Adicionar banner</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarSZ">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-banner.php" class="nav-link" data-key="t-one-page"> Adicionar novo</a>
                            </li>
                            <li class="nav-item">
                                <a href="banner-listar.php" class="nav-link" data-key="t-nft-landing">Todas as listas</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="static" class="nav-link" data-key="t-nft-landing"> Static Slides</a>
                            </li> -->
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarX" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-chrome-fill"></i> <span data-key="t-landing">Redes sociais</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarX">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-rede-social" class="nav-link" data-key="t-one-page"> Adicionar novo </a>
                            </li>
                            <li class="nav-item">
                                <a href="rede-social-listar" class="nav-link" data-key="t-nft-landing">Todas as listas </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarT" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-message-line"></i> <span data-key="t-landing">Gerenciar testemunhas</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarT">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-testemunha" class="nav-link" data-key="t-one-page">Nova testemunha</a>
                            </li>
                            <li class="nav-item">
                                <a href="testemunha-lista" class="nav-link" data-key="t-nft-landing">Todas as listas</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarW" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Quem somos</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarW">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="adicionar-quemsomos" class="nav-link" data-key="t-one-page"> Adicionar novo </a>
                            </li>
                            <li class="nav-item">
                                <a href="quem-somos-listar" class="nav-link" data-key="t-nft-landing"> Todas as listas </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarK" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-tools-fill"></i> <span data-key="t-landing"> Congiguração do site</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarK">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="site-configuracoes" class="nav-link" data-key="t-one-page">Site configurações</a>
                            </li>
                            <li class="nav-item">
                                <a href="secao-titulos" class="nav-link" data-key="t-nft-landing"> Seção títulos</a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="atualizar-contato" class="nav-link" data-key="t-nft-landing">Atualizar contato</a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarz" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                        <i class="ri-tools-fill"></i> <span data-key="t-landing"> Logo</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarz">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="atualizar-logo" class="nav-link" data-key="t-nft-landing"> Atualizar logo</a>
                            </li>
                            <li class="nav-item">
                                <a href="adicionar-logo" class="nav-link" data-key="t-nft-landing">Adicionar-logo</a>
                            </li>
                            <li class="nav-item">
                                <a href="logo-listar.php" class="nav-link" data-key="t-nft-landing">Listar-logo</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>