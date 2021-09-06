<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMyModelAPIRequest;
use App\Http\Requests\API\UpdateMyModelAPIRequest;
use App\Models\MyModel;
use App\Repositories\MyModelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MyModelController
 * @package App\Http\Controllers\API
 */

class MyModelAPIController extends AppBaseController
{
    /** @var  MyModelRepository */
    private $myModelRepository;

    public function __construct(MyModelRepository $myModelRepo)
    {
        $this->myModelRepository = $myModelRepo;
    }

    /**
     * Display a listing of the MyModel.
     * GET|HEAD /myModels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $myModels = $this->myModelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($myModels->toArray(), 'My Models retrieved successfully');
    }

    /**
     * Store a newly created MyModel in storage.
     * POST /myModels
     *
     * @param CreateMyModelAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMyModelAPIRequest $request)
    {
        $input = $request->all();

        $myModel = $this->myModelRepository->create($input);

        return $this->sendResponse($myModel->toArray(), 'My Model saved successfully');
    }

    /**
     * Display the specified MyModel.
     * GET|HEAD /myModels/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MyModel $myModel */
        $myModel = $this->myModelRepository->find($id);

        if (empty($myModel)) {
            return $this->sendError('My Model not found');
        }

        return $this->sendResponse($myModel->toArray(), 'My Model retrieved successfully');
    }

    /**
     * Update the specified MyModel in storage.
     * PUT/PATCH /myModels/{id}
     *
     * @param int $id
     * @param UpdateMyModelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMyModelAPIRequest $request)
    {
        $input = $request->all();

        /** @var MyModel $myModel */
        $myModel = $this->myModelRepository->find($id);

        if (empty($myModel)) {
            return $this->sendError('My Model not found');
        }

        $myModel = $this->myModelRepository->update($input, $id);

        return $this->sendResponse($myModel->toArray(), 'MyModel updated successfully');
    }

    /**
     * Remove the specified MyModel from storage.
     * DELETE /myModels/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MyModel $myModel */
        $myModel = $this->myModelRepository->find($id);

        if (empty($myModel)) {
            return $this->sendError('My Model not found');
        }

        $myModel->delete();

        return $this->sendSuccess('My Model deleted successfully');
    }
}
