<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSecond_ScaffoldsRequest;
use App\Http\Requests\UpdateSecond_ScaffoldsRequest;
use App\Repositories\Second_ScaffoldsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Second_ScaffoldsController extends AppBaseController
{
    /** @var  Second_ScaffoldsRepository */
    private $secondScaffoldsRepository;

    public function __construct(Second_ScaffoldsRepository $secondScaffoldsRepo)
    {
        $this->secondScaffoldsRepository = $secondScaffoldsRepo;
    }

    /**
     * Display a listing of the Second_Scaffolds.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $secondScaffolds = $this->secondScaffoldsRepository->all();

        return view('second__scaffolds.index')
            ->with('secondScaffolds', $secondScaffolds);
    }

    /**
     * Show the form for creating a new Second_Scaffolds.
     *
     * @return Response
     */
    public function create()
    {
        return view('second__scaffolds.create');
    }

    /**
     * Store a newly created Second_Scaffolds in storage.
     *
     * @param CreateSecond_ScaffoldsRequest $request
     *
     * @return Response
     */
    public function store(CreateSecond_ScaffoldsRequest $request)
    {
        $input = $request->all();

        $secondScaffolds = $this->secondScaffoldsRepository->create($input);

        Flash::success('Second  Scaffolds saved successfully.');

        return redirect(route('secondScaffolds.index'));
    }

    /**
     * Display the specified Second_Scaffolds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $secondScaffolds = $this->secondScaffoldsRepository->find($id);

        if (empty($secondScaffolds)) {
            Flash::error('Second  Scaffolds not found');

            return redirect(route('secondScaffolds.index'));
        }

        return view('second__scaffolds.show')->with('secondScaffolds', $secondScaffolds);
    }

    /**
     * Show the form for editing the specified Second_Scaffolds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $secondScaffolds = $this->secondScaffoldsRepository->find($id);

        if (empty($secondScaffolds)) {
            Flash::error('Second  Scaffolds not found');

            return redirect(route('secondScaffolds.index'));
        }

        return view('second__scaffolds.edit')->with('secondScaffolds', $secondScaffolds);
    }

    /**
     * Update the specified Second_Scaffolds in storage.
     *
     * @param int $id
     * @param UpdateSecond_ScaffoldsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSecond_ScaffoldsRequest $request)
    {
        $secondScaffolds = $this->secondScaffoldsRepository->find($id);

        if (empty($secondScaffolds)) {
            Flash::error('Second  Scaffolds not found');

            return redirect(route('secondScaffolds.index'));
        }

        $secondScaffolds = $this->secondScaffoldsRepository->update($request->all(), $id);

        Flash::success('Second  Scaffolds updated successfully.');

        return redirect(route('secondScaffolds.index'));
    }

    /**
     * Remove the specified Second_Scaffolds from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $secondScaffolds = $this->secondScaffoldsRepository->find($id);

        if (empty($secondScaffolds)) {
            Flash::error('Second  Scaffolds not found');

            return redirect(route('secondScaffolds.index'));
        }

        $this->secondScaffoldsRepository->delete($id);

        Flash::success('Second  Scaffolds deleted successfully.');

        return redirect(route('secondScaffolds.index'));
    }
}
