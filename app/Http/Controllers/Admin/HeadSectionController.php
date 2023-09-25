<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHeadSectionRequest;
use App\Http\Requests\UpdateHeadSectionRequest;
use App\Models\HeadSection;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;


class HeadSectionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('head_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $headSections = HeadSection::all();

        return view('admin.headSections.index', compact('headSections'));
    }

    public function create()
    {
        abort_if(Gate::denies('head_section_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headSections.create');
    }

    public function store(StoreHeadSectionRequest $request)
    {
        $headSection = HeadSection::create($request->all());

        if ($request->input('image', false)) {
            $headSection->addMedia(public_path('uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $headSection->id]);
        }

        return redirect()->route('admin.head-sections.index');
    }

    public function edit(HeadSection $headSection)
    {
        abort_if(Gate::denies('head_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headSections.edit', compact('headSection'));
    }

    public function update(UpdateHeadSectionRequest $request, HeadSection $headSection)
    {
        $headSection->update($request->all());
        if ($request->input('image', false)) {
            if (!$headSection->image || $request->input('image') !== $headSection->image->file_name) {
                if ($headSection->image) {
                    $headSection->image->delete();
                }
                $headSection->addMedia(public_path('uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($headSection->image) {
            $headSection->image->delete();
        }
        return redirect()->back()->with('message',trans('global.update_success'));
    }
}
