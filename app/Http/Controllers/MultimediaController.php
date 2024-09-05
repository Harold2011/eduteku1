<?php

namespace App\Http\Controllers;

use App\Models\multimedia;
use Illuminate\Http\Request;


class MultimediaController extends Controller
{
        public function destroy(Request $request, multimedia $multimedia)
        {
            $multi = $request->input('type');

            $multimedia->delete();
            switch ($multi) {
                case 'home':
                    return redirect()->route('home.index')->with('error', 'inicio eliminada correctamente.');
                    break;
                case 'info':
                    return redirect()->route('infoAdmin.index')->with('error', 'Informacion eliminada correctamente.');
                    break;
                case 'edt':
                    return redirect()->route('edtAdmin.index')->with('error', 'EDT eliminada correctamente.');
                    break;
                case 'line':
                    return redirect()->route('lines.index')->with('error', 'Linea eliminada correctamente.');
                    break;
                case 'infoEDT':
                    return redirect()->route('edtInfoAdmin.index')->with('error', 'Informacion EDT eliminada correctamente.');
                    break;
                case 'infoBulletin':
                    return redirect()->route('bulletinInfoAdmin.index')->with('error', 'Informacio boletin eliminada correctamente.');
                    break;
                case 'Bulletin':
                    return redirect()->route('bulletinAdmin.index')->with('error', 'Boletin eliminada correctamente.');
                    break;
                default:
                    return response()->json(['error' => 'Acción no válida'], 400);
            }
        }
    }
