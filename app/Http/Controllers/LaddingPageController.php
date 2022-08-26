<?php

namespace App\Http\Controllers;

use App\Models\Languages;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\App;
use Config;
use Jenssegers\Agent\Facades\Agent;

class LaddingPageController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $agent = new \Jenssegers\Agent\Agent;

        $check_mobile = $agent->isMobile();


        $locale = Config::get('app.locale');

        $lang = $locale;
        if (!in_array($locale, COUNTRY_CODE)) {
            $lang = 'ko';
        }
        if ($lang == "kr") {
            $lang = 'ko';
        } else if ($lang == "vn") {
            $lang = 'vi';
        }
        $languages =  Languages::getLanguageByCountry($locale, $check_mobile);
        return view('ladding_page.app', [
            'lang'     => $lang,
            'languages'     => $languages,
            'locale'     => $locale,
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_new(Request $request)
    {

        $agent = new \Jenssegers\Agent\Agent;

        $check_mobile = $agent->isMobile();


        $locale = Config::get('app.locale');

        $lang = $locale;
        if (!in_array($locale, COUNTRY_CODE)) {
            $lang = 'ko';
        }
        if ($lang == "kr") {
            $lang = 'ko';
        } else if ($lang == "vn") {
            $lang = 'vi';
        }
        $languages =  Languages::getLanguageByCountry($locale, $check_mobile);
        return view('ladding_page.index_new', [
            'lang'     => $lang,
            'languages'     => $languages,
            'locale'     => $locale,
        ]);
    }

    public function setLanguage(Request $request)
    {
        $language  = $request->language ?? "kr";
        session()->put('locale', $language);
        return  $this->sendSuccess("Change language to $language");
    }
}
