<?php

namespace Modules\Language\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Language\Entities\Language;

class TranslationController extends Controller
{
    public function transUpdate(Request $request)
    {
        $language = Language::findOrFail($request->lang_id);
        $data = file_get_contents(base_path('resources/lang/' . $language->code . '.json'));

        $translations = json_decode($data, true);

        foreach ($translations as $key => $value) {
            if ($request->$key) {
                $translations[$key] = $request->$key;
            } else {
                $translations[$key] = "";
            }
        }

        $updated = file_put_contents(base_path('resources/lang/' . $language->code . '.json'), json_encode($translations, JSON_UNESCAPED_UNICODE));

        $updated ? flashSuccess('Translations updated successfully') : flashError();
        return back();
    }

    public function langView($code)
    {
        $path = base_path('resources/lang/' . $code . '.json');
        $translations = json_decode(file_get_contents($path), true);
        $language = Language::where('code', $code)->first();

        return view('language::lang_view', compact('language', 'translations'));
    }

    public function changeLanguage($lang)
    {
        session()->put('admin_lang', $lang);
        app()->setLocale($lang);

        return back();
    }
}
