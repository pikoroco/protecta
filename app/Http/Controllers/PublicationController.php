<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $csrf = csrf_token();
        return Inertia::render('PublicationCreate', [
            'csrf' => $csrf,
            'author_id' => $request->author_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $publication = new Publication();
        $publication->date = $request->date ?? now();
        $publication->title = $request->title;
        $publication->author_id = $request->author_id;
        $publication->save();

        return redirect()->route('author.show',$request->author_id);
    }

    /**
     * Display the specified resource.
     *
     * @param Publication $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Publication $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Publication $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Publication $publication
     * @return RedirectResponse
     */
    public function destroy(Publication $publication): RedirectResponse
    {
        $publication->delete();
        return redirect()->back();
    }
}
