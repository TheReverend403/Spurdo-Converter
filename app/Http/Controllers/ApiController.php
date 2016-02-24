<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Res;

class ApiController extends Controller
{
    const SPURDO_REPLACEMENTS = [
        'kek'  => 'geg',
        'some' => 'sum',
        'meme' => 'maymay',
        'epic' => 'ebin',
        'wh'   => 'w',
        'th'   => 'd',
        'af'   => 'ab',
        'ap'   => 'ab',
        'ca'   => 'ga',
        'ck'   => 'gg',
        'co'   => 'go',
        'ev'   => 'eb',
        'ex'   => 'egz',
        'et'   => 'ed',
        'iv'   => 'ib',
        'it'   => 'id',
        'ke'   => 'ge',
        'nt'   => 'nd',
        'op'   => 'ob',
        'ot'   => 'od',
        'po'   => 'bo',
        'pe'   => 'be',
        'pi'   => 'bi',
        'up'   => 'ub',
        'va'   => 'ba',
        'cr'   => 'gr',
        'kn'   => 'gn',
        'lt'   => 'ld',
        'mm'   => 'm',
        'pr'   => 'br',
        'ts'   => 'dz',
        'tr'   => 'dr',
        'bs'   => 'bz',
        'ds'   => 'dz',
        'es'   => 'es',
        'fs'   => 'fz',
        'gs'   => 'gz',
        ' is'  => ' iz',
        'ls'   => 'lz',
        'ms'   => 'mz',
        'ns'   => 'nz',
        'rs'   => 'rz',
        'ss'   => 'sz',
        'us'   => 'uz',
        'ws'   => 'wz',
        'ys'   => 'yz',
        'alk'  => 'olk',
        'ing'  => 'ign',
        'ic'   => 'ig',
        'ng'   => 'nk',
    ];

    const EBIN_FACES = [':D', ':DD', ':DDD', ':-D', 'XD', 'XXD', 'XDD', 'XXDD', 'xD', 'xDD', ':dd'];

    public function index(Request $request)
    {
        $response = ['status' => 0];

        if (!$request->has('text')) {
            $response['status'] = 1;
            $response['error'] = 'missing_required_parameter: text';

            return response($response, Res::HTTP_BAD_REQUEST);
        }

        $text = strtolower($request->input('text'));

        foreach (self::SPURDO_REPLACEMENTS as $match => $replacement) {
            $text = str_replace($match, $replacement, $text);
        }

        $ebinFaces = $request->input('ebinfaces', true);
        if ($ebinFaces === true) {
            while (preg_match('/\.|,|\?|!(?=\s|$|\.)/m', $text)) {
                $text = preg_replace('/\.|,|\?|!(?=\s|$|\.)/m',
                    sprintf(' %s', self::EBIN_FACES[array_rand(self::EBIN_FACES)]), $text, 1);
            }

            foreach (self::EBIN_FACES as $ebinFace) {
                if (str_contains($text, $ebinFace)) {
                    $text .= sprintf(' %s', self::EBIN_FACES[array_rand(self::EBIN_FACES)]);
                    break;
                }
            }
        }

        $response['text'] = $text;

        return response($response);
    }
}
