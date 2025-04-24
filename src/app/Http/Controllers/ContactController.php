<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel1',     // ← これ追加！
            'tel2',     // ← これ追加！
            'tel3',     // ← これ追加！
            'address',
            'building',
            'category_id',
            'detail'
        ]);

        // category_idからカテゴリ名を取得
        $category = Category::find($contact['category_id']);
        $categoryName = $category ? $category->content : '（不明）';

        return view('confirm', compact('contact', 'categoryName'));
    }

    public function store(ContactRequest $request)
    {
        if($request->input('action') === 'back'){
            return redirect('/')
            ->withInput();
        }

        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail'
        ]);

        // tel1~3 を連結して1つの tel にする
        $contact['tel'] = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');

        Contact::create($contact);

        return redirect()->route('thanks');
    }
}
