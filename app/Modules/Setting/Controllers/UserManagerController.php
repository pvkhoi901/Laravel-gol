<?php


namespace App\Modules\Setting\Controllers;

use App\DataTables\SettingDatatable\UserManagerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserManagerRequest;
use App\Http\Requests\UpdateUserManagerRequest;
use App\Repositories\UserManagerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use Response;

class UserManagerController extends AppBaseController
{
    /** @var  UserManagerRepository */
    private $userManagerRepository;

    public function __construct(UserManagerRepository $userManagerRepo)
    {
        $this->userManagerRepository = $userManagerRepo;
    }

    /**
     * Display a listing of the UserManager.
     *
     * @param UserManagerDataTable $userManagerDataTable
     * @return Response
     */
    public function index(UserManagerDataTable $userManagerDataTable)
    {
        return $userManagerDataTable->render('Setting::user_managers.index');
    }

    /**
     * Show the form for creating a new UserManager.
     *
     * @return Response
     */
    public function create()
    {
        return view('Setting::user_managers.create');
    }

    /**
     * Store a newly created UserManager in storage.
     *
     * @param CreateUserManagerRequest $request
     *
     * @return Response
     */
    public function store(CreateUserManagerRequest $request)
    {
        $input = $request->all();

        if ($input['password'] != "") {
            $input['password'] = Hash::make($input['password']);
        }

        $userManager = $this->userManagerRepository->create($input);

        Flash::success('User Manager saved successfully.');

        return redirect(route('user_manager.index'));
    }



    /**
     * Show the form for editing the specified UserManager.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userManager = $this->userManagerRepository->find($id);

        if (empty($userManager)) {
            Flash::error('User Manager not found');

            return redirect(route('user_manager.index'));
        }

        return view('Setting::user_managers.edit')->with('userManager', $userManager);
    }

    /**
     * Update the specified UserManager in storage.
     *
     * @param  int              $id
     * @param UpdateUserManagerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserManagerRequest $request)
    {
        $userManager = $this->userManagerRepository->find($id);

        if (empty($userManager)) {
            Flash::error('User Manager not found');

            return redirect(route('user_manager.index'));
        }
        $input = $request->all();


        if ($input['password'] != "" && $input['password'] != NULL) {
            $input['password'] = Hash::make($input['password']);
        }else{
            unset($input['password']);
        }


        $userManager = $this->userManagerRepository->update($input, $id);

        Flash::success('User Manager updated successfully.');

        return redirect(route('user_manager.index'));
    }

    /**
     * Remove the specified UserManager from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userManager = $this->userManagerRepository->find($id);

        if (empty($userManager)) {
            Flash::error('User Manager not found');

            return redirect(route('user_manager.index'));
        }

        $this->userManagerRepository->delete($id);

        Flash::success('User Manager deleted successfully.');

        return redirect(route('user_manager.index'));
    }
}
