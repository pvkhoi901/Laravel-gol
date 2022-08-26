<?php

namespace App\Http\Controllers\Manager;

use App\DataTables\ManagerDatatable\ApiDescriptionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateApiDescriptionRequest;
use App\Http\Requests\UpdateApiDescriptionRequest;
use App\Repositories\ApiDescriptionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class ApiDescriptionController extends AppBaseController
{
    /** @var  ApiDescriptionRepository */
    private $apiDescriptionRepository;

    public function __construct(ApiDescriptionRepository $apiDescriptionRepo)
    {
        $this->apiDescriptionRepository = $apiDescriptionRepo;
    }

    /**
     * Display a listing of the ApiDescription.
     *
     * @param ApiDescriptionDataTable $apiDescriptionDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        $datas = $this->apiDescriptionRepository->all();
        return view('api_descriptions.index', compact("datas"));
    }

    /**
     * Show the form for creating a new ApiDescription.
     *
     * @return Response
     */
    public function create()
    {
        return view('api_descriptions.create');
    }

    /**
     * Store a newly created ApiDescription in storage.
     *
     * @param CreateApiDescriptionRequest $request
     *
     * @return Response
     */
    public function store(CreateApiDescriptionRequest $request)
    {
        $input = $request->all();

        $apiDescription = $this->apiDescriptionRepository->create($input);

        Flash::success('Api Description saved successfully.');

        return redirect(route('api_description.index'));
    }

    /**
     * Display the specified ApiDescription.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $apiDescription = $this->apiDescriptionRepository->find($id);

        if (empty($apiDescription)) {
            Flash::error('Api Description not found');

            return redirect(route('api_description.index'));
        }

        return view('api_descriptions.show')->with('apiDescription', $apiDescription);
    }

    /**
     * Show the form for editing the specified ApiDescription.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $apiDescription = $this->apiDescriptionRepository->find($id);

        if (empty($apiDescription)) {
            Flash::error('Api Description not found');

            return redirect(route('api_description.index'));
        }

        return view('api_descriptions.edit')->with('apiDescription', $apiDescription);
    }

    /**
     * Update the specified ApiDescription in storage.
     *
     * @param  int              $id
     * @param UpdateApiDescriptionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateApiDescriptionRequest $request)
    {
        $apiDescription = $this->apiDescriptionRepository->find($id);

        if (empty($apiDescription)) {
            Flash::error('Api Description not found');

            return redirect(route('api_description.index'));
        }

        $apiDescription = $this->apiDescriptionRepository->update($request->all(), $id);

        Flash::success('Api Description updated successfully.');

        return redirect(route('api_description.index'));
    }

    /**
     * Remove the specified ApiDescription from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $apiDescription = $this->apiDescriptionRepository->find($id);

        if (empty($apiDescription)) {
            Flash::error('Api Description not found');

            return redirect(route('api_description.index'));
        }

        $this->apiDescriptionRepository->delete($id);

        Flash::success('Api Description deleted successfully.');

        return redirect(route('api_description.index'));
    }
}
