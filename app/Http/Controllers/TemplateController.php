<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Template;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = Template::all();
        return view('templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTemplateRequest $request)
    {
        $validatedInput = $request->validated();
        $style = 'success';
        $message = 'Template saved';

        try {
            Template::create($validatedInput);
        } catch (\Exception $e) {
            $style = 'error';
            $message = 'Error saving template: ' . $e->getMessage();
        }

        return redirect()->route('templates.index')->with([
            'flash.banner' => $message,
            'flash.bannerStyle' => $style,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        return view('templates.view', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        return view('templates.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $style = 'success';
        $message = 'Template saved';

        try {
            $template->update($request->validated());
        } catch (\Exception $e) {
            $style = 'error';
            $message = 'Error saving template: ' . $e->getMessage();
        }

        return redirect()->route('templates.index')->with([
            'flash.banner' => $message,
            'flash.bannerStyle' => $style,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('templates.index');
    }
}
