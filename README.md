Tempo: 11:00h
Data: 00hrs | 12.05

## Wordpress Installation | MAMP
> Menu MAMP > Preferences > Set Web & MySQL port to 80  & 3306 (!!! IMPORTANT)<br>
>entrada no BROWSER: /http://localhost/


#### | Instalar o Wordpress
1. - Download do Wordpress (wordpress.org)<br>
2. - Criar uma pasta do repositório de sites do MAMP<br>
3. - Extrair os arquivos do Wordpress nela<br>
4. - Criar um Banco de Dados no phpMyAdmin<br>
Abra o phpMyAdmin > Databates > Escolha o nome > Clique em Create<br>
5. - Criar o usuário do Banco de Dados
phpMyAdmin > Users > Add User > Nome, host(localhost), password.
Maque Check All em Global Privileges<br>
6. - Acessar o site e instalar o Wordpress<br>
7. - Criar o usuário do wordpress<br><br>


#### | Após Instalar o Wordpress
1. - Copiar a pasta do site para wp-content/themes/<br>
2. - Mudar o index.html para index.php<br>
3. - Colocar/criar o arquivo style.css na raiz do tema<br>
4. - Adicionar a descrição do tema no topo do style.css<br>

- style.css
```bash
/*
Theme Name: Efetivos
Theme URI: http://Efetivos.com
Author: Victor Costa
Author URI: http://efeitvos.com/
Description: Tema do Wordpress
Version: 1.0
*/
```
5. - Ativar o tema no Menu do Wordpress<br>
6. - Corrigir o caminho do style.css e outros caminhos se necessário<br>
Essa função adiciona o caminho até a raiz do tema:
> //Style Css
```bash
<?php echo get_stylesheet_directory_uri(); ?>
ex.: <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
```
> //Imagens e JS
```bash
<?php echo get_template_directory_uri(); ?>/
ex.: <img src="<?php echo get_template_directory_uri(); ?>/images/logo-efet-branco.svg" alt="" class="logo-footer">
```

7. - Separar o header e footer em arquivos header.php e footer.php><br>
Adicionar antes de fechar o head:
```bash
 <?php wp_head(); ?>
```
Adicionar antes de fechar o body: 
```bash
<?php wp_footer(); ?>
```
Adicionar o header e footer nas páginas do site e mudá-las para .php com:
> Titulo Dinâmico
```bash
    <title>
	<?php 
		if(is_front_page())
			echo "Front Page Title";
		else if(is_404())
			echo "Page Not Found";
		else
			the_title();
		echo ' | '.get_bloginfo('name');  
	?>
</title>
```

7.1 - ADICIONAR TEMPLATES:
```bash
<?php
    //Template Name: Blog Post
    get_header();
?>
```
> 1. Criar Nova Página no Wordpress  e Escolher Home como Modelo  da página. <br>
> 2. Escolhe o Modelo correto para cada página
> 3. Ir Até Configurações > Leitura > Escolher página Estatica e Escolher Página Criada (Pagina Home)<br>
> 4. Adicionar Loop nas Paginas Templates( Que não se repetem. Ex.: Página Sobr, Contato )
```bash
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

//conteudo html
//conteudo html
//conteudo html

<?php endwhile; else: endif ?>
```

8. - Começar a substituir o conteúdo por funções de Wordpress<br>
Mostra o nome do blog:
```bash
<?php bloginfo('name'); ?>
```

9. - Adicionar as páginas na interface do Wordpress<br>

10 - Transformar as páginas em HTML, em templates de Páginas<br>
A página index.php deve estar reservada para conteúdo genérico.<br>
> index.php
```bash
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>

<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
```

# Criando Fields 
### - Custom Post UI
1. Instalar Plugin: Custom Post Type UI > Por WebDevStudios
2. Criar Novo Custom Post: <br>
Ex.: portfolio<br>
Plural.: Portfolio Items<br>
Terceiro.: portfolio<br>
Ticar opções: <br>
Suports: Title, Editor, Featured Image<br>
Built-in Taxonomies: Categorias (WP Core)
``` bash
$args = array(
    'post_type' => 'casting', //Nome do Custom Post
    'category_name' => $current_cat->slug
);
```

### - Advanced Custom Fields Pro
1. Instalar Plugin: Advanced Custom Fields Pro > Por elliot condon
2. Criar Novo Grupo de Campos
3. Colocar Titulo
4. Escolher Locar > Nome do CUSTOM POST (!! IMPORTANTE)
5. Adicionar Campo
> Rotulo do Campo: photo1<br>
> Nome do Campo: photo1<br>
> Tipo do Campo: Ex.: Image
``` bash
$photo1 = get_field('photo1');
```




