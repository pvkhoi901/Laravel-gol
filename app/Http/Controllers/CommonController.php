<?php

namespace App\Http\Controllers;

use App\Services\MeidConverter;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Storage;
use Validator;

class CommonController extends Controller
{
    public function convertMeid(Request $request)
    {
        $meid = (new MeidConverter())->setInput($request->input);

        if ($meid->checkError()) {
            return apiError('Not ESN number');
        }

        if (!$meid->isMEID) {
            $DEC = $meid->convertToESNDec();
            $HEX = $meid->convertToESNHex();
        } else {
            $DEC = $meid->convertToMEIDDec();
            $HEX = $meid->convertToMEIDHex();
        }

        return apiSuccess([
            'dec' => $DEC,
            'hex' => $HEX
        ]);
    }

    public function readMDNFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        try {
            $path = $request->file('file')->store('excel-files');

            $mdn_list = (new FastExcel())->import(storage_path('app/' . $path), function ($line) {
                return $line['mdn'];
            });

            Storage::delete($path);

            return apiSuccess($mdn_list);
            
        } catch (\Exception $e) {
            return apiError();
        }
    }
}
