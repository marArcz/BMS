<?php

function is_pdf ( $file ) {
	$file_content = file_get_contents( $file );
	
	if ( preg_match( "/^%PDF-[0-1]\.[0-9]+/", $file_content ) ) {
		return true;
	}
	else {
		return false;
	}
}

function create_preview ( $file ) {
	$output_format = "jpeg";
	$preview_page = "1";
	$resolution = "300";
	$output_file = "imagick_preview.jpg";

	echo "Fetching preview...\n";
	$img_data = new Imagick();
	$img_data->setResolution( $resolution, $resolution );
	$img_data->readImage( $file . "[" . ($preview_page - 1) . "]" );
	$img_data->setImageFormat( $output_format );

	file_put_contents( $output_file, $img_data, FILE_USE_INCLUDE_PATH );
}


function __main__() {
	global $argv;
	$input_file = $argv[1];

	if ( is_pdf( $input_file ) ) {
		// Create preview for the pdf
		create_preview( $input_file );
	}
	else {
		echo "The input file " . $input_file . " is not a valid PDF document.\n";
	}
}
	
?>