# Criando Páginas:
### Page Home > page-home.php 
```bash
<?php
    //Template Name: Home
    get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- --------------- MAIN --------------- -->
    <!-- --------------- MAIN --------------- -->
    <div class="box-title-cat">
        <h1 class="title-cat ">CASTING</h1>
    </div>

    <main class="main">
        <div class="holder-main">


<?php
$args = array(
    'post_type' => 'casting' //Slug Custom Post 
    
);

$my_query = new WP_Query( $args );                            
if ( $my_query->have_posts() ) {                            
    while ( $my_query->have_posts() ) {
        $my_query->the_post();
        $photo1 = get_field('photo1'); //variavel com a photo do Custom Field
?>
					
		<!-- init-post -->
		<div class="box-post e-rel">
			<!-- photo-post -->
			<a href="<?php the_permalink(); ?>">
			<div class="box-photo-post e-wp">
				<img src="<?php echo $photo1[sizes][large]; ?>" alt="" class="photo-main e-wp e-hp e-img-fit"> //recebe photo da variavel
			</div></a>


			<!-- text-post -->
			<div class="ctn-text-post ">
				<a href="<?php the_permalink(); ?>"> <h1 class="title-post e-wp e-sans"><?php the_title(); ?></h1></a> //recebe title
			</div>
		</div><!-- close-post -->
<?php 
    } //close while
}//close if

// Reset the `$post` data to the current post in main query.
wp_reset_postdata();
?>

        </div>
    </main>
    <?php endwhile; else: endif ?>
<?php get_footer(); ?>
```
<br>
<br>



# Page Post > single.php 
```bash
<?php
    //Template Name: Page Post
    get_header();
?>

    
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			// ?>


<div  class="post-page-main">

<!-- --------------- MAIN --------------- -->
    <!-- --------------- MAIN --------------- -->
    <div class="box-title-cat e-flex-col e-wvw e-rel">
        <h1 class="title-cat e-serif"><?php the_title() ?></h1> //Titulo do Post
        <h2 class="categories e-sans"  style="text-transform: uppercase;"><?php the_category(); ?></h2> //categoria do post
        <div class="traco-fixed e-abs "></div>
    </div>

        <main class="main e-flex e-wvw">
            <div class="holder-main  e-rel ">
                <!-- --- box images ---- -->
                <div class="box-images-main e-flex-wrap e-wp ">
                <?php $photo1 = get_field('photo1');?> //I
                <?php $photo2 = get_field('photo2');?> //I
                <?php $photo3 = get_field('photo3');?> //I
                    <img src="<?php echo $photo3[sizes][large]; ?>" alt="" class="photo-main e-wp">
                    <img src="<?php echo $photo2[sizes][large]; ?>" alt="" class="photo-main e-wp">
                    <img src="<?php echo $photo1[sizes][large]; ?>" alt="" class="photo-main e-wp">
                </div>

                <?php the_content();  // conteudo wp?> 
            </div>
        </main>
    </div>

</div> <!-- close post mains -->
<?php
		} // end while
	} // end if
	?>
<?php get_footer(); ?>
```
<br>
<br>

# Página de Categorias > category.php 

```bash
<?php
    get_header();
?>

    <div class="box-title-cat e-flex e-wvw">
        <h1 class="title-cat e-serif" style="text-transform: uppercase;"><?php single_cat_title(); ?></h1> //recebe titulo da categoria
    </div>


    <!-- --------------- MAIN --------------- -->
    <!-- --------------- MAIN --------------- -->
    <main class="main e-flex e-wvw">
        <div class="holder-main e-wp e-rel e-flex-wrap">

<?php

	$current_cat = get_category($cat); //get current category

$args = array(
    'post_type' => 'casting',
    'category_name' => $current_cat->slug //recebe variavel
);


$my_query = new WP_Query( $args );                            
if ( $my_query->have_posts() ) {                            
    while ( $my_query->have_posts() ) {
        $my_query->the_post();
        $photo1 = get_field('photo1');
?>
        <!-- init-post -->
        
        <div class="box-post e-rel">
            <!-- photo-post -->
            <a href="<?php the_permalink(); ?>">
            <div class="box-photo-post e-wp"> 
             <img src="<?php echo $photo1[sizes][large]; ?>" alt="" class="photo-main e-wp e-hp e-img-fit">
            </div></a>
            <!-- text-post -->
            <div class="ctn-text-post ">
                <a href="<?php the_permalink(); ?>"> <h1 class="title-post e-wp e-sans"><?php the_title(); ?></h1></a>
            </div>
        </div><!-- close-post -->      

<?php 
    }
}
// Reset the `$post` data to the current post in main query.
wp_reset_postdata();
?>

        </div>
    </main>

<?php get_footer(); ?>
```

