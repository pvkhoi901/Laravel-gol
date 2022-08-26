<?php

namespace App\Modules\Setting\Controllers;

use App\DataTables\SettingDatatable\LanguagesDataTable as LanguagesDataTable;
use App\Http\Requests;
use App\Modules\Setting\Requests\CreateLanguagesRequest;
use App\Modules\Setting\Requests\UpdateLanguagesRequest;
use App\Repositories\LanguagesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Setting;
use Response;
use Illuminate\Http\Request;

class SettingController extends AppBaseController
{
    /** @var  LanguagesRepository */
    private $languagesRepository;

    public function __construct(LanguagesRepository $languagesRepo)
    {
        $this->languagesRepository = $languagesRepo;
    }

    /**
     * Display a listing of the Languages.
     *
     * @param LanguagesDataTable $languagesDataTable
     * @return Response
     */
    public function index(Request $request)
    {

        $title = "Settings";

        $settings = Setting::where('group', 'config')->get();

        $array_data = array();

        foreach ($settings as $row) {

            $array_data[$row->group][$row->name] = $row->value;
        }

        $configs = $array_data;


        return view('Setting::setting.index', compact('title', 'configs'));
    }


    /**
     * Store a newly created Languages in storage.
     *
     * @param CreateLanguagesRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $post = $request->all();
        unset($post['_token']);


        $list = ['is_change_language', 'facebook_login', 'google_login'];
        foreach ($list as $detail) {
            if (!isset($post[$detail])) {
                $post[$detail] = 0;
            }
        }

        foreach ($post as $key => $value) {
            if (!$setting = Setting::where('name', $key)->first()) {
                $setting = new Setting();
                $setting->group = 'config';
                $setting->name = $key;
            }

            $setting->value = $value;
            $setting->save();
        }

        return redirect(route('settings.index'));
    }
}
