<?php

namespace App\Http\Controllers\CrawlData;

use App\Http\Controllers\Base\CrudParentController;
use App\Models\InfluencerWeek;
use App\Models\YoutubeRank;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\DataTables\CrawlDataSetting\CrawlInfluencerDataTable;
use App\Models\NoxCategory;
use App\Models\YoutubeCategory;
use App\Models\YoutubeRankSubscribers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class CrawlInfluencerController  extends CrudParentController
{
    private $model;

    public function __construct()
    {
        $this->setModel(InfluencerWeek::class);
        $this->model = $this->getModel();
    }


    public function index()
    {

        $plan_datatable =  new CrawlInfluencerDataTable(request());

        return $plan_datatable->render($this->model->getView('index'), []);
    }

    public function filter()
    {
        $plan_datatable =  new CrawlInfluencerDataTable(request());
        return $plan_datatable->render($this->model->getView('index'));
    }
    public function show()
    {
        $plan_datatable =  new CrawlInfluencerDataTable(request());
        return $plan_datatable->render($this->model->getView('index'));
    }

    public function detail(Request $request,  $influencer_id)
    {
        $nox_categories = NoxCategory::getDataToSelect('vn');
        $youtube_categories = YoutubeCategory::CATEGORY_YOUTUBE_VN;
        $influencer =  InfluencerWeek::find($influencer_id);

        $youtube_ranks  = YoutubeRank::where("influencer_id", $influencer_id)->get();
        return view($this->model->getView('detail'), [
            'influencer'     => $influencer,
            'youtube_ranks'  => $youtube_ranks,
            'nox_categories' => $nox_categories,
            'youtube_categories' => $youtube_categories,
        ]);
    }

    /**
     * Tìm kiếm 
     */
    public function influenceSearch(Request $request)
    {
        $region =   $request->region;
        $youtube_category_id =   $request->youtube_category_id;
        $nox_category_id =   $request->nox_category_id;
        $date_search =   $request->date_search;

        $youtube_ranks  = YoutubeRank::where("region", $region)
            ->where("category_id", $nox_category_id);

        if ($youtube_category_id > 0) {
            $youtube_ranks  =  $youtube_ranks->where("youtube_category_id", $youtube_category_id);
        }
        $youtube_ranks  =  $youtube_ranks->whereDate("created_at", $date_search)
            ->get();
        return view($this->model->getView('detail_search'), [
            'youtube_ranks' => $youtube_ranks,
        ]);
    }


    /**
     * @author : BaoNC
     * @method : POST
     * Get Nox Category by Country
     */
    public function influencerChangeCountry(Request $request)
    {
        $region =   $request->region;

        $index_nox_category_id =   $request->index_nox_category_id ?? 0;
        $nox_categories = NoxCategory::getData($region);

        $youtube_categories = YoutubeCategory::getYouTubeCategoryByCountry($region);

        return view($this->model->getView('country_search'), [
            'nox_categories'        => $nox_categories,
            'index_nox_category_id' => $index_nox_category_id,
            'youtube_categories'    => $youtube_categories,
        ]);
    }


    public function destroy(int $influencer_id)
    {
        DB::beginTransaction();
        try {
            if ($influencer =  InfluencerWeek::find($influencer_id)) {
                YoutubeRank::where("influencer_id", $influencer_id)->delete();
                YoutubeRankSubscribers::where("influencer_id", $influencer_id)->delete();
                $influencer->delete();
                alert()->success('Destroy successfully')->toToast();
                DB::commit();
                return redirect()->route('influencer.index');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
        }

        alert()->error('Destroy Error')->toToast();
        return redirect()->route('influencer.index');
    }
}
