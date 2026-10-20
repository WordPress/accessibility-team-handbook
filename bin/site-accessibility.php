<?php

/**
 * Redirects handbook URLs.
 *
 * Notes:
 * - **This version of the file is a _copy_ of the one used in production.** It is present here for reference only, and may not be up to date.
 * - This is contingent on the handbook using the 'handbook' post type (i.e. a single-handbook site).
 * - Currently only redirects handbook pages within the same handbook.
 */
add_action( 'template_redirect', function() {
	$handbook_page = get_query_var( 'handbook' );

	// Only redirect handbook pages.
	if ( ! $handbook_page ) {
		return;
	}

	$redirect = null;
	$status = 301;

	switch ( $handbook_page ) {
		case 'best-practices/accessibility-overview':
		case 'best-practices/quick-start-guide':
		case 'best-practices/training-and-resources':
		case 'content':
		case 'content/accessible-pdfs':
		case 'content/good-link-texts':
		case 'content/link-destinations':
		case 'content/readability':
		case 'content/using-headings-in-content':
		case 'markup':
		case 'markup/aria-landmarks':
		case 'markup/design-patterns':
		case 'markup/heading-structure-in-theme-development':
		case 'markup/semantic-html':
		case 'markup/tables':
		case 'markup/web-forms':
		case 'markup/wp-a11y-speak':
		case 'plugin-accessibility':
		case 'which-tools-can-i-use':
		case 'which-tools-can-i-use/education-opportunities':
		case 'which-tools-can-i-use/other-plugins-to-improve-accessibility':
		case 'which-tools-can-i-use/useful-tools':
		case 'which-tools-can-i-use/wp-accessibility-plugin':
			$redirect = 'best-practices';
			break;
		case 'about/accessibility-improvement-project':
			$redirect = 'get-involved/tickets-tasks-reports';
			break;
		case 'get-involved/site-feedback-guide':
			$redirect = 'get-involved/audits-and-testing';
			break;
		case 'markup/core-accessibility-standards':
		case 'which-questions-should-you-ask':
		case 'which-themes-can-you-use':
			$redirect = 'accessibility-guidelines';
			break;
		case 'markup/skip-links':
			$redirect = 'best-practices/skip-links';
			break;
		case 'markup/the-css-class-screen-reader-text':
			$redirect = 'best-practices/the-css-class-screen-reader-text';
			break;
		case 'test-for-web-accessibility':
		case 'test-for-web-accessibility/test-for-web-accessibility-content':
		case 'test-for-web-accessibility/test-for-web-accessibility-design':
		case 'test-for-web-accessibility/test-for-web-accessibility-frontend-code':
			$redirect = 'best-practices/test-for-web-accessibility';
			$status = 302;
			break;
		default:
			$redirect = null;
	}

	if ( $redirect ) {
		wp_safe_redirect( home_url( '/handbook/' . $redirect . '/' ), $status );
		exit;
	}
} );