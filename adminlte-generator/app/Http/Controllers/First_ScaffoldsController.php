<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFirst_ScaffoldsRequest;
use App\Http\Requests\UpdateFirst_ScaffoldsRequest;
use App\Repositories\First_ScaffoldsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class First_ScaffoldsController extends AppBaseController
{
    /** @var  First_ScaffoldsRepository */
    private $firstScaffoldsRepository;

    public function __construct(First_ScaffoldsRepository $firstScaffoldsRepo)
    {
        $this->firstScaffoldsRepository = $firstScaffoldsRepo;
    }

    /**
     * Display a listing of the First_Scaffolds.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $firstScaffolds = $this->firstScaffoldsRepository->all();

        return view('first__scaffolds.index')
            ->with('firstScaffolds', $firstScaffolds);
    }

    /**
     * Show the form for creating a new First_Scaffolds.
     *
     * @return Response
     */
    public function create()
    {
        return view('first__scaffolds.create');
    }

    /**
     * Store a newly created First_Scaffolds in storage.
     *
     * @param CreateFirst_ScaffoldsRequest $request
     *
     * @return Response
     */
    public function store(CreateFirst_ScaffoldsRequest $request)
    {
        $input = $request->all();

        $firstScaffolds = $this->firstScaffoldsRepository->create($input);

        Flash::success('First  Scaffolds saved successfully.');

        return redirect(route('firstScaffolds.index'));
    }

    /**
     * Display the specified First_Scaffolds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $firstScaffolds = $this->firstScaffoldsRepository->find($id);

        if (empty($firstScaffolds)) {
            Flash::error('First  Scaffolds not found');

            return redirect(route('firstScaffolds.index'));
        }

        return view('first__scaffolds.show')->with('firstScaffolds', $firstScaffolds);
    }

    /**
     * Show the form for editing the specified First_Scaffolds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $firstScaffolds = $this->firstScaffoldsRepository->find($id);

        if (empty($firstScaffolds)) {
            Flash::error('First  Scaffolds not found');

            return redirect(route('firstScaffolds.index'));
        }

        return view('first__scaffolds.edit')->with('firstScaffolds', $firstScaffolds);
    }

    /**
     * Update the specified First_Scaffolds in storage.
     *
     * @param int $id
     * @param UpdateFirst_ScaffoldsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFirst_ScaffoldsRequest $request)
    {
        $firstScaffolds = $this->firstScaffoldsRepository->find($id);

        if (empty($firstScaffolds)) {
            Flash::error('First  Scaffolds not found');

            return redirect(route('firstScaffolds.index'));
        }

        $firstScaffolds = $this->firstScaffoldsRepository->update($request->all(), $id);

        Flash::success('First  Scaffolds updated successfully.');

        return redirect(route('firstScaffolds.index'));
    }

    /**
     * Remove the specified First_Scaffolds from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $firstScaffolds = $this->firstScaffoldsRepository->find($id);

        if (empty($firstScaffolds)) {
            Flash::error('First  Scaffolds not found');

            return redirect(route('firstScaffolds.index'));
        }

        $this->firstScaffoldsRepository->delete($id);

        Flash::success('First  Scaffolds deleted successfully.');

        return redirect(route('firstScaffolds.index'));
    }
}
