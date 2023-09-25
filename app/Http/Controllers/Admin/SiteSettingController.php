<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySiteSettingRequest;
use App\Http\Requests\StoreSiteSettingRequest;
use App\Http\Requests\UpdateSiteSettingRequest;
use App\Models\SiteSetting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SiteSettingController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('site_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteSettings = SiteSetting::with(['media'])->get();

        return view('admin.siteSettings.index', compact('siteSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('site_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteSettings.create');
    }

    public function store(StoreSiteSettingRequest $request)
    {
        $siteSetting = SiteSetting::create($request->all());

        if ($request->input('logo', false)) {
            $siteSetting->addMedia(public_path('uploads/'. basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('icon', false)) {
            $siteSetting->addMedia(public_path('uploads/'. basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $siteSetting->id]);
        }

        return redirect()->route('admin.site-settings.index');
    }

    public function edit(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteSettings.edit', compact('siteSetting'));
    }

    public function update(UpdateSiteSettingRequest $request, SiteSetting $siteSetting)
    {
        $siteSetting->update($request->all());

        if ($request->input('logo', false)) {
            if (!$siteSetting->logo || $request->input('logo') !== $siteSetting->logo->file_name) {
                if ($siteSetting->logo) {
                    $siteSetting->logo->delete();
                }
                $siteSetting->addMedia(public_path('uploads/'. basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($siteSetting->logo) {
            $siteSetting->logo->delete();
        }

        if ($request->input('icon', false)) {
            if (!$siteSetting->icon || $request->input('icon') !== $siteSetting->icon->file_name) {
                if ($siteSetting->icon) {
                    $siteSetting->icon->delete();
                }
                $siteSetting->addMedia(public_path('uploads/'. basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($siteSetting->icon) {
            $siteSetting->icon->delete();
        }

//        return redirect()->route('admin.site-settings.index');
        return redirect()->back()->with('message',trans('global.update_success'));

    }

    public function show(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteSettings.show', compact('siteSetting'));
    }

    public function destroy(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroySiteSettingRequest $request)
    {
        SiteSetting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('site_setting_create') && Gate::denies('site_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SiteSetting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
