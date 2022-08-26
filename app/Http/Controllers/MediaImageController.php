<?php

namespace App\Http\Controllers;

use App\DataTables\MediaImageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMediaImageRequest;
use App\Http\Requests\UpdateMediaImageRequest;
use App\Repositories\MediaImageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MediaImageController extends AppBaseController
{
    /** @var  MediaImageRepository */
    private $mediaImageRepository;

    public function __construct(MediaImageRepository $mediaImageRepo)
    {
        $this->mediaImageRepository = $mediaImageRepo;
    }

    /**
     * Display a listing of the MediaImage.
     *
     * @param MediaImageDataTable $mediaImageDataTable
     * @return Response
     */
    public function index(MediaImageDataTable $mediaImageDataTable)
    {
        return $mediaImageDataTable->render('media_images.index');
    }

    /**
     * Show the form for creating a new MediaImage.
     *
     * @return Response
     */
    public function create()
    {
        return view('media_images.create');
    }

    /**
     * Store a newly created MediaImage in storage.
     *
     * @param CreateMediaImageRequest $request
     *
     * @return Response
     */
    public function store(CreateMediaImageRequest $request)
    {
        $input = $request->all();

        $mediaImage = $this->mediaImageRepository->create($input);

        Flash::success('Media Image saved successfully.');

        return redirect(route('media_images.index'));
    }

    /**
     * Display the specified MediaImage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mediaImage = $this->mediaImageRepository->find($id);

        if (empty($mediaImage)) {
            Flash::error('Media Image not found');

            return redirect(route('media_images.index'));
        }

        return view('media_images.show')->with('mediaImage', $mediaImage);
    }

    /**
     * Show the form for editing the specified MediaImage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mediaImage = $this->mediaImageRepository->find($id);

        if (empty($mediaImage)) {
            Flash::error('Media Image not found');

            return redirect(route('media_images.index'));
        }

        return view('media_images.edit')->with('mediaImage', $mediaImage);
    }

    /**
     * Update the specified MediaImage in storage.
     *
     * @param  int              $id
     * @param UpdateMediaImageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMediaImageRequest $request)
    {
        $mediaImage = $this->mediaImageRepository->find($id);

        if (empty($mediaImage)) {
            Flash::error('Media Image not found');

            return redirect(route('media_images.index'));
        }

        $mediaImage = $this->mediaImageRepository->update($request->all(), $id);

        Flash::success('Media Image updated successfully.');

        return redirect(route('media_images.index'));
    }

    /**
     * Remove the specified MediaImage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mediaImage = $this->mediaImageRepository->find($id);

        if (empty($mediaImage)) {
            Flash::error('Media Image not found');

            return redirect(route('media_images.index'));
        }

        $this->mediaImageRepository->delete($id);

        Flash::success('Media Image deleted successfully.');

        return redirect(route('media_images.index'));
    }
}
