<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

		<!-- Generate favicon, apple touch icons and Windows Phone icon at http://realfavicongenerator.net/ -->
    <!-- Esempio: -->
    <!-- <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-32x32.png" sizes="32x32"> -->

    <!-- Questo pezzo di codice permette di impostare l'immagine per facebook e twitter se ci si trova in una pagina con featured image impostata da backoffice -->
    <?php $page_image = $post ? get_the_post_thumbnail_url($post, 'huge') : false; ?>
    <?php if ($page_image): ?>
      <meta property="og:image" content="<?php echo $page_image; ?>" />
      <meta name="twitter:image" content="<?php echo $page_image; ?>">
    <?php endif ?>

    <!-- Questa funzione di Wordpress carica tutti i tag della head impostati da Wordpress -->
		<?php wp_head(); ?>
	</head>

  <!-- La funzione di Wordpress body_class() aggiunge al body delle classi specifiche in base alla pagina sulla quale ci si trova -->
  <!-- Questo permette di stylare con il css specificatamente elementi di diverse pagine -->
	<body <?php body_class(); ?>>

	<div class="pre-header">
		<a href="http://www.fettadipolenta.it/categoria-prodotto/laboratori/">Area prenotazioni</a>

   <?php if(is_user_logged_in()) {
 				echo "Account di ".wp_get_current_user()->user_login;
				echo '<label class="logout"><a href="http://www.fettadipolenta.it/mio-account/customer-logout/">Logout</a> </label>';
			} else {
				echo '<label class="login_button"><a href="http://www.fettadipolenta.it/login/">Login</a> </label>';
				echo '<label class="register_button"><a href="http://www.fettadipolenta.it/register">Registrati</a> </label>';
			}
	 ?>
	</div>

  <div class="page-wrapper"> <!-- Apro page-wrapper -->

		<div class="header">
			<div class="header-title">
				<img class="header-logo" src="<?php  echo get_field('logo', get_option( 'page_on_front' ))['url']; ?>" alt="">
			</div>
			<?php
			// Utilizziamo la funzione dichiarata in inc/menu.php per posizionare qui il menu header
			header_menu();
			?>
		</div>
