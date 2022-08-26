<?php

namespace App\Modules\Email\Controllers;

use App\DataTables\EmailMarketingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEmailMarketingRequest;
use App\Http\Requests\UpdateEmailMarketingRequest;
use App\Repositories\EmailMarketingRepository;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Response;

class EmailMarketingController extends AppBaseController
{
    /** @var  EmailMarketingRepository */
    private $emailMarketingRepository;

    public function __construct(EmailMarketingRepository $emailMarketingRepo)
    {
        $this->emailMarketingRepository = $emailMarketingRepo;
    }

    /**
     * Display a listing of the EmailMarketing.
     *
     * @param EmailMarketingDataTable $emailMarketingDataTable
     * @return Response
     */
    public function index(EmailMarketingDataTable $emailMarketingDataTable)
    {
        return $emailMarketingDataTable->render('Email::email_marketings.index');
    }

    /**
     * Show the form for creating a new email_marketing.
     *
     * @return Response
     */
    public function create()
    {
        return view('Email::email_marketings.create');
    }

    /**
     * Store a newly created email_marketing in storage.
     *
     * @param CreateEmailMarketingRequest $request
     *
     * @return Response
     */
    public function store(CreateEmailMarketingRequest $request)
    {
        $input = $request->all();

        $emailMarketing = $this->emailMarketingRepository->create($input);

        Flash::success('Email Marketing saved successfully.');

        return redirect(route('emailMarketings.index'));
    }

    /**
     * Display the specified EmailMarketing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $emailMarketing = $this->emailMarketingRepository->find($id);

        if (empty($emailMarketing)) {
            Flash::error('Email Marketing not found');

            return redirect(route('emailMarketings.index'));
        }

        return view('Email::email_marketings.show')->with('emailMarketing', $emailMarketing);
    }

    /**
     * Show the form for editing the specified email_marketing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $emailMarketing = $this->emailMarketingRepository->find($id);

        if (empty($emailMarketing)) {
            Flash::error('Email Marketing not found');

            return redirect(route('emailMarketings.index'));
        }

        return view('Email::email_marketings.edit')->with('emailMarketing', $emailMarketing);
    }

    /**
     * Update the specified EmailMarketing in storage.
     *
     * @param  int              $id
     * @param UpdateEmailMarketingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmailMarketingRequest $request)
    {
        $emailMarketing = $this->emailMarketingRepository->find($id);

        if (empty($emailMarketing)) {
            Flash::error('Email Marketing not found');

            return redirect(route('emailMarketings.index'));
        }

        $emailMarketing = $this->emailMarketingRepository->update($request->all(), $id);

        Flash::success('Email Marketing updated successfully.');

        return redirect(route('emailMarketings.index'));
    }

    /**
     * Remove the specified email_marketing from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $emailMarketing = $this->emailMarketingRepository->find($id);

        if (empty($emailMarketing)) {
            Flash::error('Email Marketing not found');

            return redirect(route('emailMarketings.index'));
        }

        $this->emailMarketingRepository->delete($id);

        Flash::success('Email Marketing deleted successfully.');

        return redirect(route('emailMarketings.index'));
    }

    public function emailCustom()
    {
        return view('Email::email_marketings.index_custom');
    }
}
