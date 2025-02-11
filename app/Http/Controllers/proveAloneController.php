<?php

namespace App\Http\Controllers;

use App\Models\ProveAlone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class proveAloneController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function FilterAllAlone() {
        $proveAlone = ProveAlone::all()
        //Para filtrar solo los activos
        /*->where( 'state', '=', 1 )*/;

        if ( !$proveAlone->isEmpty() ) {
            return response()->json( [
                'message' => [
                    'response' => 'true',
                    'data' => $proveAlone
                ]
            ], 200 );
        } else {
            return response()->json( [ 'error' => 'No hemos encontrado datos' ], 404 );
        }
    }

    public function createProveAlone( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'name' => [ 'required', 'string' ],
            'description' => [ 'required', 'string', 'max:1000', 'min:20' ]
        ] );

        if ( $validator->fails() ) {
            return response()->json( [ 'error' => $validator->errors() ], 400 );
        }

        $proveAlone = ProveAlone::create( [
            'name' => $request->name,
            'description' => $request->description,
            'state' => 1
        ] );

        if ( $proveAlone ) {
            return response()->json( [ 'data' => 'La prueba de categoria se ah registrado correctamente nice' ], 200 );
        } else {
            return response()->json( [ 'error' => 'huy pilas no se ha podido guardar los datos de la categoria' ], 500 );
        }

    }

    public function updateProveAlone( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'id' => [ 'required', 'numeric' ],
            'name' => [ 'required', 'string' ],
            'description' => [ 'required', 'string', 'max:1000', 'min:20' ]
        ] );

        if ( $validator->fails() ) {
            return response()->json( [ 'error' => $validator->errors() ], 400 );
        }

        $idOfProveAlone = $request->id;

        $idProveAlone = ProveAlone::find( $idOfProveAlone );

        if ( !$idProveAlone ) {
            return response()->json( [ 'error' => 'No hemos encontrado ningun dato con este id OJO' ], 400 );
        }

        $idProveAlone->update( [
            'name' => $request->name,
            'description' => $request->description,
            'state' => 1
        ] );

        if ( $idProveAlone ) {
            return response()->json( [ 'data' => 'La prueba de categoria se ah actualizado correctamente nice' ], 200 );
        } else {
            return response()->json( [ 'error' => 'huy pilas no se ha podido actualizar los datos de la categoria' ], 500 );
        }
    }

    public function changeproveState( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'id' => [ 'required', 'numeric' ]
        ] );

        if ( $validator->fails() ) {
            return response()->json( [ 'error' => $validator->errors() ], 400 );
        }

        $idOfProveAlone = $request->id;

        $idProveAlone = ProveAlone::find( $idOfProveAlone );

        if ( !$idProveAlone ) {
            return response()->json( [ 'error' => 'No hemos encontrado ningun dato con este id OJO' ], 400 );
        }

        $idProveAlone->update( [
            'state' => !$idProveAlone->state
        ] );

        if ( $idProveAlone ) {
            return response()->json( [ 'message' => 'El estado de la cosa ah cambiado' ], 200 );
        } else {
            return response()->json( [ 'error' => 'El estado de la cosa no se ah podido actualizar D:' ], 500 );
        }
    }
}