# Search Page Result > search.php 
```bash
<?php /* Template name: Custom Search */   
    get_header(); 
?>



    <!-- --------------- MAIN --------------- -->
    <!-- --------------- MAIN --------------- -->
    <main class="main e-flex e-wvw">
        <div class="holder-main e-wp e-rel e-flex-wrap">
        <?php 

$text = get_search_query();
$photo1 = get_field('photo1'); ?>
   <div class="box-title-cat e-flex e-wvw">
        <h1 class="title-cat e-serif" style="text-transform: uppercase;">PROCURANDO POR:  <?php echo $text; ?></h1>
    </div>
<?php


		if( have_posts() ):
			
			while( have_posts() ): the_post(); ?>                
                
                <div class="box-post e-rel">

                    <!-- photo-post -->
                    <a href="<?php the_permalink(); ?>">
                        <div class="box-photo-post e-wp"> 
                        <?php the_post_thumbnail('large', array('class' => 'photo-main e-wp e-hp e-img-fit')); ?>
                    </div></a>

                    <!-- text-post -->
                    <div class="ctn-text-post ">
                        <a href="<?php the_permalink(); ?>"> <h1 class="title-post e-wp e-sans"><?php the_title(); ?></h1></a>
                    </div>
                </div><!-- close-post -->
			
            <?php endwhile;       
            else : ?>
                <h1>NADA ENCOANTRADO</h1>
        <h4>Searching for: <?php echo $text; ?></h4>
	<?php endif;    ?>

        </div>
    </main>
<?php get_footer(); ?>
```


### Functions > functions.php 
```bash
<?php 

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Habilitar Menus
add_theme_support('menus');
add_theme_support( 'post-thumbnails' ); 

?>
```

# Continuação
11. - Adicionar o Loop
O Loop é utilizado para mostrar o conteúdo dos posts,
ele é inteligente o suficiente para saber se precisa mostrar apenas um ou uma sequência.

Adicionar o Loop as páginas e ao index.php
```bash
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php the_title(); ?>
	<?php the_content(); ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
```

12. - Advanced Custom Fields

Adicionar o Plugin Advanced Custom Fields Pro
(Nota: O Pro é pago e só pode ser utilizado nos arquivos do curso).
(Existem alternativas, mas a lógica é a mesma)

Iniciar a troca do conteúdo por fields, <?php the_field('nome_conteudo'); ?>
Adicionar o conteúdo a interface do Custom Fields.

13. - Repeater Field
```bash
<?php if(have_rows('nomedorepeater')): while(have_rows('nomedorepeater')) : the_row(); ?>
	
	the_sub_field('nomedocampo');

<?php endwhile; else : endif; ?>
```


14. - Pegar valores de outras páginas
```bash
<?php
	$contato = get_page_by_title('contato');
	the_field('telefone', $contato)
?>
```
15. - Terminar de adicionar os outros campos
```bash
<?php echo date("Y"); ?> (Mostrar a data)
```
16. - Adicionar campos para SEO
```bash
<title><?php bloginfo('name'); ?> - <?php wp_title(''); ?> <?php the_field('title_seo'); ?></title>
<meta name="description" content="<?php bloginfo('name'); ?> - <?php wp_title(''); ?> <?php the_field('description_seo'); ?>">
```
17. - Adicionar o Functions.php
```bash
<?php 

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Habilitar Menus
add_theme_support('menus');
add_theme_support( 'post-thumbnails' ); 

?>
```

## 18. - Adicionar o Menu

// Habilitar Menus
```bash
add_theme_support('menus');

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

<?php
	$args = array(
		'menu' => 'principal',
		'container' => false
	);
	wp_nav_menu( $args );
?>
```


# Atalhos & Funções para WP
> - Previous & Next links e Thumbnails para Post
```bash

// ---------- PREVIOUS

<?php   
    $prevPost = get_previous_post();
    $prevThumbnail = get_the_post_thumbnail( $prevPost->ID );
?>
<div><?php  previous_post_link( '%link', $prevThumbnail );?></div>
<div class="navigation"><p><?php previous_post_link(); ?> </div>

// ---------- NEXT
<?php   
    $nextPost = get_next_post();
    $nextThumbnail = get_the_post_thumbnail( $nextPost->ID );
?>
<div><?php  next_post_link( '%link', $nextThumbnail );?></div>
<div class="navigation"><p><?php next_post_link(); ?></div>

// ----------- MESMA CATEGORIA
<div class="navigation"><p><?php next_post_link('%link', '%title', TRUE ); ?></div>
<div class="navigation"><p><?php previous_post_link('%link', '%title', TRUE ); ?></div>
```

> GET CURRENT SLUG CATEGORY POST
```bash
   <?php $category = get_the_category(); echo $category[0]->slug; ?>">
        <?php echo $category[0]->cat_name; ?>
```

> Thumbnail com Classe Personalizada
```bash
<?php the_post_thumbnail('large', array('class' => 'photo-main e-wp e-hp e-img-fit')); ?>
```

> Formulário de Search
```bash
    <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
        <input type="search" class="form-control" placeholder="Escreva sua busca" value="<?php echo get_search_query() ?>" name="s" title="Search" />
    </form>
```