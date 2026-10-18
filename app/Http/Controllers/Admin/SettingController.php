<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $settings = SiteSetting::all()->pluck('value','key');
        return view('admin.settings.index', compact('settings'));
    }
    public function update(Request $r) {
        foreach ((array) $r->get('settings', []) as $key => $value) {
            SiteSetting::set($key, (string) $value);
        }
        return back()->with('success','Pengaturan diperbarui.');
    }
}
