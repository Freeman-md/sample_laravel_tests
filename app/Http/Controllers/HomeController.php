<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function takeChunk() {
        $collection = collect([
            'a' => 1,
            'b' => 2,
            'c' => 3,
            'd' => 4,
            'e' => 5,
        ]);
    
        // return $collection->take(2); 
        return $collection->chunk(2); 
    }

    public function whereContains() {
        $users =  User::all();
        $collection = $users->whereIn('id', [1,2,3]);
        dd($collection->contains('name', 'Curt Quigley II'));
    }

    public function superSorts() {
        $users = User::all();
        return $users->sortByDesc('name')->values();
    }

    public function mapVsEach() {
        $users = User::all();
        return $users->map(function($user) {
            if ($user->isAdmin == 1) {
                $user->email_confirmed = 1;
            }
            // return ['name' => $user->name];
            return $user->only('name', 'email');
        }); 
    }

    public function mergeVsConcat() {
        $users = User::first();
        return collect($users)->concat([
            'name' => 'Name Changed'
        ]);
    }

    public function groupBy() {
        $users = User::all();

        return $users->groupBy(function($item, $key) {
            return substr($item['email'], -4);
        }, true);
    }

    public function pullEveryForgetPop() {
        $users = User::all();
        $pullItem = $users->pull(2);
        return $pullItem;
    }
}
