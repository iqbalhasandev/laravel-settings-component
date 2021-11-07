<?php

namespace App\Http\Controllers\Setting;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Setting\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Facades\Setting as SettingFacades;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // cache data
        $settings = SettingFacades::groups();

        $groups = SettingFacades::onlyGroup();
        $active = (request()->session()->has('setting_tab')) ? request()->session()->get('setting_tab') : old('setting_tab', key($settings));

        // $this->seo()->setTitle('Sittings Mangmet');

        return \view('pages.setting.base', ["S_TYPES" => Setting::TYPES, 'settings' => $settings, 'groups' => $groups, 'active' => $active]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request;
        if (!isset($request->group)) {
            $data['group'] = 'general';
        }
        $data['key'] = Str::lower(implode("_", explode(" ", (Str::lower($data->group)))) . '.' . \implode("_", explode(" ", $data->key)));
        $data['details'] = (array) \json_decode($request->details);
        $data['details'] = \json_encode($request->details);
        $data->validate([
            'key' => 'required|unique:settings|max:255',
            'display_name' => 'required|max:255',
            'type' => 'required|max:255',
            'group' => 'max:255',
        ]);

        $setting = new Setting;

        $data['order'] = $setting->highestOrderSetting($data->group);

        $setting->create($data->all());

        // forget cache
        SettingFacades::forgetCache();


        session()->flash('Success', 'Successfully Create Setting');
        return redirect()->route('admin.settings.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $setting = new Setting;

        foreach ($request->data as $id => $value) {
            // return $value;
            $setting = $setting->find($id);
            $setting->group =   $request->group[$id];

            $key = explode(".", $setting->key);
            unset($key[0]);

            $setting->key = implode("_", explode(" ", (Str::lower($setting->group)))) . '.' . \implode("_", $key);

            if ($request->hasFile('data.' . $id)) {
                $value = Storage::putFile('setting', $request->file('data.' . $id));
                Storage::delete($setting->value);
            }


            $setting->value = $value;
            $setting->save();
        }
        // forget cache
        SettingFacades::forgetCache();

        request()->flashOnly('setting_tab');

        Session::flash('success', 'Setting Successfully Saved');
        return \redirect()->route('admin.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();

        // forget cache
        SettingFacades::forgetCache();

        Session::flash('success', 'Setting Successfully Deleted');
        return \redirect()->route('admin.settings.index');
    }

    /**
     * Order the specified Setting from Settings table.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function move_up(Setting $setting)
    {

        $swapOrder = $setting->order;
        $previousSetting = Setting::where('order', '<', $swapOrder)
            ->where('group', $setting->group)
            ->orderBy('order', 'DESC')->first();

        if (isset($previousSetting->order)) {
            $setting->order = $previousSetting->order;
            $setting->save();
            $previousSetting->order = $swapOrder;
            $previousSetting->save();

            // forget cache
            SettingFacades::forgetCache();

            Session::flash('success',  $setting->display_name . ' Successfully moved up');
        } else {
            Session::flash('error',  $setting->display_name . ' Already at top');
        }

        request()->session()->flash('setting_tab', $setting->group);

        return \redirect()->route('admin.settings.index');
    }

    /**
     * Order the specified Setting from Settings table.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function move_down(Setting $setting)
    {
        $swapOrder = $setting->order;

        $previousSetting = Setting::where('order', '>', $swapOrder)
            ->where('group', $setting->group)
            ->orderBy('order', 'ASC')->first();

        if (isset($previousSetting->order)) {
            $setting->order = $previousSetting->order;
            $setting->save();
            $previousSetting->order = $swapOrder;
            $previousSetting->save();

            // forget cache
            SettingFacades::forgetCache();

            Session::flash('success',  $setting->display_name . ' Moved order down');
        } else {
            Session::flash('error',  $setting->display_name . ' Already at bottom');
        }
        request()->session()->flash('setting_tab', $setting->group);

        return \redirect()->route('admin.settings.index');
    }

    /**
     * unset value the specified Setting from Settings table.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function unsetValue(Setting $setting)
    {
        Storage::delete($setting->value);
        $setting->value = \null;
        $setting->save();

        // forget cache
        SettingFacades::forgetCache();

        return \redirect()->route('admin.settings.index');
    }
}
