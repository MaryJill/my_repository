<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSecond_ScaffoldsAPIRequest;
use App\Http\Requests\API\UpdateSecond_ScaffoldsAPIRequest;
use App\Models\Second_Scaffolds;
use App\Repositories\Second_ScaffoldsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Second_ScaffoldsController
 * @package App\Http\Controllers\API
 */

class Second_ScaffoldsAPIController extends AppBaseController
{
    /** @var  Second_ScaffoldsRepository */
    private $secondScaffoldsRepository;

    public function __construct(Second_ScaffoldsRepository $secondScaffoldsRepo)
    {
        $this->secondScaffoldsRepository = $secondScaffoldsRepo;
    }

    /**
     * Display a listing of the Second_Scaffolds.
     * GET|HEAD /secondScaffolds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $secondScaffolds = $this->secondScaffoldsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($secondScaffolds->toArray(), 'Second  Scaffolds retrieved successfully');
    }

    /**
     * Store a newly created Second_Scaffolds in storage.
     * POST /secondScaffolds
     *
     * @param CreateSecond_ScaffoldsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSecond_ScaffoldsAPIRequest $request)
    {
        $input = $request->all();

        $secondScaffolds = $this->secondScaffoldsRepository->create($input);

        return $this->sendResponse($secondScaffolds->toArray(), 'Second  Scaffolds saved successfully');
    }

    /**
     * Display the specified Second_Scaffolds.
     * GET|HEAD /secondScaffolds/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Second_Scaffolds $secondScaffolds */
        $secondScaffolds = $this->secondScaffoldsRepository->find($id);

        if (empty($secondScaffolds)) {
            return $this->sendError('Second  Scaffolds not found');
        }

        return $this->sendResponse($secondScaffolds->toArray(), 'Second  Scaffolds retrieved successfully');
    }

    /**
     * Update the specified Second_Scaffolds in storage.
     * PUT/PATCH /secondScaffolds/{id}
     *
     * @param int $id
     * @param UpdateSecond_ScaffoldsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSecond_ScaffoldsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Second_Scaffolds $secondScaffolds */
        $secondScaffolds = $this->secondScaffoldsRepository->find($id);

        if (empty($secondScaffolds)) {
            return $this->sendError('Second  Scaffolds not found');
        }

        $secondScaffolds = $this->secondScaffoldsRepository->update($input, $id);

        return $this->sendResponse($secondScaffolds->toArray(), 'Second_Scaffolds updated successfully');
    }

    /**
     * Remove the specified Second_Scaffolds from storage.
     * DELETE /secondScaffolds/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Second_Scaffolds $secondScaffolds */
        $secondScaffolds = $this->secondScaffoldsRepository->find($id);

        if (empty($secondScaffolds)) {
            return $this->sendError('Second  Scaffolds not found');
        }

        $secondScaffolds->delete();

        return $this->sendSuccess('Second  Scaffolds deleted successfully');
    }
}
