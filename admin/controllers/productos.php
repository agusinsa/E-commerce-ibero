<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'productos' )
	->fields(
		Field::inst( 'nom_prod' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Ingrese nombre del producto' )	
			) ),
		Field::inst( 'marca' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Ingrese marca del producto' )	
			) ),
		Field::inst( 'precio' )
			->validator( Validate::numeric() )
			->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'cantidad' )
			->validator( Validate::numeric() )
			->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'categoria' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Ingrese categoria del producto' )	
			) ),
			Field::inst( 'formato' ),
		Field::inst( 'descripcion' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Ingrese descripción del producto' )	
			) ),
			Field::inst( 'active' )//Outlet
			->setFormatter( function ( $val, $data, $opts ) {
				return ! $val ? 0 : 1;
			} )		
		
	)
	->join(
        Mjoin::inst( 'files' )
            ->link( 'productos.id', 'productos.producto_id' )
            ->link( 'files.id', 'productos_files.file_id' )
            ->fields(
                Field::inst( 'id' )
                    ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/imagenes/productos/__ID__.__EXTN__' )
                        ->db( 'files', 'id', array(
                            'filename'    => Upload::DB_FILE_NAME,
                            'filesize'    => Upload::DB_FILE_SIZE,
                            'web_path'    => Upload::DB_WEB_PATH,
                            'system_path' => Upload::DB_SYSTEM_PATH
                        ) )
                        ->validator( Validate::fileSize( 5000000, 'Files must be smaller that 5M' ) )
                        ->validator( Validate::fileExtensions( array( 'webp', 'png', 'jpg', 'jpeg', 'gif' ), "Please upload an image" ) )
                    )
            )
	)
	
	->process( $_POST )
	->json();
