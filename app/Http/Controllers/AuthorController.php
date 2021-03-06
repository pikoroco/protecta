<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $csrf = csrf_token();
        $authors = Author::all();
        $authors->load('publications');
        return Inertia::render('AuthorIndex', [
            'authors' => $authors,
            'csrf'=> $csrf,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $csrf = csrf_token();
        return Inertia::render('AuthorCreate', [
            'csrf' => $csrf,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $author = new Author();
        $author->name = $request->name;
        $author->address = $request->address;
        $author->description = $request->description;
        $author->save();

        $authors = Author::all();
        $authors->load('publications');
        return Inertia::render('AuthorIndex', [
            'authors' => $authors
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function show(Author $author): Response
    {
        $author->load('publications');
        $csrf = csrf_token();
        return Inertia::render('AuthorDetails', [
            'author' => $author,
            'csrf' => $csrf,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function edit(Author $author): Response
    {
        $author->load('publications');
        $csrf = csrf_token();
        return Inertia::render('AuthorEdit', [
            'author' => $author,
            'csrf' => $csrf
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Author $author
     * @return Response
     */
    public function update(Request $request, Author $author): Response
    {
        $author->name = $request->name;
        $author->address = $request->address;
        $author->description = $request->description;
        $author->save();
        $author->load('publications');
         return Inertia::render('AuthorDetails', [
             'author' => $author,
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Author $author
     * @return RedirectResponse
     */
    public function destroy(Request $request, Author $author): RedirectResponse
    {
        $author->delete();
        return redirect()->route('author.index');
    }
}
