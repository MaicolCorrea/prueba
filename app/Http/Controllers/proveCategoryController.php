<?php

namespace App\Http\Controllers;

use App\Models\ProveCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class proveCategoryController extends Controller {
    public function FilterAllCategories() {
        $proveCategory = ProveCategory::all();

        // ! = lo contrario

        if ( !$proveCategory->isEmpty() ) {
            return response()->json( [
                'message' => [
                    'response' => 'true',
                    'data' => $proveCategory
                ]
            ], 200 );
        } else {
            return response()->json( [ 'error' => 'No hemos encontrado datos' ], 404 );
        }
    }

    public function createProveCategory( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'category' => [ 'required', 'string' ],
            'description' => [ 'required', 'string', 'max:1000', 'min:20' ]
        ] );

        if ( $validator->fails() ) {
            return response()->json( [ 'error' => $validator->errors() ], 400 );
        }

        $proveCategory = ProveCategory::create( [
            'category' => $request->category,
            'description' => $request->description,
            'category_state' => 1
        ] );

        if ( $proveCategory ) {
            return response()->json( [ 'data' => 'La prueba de categoria se ha registrado correctamente.' ], 200 );
        } else {
            return response()->json( [ 'error' => 'No se ha podido guardar los datos de la prueba de categoria.' ], 500 );
        }
    }

    public function updateProveCategory( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'id' => [ 'required', 'numeric' ],
            'category' => [ 'required', 'string' ],
            'description' => [ 'required', 'string', 'max:1000', 'min:20' ]
        ] );

        if ( $validator->fails() ) {
            return response()->json( [ 'error' => $validator->errors() ], 400 );
        }

        $idOfProveCategory = $request->id;
        $idProveCategory = ProveCategory::find( $idOfProveCategory );

        if ( !$idProveCategory ) {
            return response()->json( [ 'error' => 'No hemos encontrado ningún dato con este id.' ], 404 );
        }

        $idProveCategory->update( [
            'category' => $request->category,
            'description' => $request->description,
            'category_state' => 1
        ] );

        if ( $idProveCategory ) {
            return response()->json( [ 'data' => 'La prueba de categoria se ha actualizado correctamente.' ], 200 );
        } else {
            return response()->json( [ 'error' => 'No se ha podido guardar los datos de la prueba de categoria.' ], 500 );
        }
    }

    public function changeState( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'id' => [ 'required', 'numeric' ]
        ] );

        if ( $validator->fails() ) {
            return response()->json( [ 'error' => $validator->errors() ], 400 );
        }

        $idOfProveCategory = $request->id;
        $idProveCategory = ProveCategory::find( $idOfProveCategory );

        if ( !$idProveCategory ) {
            return response()->json( [ 'error' => 'No hemos encontrado ningún dato con este id.' ], 404 );
        }

        $idProveCategory->update([
            'category_state' => !$idProveCategory->category_state
        ]);

        if ($idProveCategory) {
            return response()->json(['message' => "El estado de la categoria ha cambiando."], 200);
        } else {
            return response()->json(['error' => "El estado de la categoria no se ha podido actualizar."], 500);
        }
    }
}
