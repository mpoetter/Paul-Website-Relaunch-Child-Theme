<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * Template header
 */
$us_layout = US_Layout::instance();
?>
<!DOCTYPE HTML>
<html class="<?php echo $us_layout->html_classes() ?>" <?php language_attributes( 'html' ) ?>>
<head>
	<meta charset="UTF-8">

	<?php /* Don't remove the semicolon in the title tag below: it's needed for Theme Check */ ?>
	<title><?php wp_title( '' ); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

<?php if ( us_get_option( 'favicon' ) ): ?>
	<?php $favicon = usof_get_image_src( us_get_option( 'favicon' ) ); ?>
<?php if ( $favicon ): ?>
	<link rel="shortcut icon" href="<?php echo esc_url( $favicon[0] ); ?>">
<?php endif/*( $favicon )*/; ?>
<?php endif/*( us_get_option( 'favicon' ) )*/; ?>

	<?php wp_head() ?>

	<?php global $us_generate_css_file; if ( ! isset( $us_generate_css_file ) OR ! $us_generate_css_file ): ?>
	<style id='us-theme-options-css' type="text/css"><?php us_load_template( 'templates/theme-options.min.css' ) ?></style>
	<?php endif; ?>
</head>
<body <?php body_class('l-body '.$us_layout->body_classes()) ?><?php echo $us_layout->body_styles() ?>>

<?php do_action( 'us_before_canvas' ) ?>

<!-- CANVAS -->
<div class="l-canvas <?php echo $us_layout->canvas_classes() ?>">

<?php if ( $us_layout->header_show != 'never' ): ?>

	<?php do_action( 'us_before_header' ) ?>

	<!-- HEADER -->
	<header class="l-header <?php echo $us_layout->header_classes() ?>">

		<?php if ( $us_layout->header_layout == 'extended' ): ?>
		<div class="l-subheader at_top">
			<div class="l-subheader-h i-cf">

				<?php do_action( 'us_top_subheader_start' ) ?>

				<?php if ( us_get_option( 'header_contacts_show' ) OR us_get_option( 'header_show_custom' ) ): ?>
					<?php us_load_template( 'templates/widgets/contacts' ); ?>
				<?php endif; ?>

				<?php if ( us_get_option( 'header_language_show' ) ): ?>
					<?php us_load_template( 'templates/widgets/lang' ); ?>
				<?php endif; ?>

				<?php if ( us_get_option( 'header_socials_show' ) ): ?>
					<?php us_load_template( 'templates/widgets/socials' ); ?>
				<?php endif; ?>

				<?php do_action( 'us_top_subheader_end' ) ?>

			</div>
		</div>
		<?php endif/*( $us_layout->header_layout == 'extended' )*/; ?>
		<div class="l-subheader at_middle">
			<div class="l-subheader-h i-cf">

				<?php do_action( 'us_middle_subheader_start' ) ?>

				<?php us_load_template( 'templates/widgets/logo' ) ?>

				<?php if ( $us_layout->header_layout == 'advanced' ): ?>

					<?php if ( us_get_option( 'header_contacts_show' ) OR us_get_option( 'header_show_custom' ) ): ?>
						<?php us_load_template( 'templates/widgets/contacts' ); ?>
					<?php endif; ?>

					<?php if ( us_get_option( 'header_socials_show' ) ): ?>
						<?php us_load_template( 'templates/widgets/socials' ); ?>
					<?php endif; ?>

					<?php if ( us_get_option( 'header_language_show' ) ): ?>
						<?php us_load_template( 'templates/widgets/lang' ); ?>
					<?php endif; ?>

				<?php elseif ( $us_layout->header_layout == 'sided' ): ?>

					<?php us_load_template( 'templates/widgets/nav-main' ); ?>

					<?php if ( us_get_option( 'header_search_show', TRUE ) ) { ?>
						<?php us_load_template( 'templates/widgets/search', array('layout' => 'popup') ); ?>
					<?php } ?>

					<?php us_load_template( 'templates/widgets/cart' ); ?>

					<?php if ( us_get_option( 'header_contacts_show' ) OR us_get_option( 'header_show_custom' ) ): ?>
						<?php us_load_template( 'templates/widgets/contacts' ); ?>
					<?php endif; ?>

					<?php if ( us_get_option( 'header_socials_show' ) ): ?>
						<?php us_load_template( 'templates/widgets/socials' ); ?>
					<?php endif; ?>

					<?php if ( us_get_option( 'header_language_show' ) ): ?>
						<?php us_load_template( 'templates/widgets/lang' ); ?>
					<?php endif; ?>

				<?php elseif ( $us_layout->header_layout != 'centered' ): ?>

					<?php us_load_template( 'templates/widgets/cart' ); ?>

					<?php if ( us_get_option( 'header_search_show' ) ) { ?>
						<?php us_load_template( 'templates/widgets/search', array('layout' => 'popup') ); ?>
					<?php } ?>

					<?php us_load_template( 'templates/widgets/nav-main' ); ?>

				<?php endif; ?>

				<?php do_action( 'us_middle_subheader_end' ) ?>
			</div>
		</div>
		<?php if ( $us_layout->header_layout == 'advanced' OR $us_layout->header_layout == 'centered' ): ?>
		<div class="l-subheader at_bottom">
			<div class="l-subheader-h i-cf">

				<?php do_action( 'us_bottom_subheader_start' ) ?>

				<?php if ( $us_layout->header_layout == 'advanced' ): ?>
					<?php us_load_template( 'templates/widgets/cart' ); ?>
				<?php endif; ?>

				<?php if ( us_get_option( 'header_search_show' ) AND $us_layout->header_layout == 'advanced' ): ?>
					<?php us_load_template( 'templates/widgets/search', array('layout' => 'popup') ); ?>
				<?php endif; ?>

				<?php us_load_template( 'templates/widgets/nav-main' ); ?>

				<?php if ( us_get_option( 'header_search_show' ) AND $us_layout->header_layout == 'centered' ): ?>
					<?php us_load_template( 'templates/widgets/search', array('layout' => 'popup') ); ?>
				<?php endif; ?>

				<?php if ( $us_layout->header_layout == 'centered' ): ?>
					<?php us_load_template( 'templates/widgets/cart' ); ?>
				<?php endif; ?>

				<?php do_action( 'us_bottom_subheader_end' ) ?>

			</div>
		</div>
		<?php endif/*( $us_layout->header_layout == 'advanced' OR $us_layout->header_layout == 'centered' )*/; ?>

	</header>
	<!-- /HEADER -->

	<?php do_action( 'us_after_header' ) ?>

<?php endif/*( $us_layout->header_show != 'never' )*/; ?>
