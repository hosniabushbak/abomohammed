<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySectionRequest;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SectionsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::with(['media'])->get();

        return view('admin.sections.index', compact('sections'));
    }

    public function create()
    {
        abort_if(Gate::denies('section_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sections.create');
    }

    public function store(StoreSectionRequest $request)
    {
        $section = Section::create($request->all());

        if ($request->input('image', false)) {
            $section->addMedia(public_path('uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $section->id]);
        }

        return redirect()->route('admin.sections.index');
    }

    public function edit(Section $section)
    {
        abort_if(Gate::denies('section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sections.edit', compact('section'));
    }

    public function update(UpdateSectionRequest $request, Section $section)
    {
        $section->update($request->all());

        if ($request->input('image', false)) {
            if (!$section->image || $request->input('image') !== $section->image->file_name) {
                if ($section->image) {
                    $section->image->delete();
                }
                $section->addMedia(public_path('uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($section->image) {
            $section->image->delete();
        }

        return redirect()->route('admin.sections.index');
    }

    public function show(Section $section)
    {
        abort_if(Gate::denies('section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sections.show', compact('section'));
    }

    public function destroy(Section $section)
    {
        abort_if(Gate::denies('section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $section->delete();

        return back();
    }

    public function massDestroy(MassDestroySectionRequest $request)
    {
        Section::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('section_create') && Gate::denies('section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Section();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
